<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
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
        return view('home');
    }

    /**
     * Traite le formulaire de contact
     */
    public function sendContact(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|min:3|max:200',
            'message' => 'required|string|min:10|max:2000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $data = $validator->validated();

            // Envoi de l'email au destinataire
            Mail::to(config('mail.from.address'))
                ->send(new ContactMail($data));

            return response()->json([
                'success' => true,
                'message' => 'Votre message a été envoyé avec succès !'
            ], 200);
        } catch (\Exception $e) {
            Log::error('Erreur lors de l\'envoi du message de contact : ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue. Veuillez réessayer.'
            ], 500);
        }
    }
}
