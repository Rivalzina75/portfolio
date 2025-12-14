<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;
use App\Mail\ContactMail;

/**
 * Contrôleur principal du Portfolio BTS SIO
 *
 * Gère l'affichage de la page d'accueil (home) et le formulaire de contact
 */
class HomeController extends Controller
{
    /**
     * Affiche la page d'accueil du portfolio
     */
    public function index()
    {
        // URL du flux RSS (UX Collective)
        $rssUrl = 'https://uxdesign.cc/feed';
        $articles = [];

        try {
            // On récupère le flux directement depuis l'extérieur
            $response = Http::timeout(3)->get($rssUrl);

            if ($response->successful()) {
                $rss = simplexml_load_string($response->body());

                if ($rss) {
                    foreach ($rss->channel->item as $item) {
                        $publishedAt = strtotime((string) $item->pubDate);

                        // Récupération d'une image
                        $image = null;

                        // Essayer d'abord enclosure
                        if (isset($item->enclosure)) {
                            $attrs = $item->enclosure->attributes();
                            if ($attrs && isset($attrs['url'])) {
                                $image = (string) $attrs['url'];
                            }
                        }

                        // Sinon, extraire du contenu HTML
                        if (!$image && isset($item->description)) {
                            $description = (string) $item->description;
                            if (preg_match('/<img[^>]+src="([^">]+)"/', $description, $matches)) {
                                $image = $matches[1];
                            }
                        }

                        // Sinon, essayer le contenu encodé
                        if (!$image && isset($item->children('http://purl.org/rss/1.0/modules/content/')->encoded)) {
                            $content = (string) $item->children('http://purl.org/rss/1.0/modules/content/')->encoded;
                            if (preg_match('/<img[^>]+src="([^">]+)"/', $content, $matches)) {
                                $image = $matches[1];
                            }
                        }

                        $articles[] = [
                            'title'      => (string) $item->title,
                            'link'       => (string) $item->link,
                            'date'       => date('d/m/Y', $publishedAt), // utilisé par le JS
                            'timestamp'  => $publishedAt,                // utilisé pour le tri
                            'category'   => isset($item->category) ? (string) $item->category : 'Tech',
                            'image'      => $image,
                        ];
                    }

                    // Tri du plus récent au plus ancien
                    usort($articles, function ($a, $b) {
                        return ($b['timestamp'] ?? 0) - ($a['timestamp'] ?? 0);
                    });
                }
            }
        } catch (\Exception $e) {
            // Si erreur, on garde un tableau vide pour ne pas faire planter le site
            \Log::error("Erreur RSS : " . $e->getMessage());
        }

        // On envoie 12 articles pour la rotation en JS
        $articles = array_slice($articles, 0, 12);

        return view('home', compact('articles'));
    }

    /**
     * Traite le formulaire de contact et envoie l'email
     */
    public function sendContact(Request $request)
    {
        // Validation des données du formulaire
        $validator = Validator::make($request->all(), [
            'name'    => 'required|string|max:255',
            'email'   => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string|max:5000',
        ]);

        if ($validator->fails()) {
            if ($request->expectsJson()) {
                return response()->json(["errors" => $validator->errors()], 422);
            }

            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();

        // Envoi de l'email via la classe Mailable vers l'adresse configurée
        $recipient = config('mail.contact_recipient');
        Mail::to($recipient)->send(new ContactMail($data));

        if ($request->expectsJson()) {
            return response()->json(["success" => true, "message" => 'Votre message a été envoyé avec succès !']);
        }

        return redirect()->back()->with('success', 'Votre message a été envoyé avec succès !');
    }
}
