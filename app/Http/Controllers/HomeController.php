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
        // Utiliser le VeilleController pour récupérer les articles filtrés
        $veilleController = new VeilleController();
        $articlesData = $veilleController->getArticles();

        // Convertir la réponse JSON en tableau
        $articles = json_decode($articlesData->getContent(), true) ?? [];

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
