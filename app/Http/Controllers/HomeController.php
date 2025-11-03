<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactMail; // Assurez-vous que ce fichier Mailable existe

/**
 * Contrôleur principal du Portfolio BTS SIO
 *
 * Gère l'affichage de la page d'accueil (home) et le formulaire de contact
 */
class HomeController extends Controller
{
    /**
     * Affiche la page principale du portfolio (home.blade.php)
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        // Données dynamiques à passer à la vue 'home'
        $data = [
            'name' => 'Mekaoui Reda', // Votre nom
            'specialty' => 'SLAM',
            'email' => 'votre.email@exemple.com',
            'phone' => '+33 6 XX XX XX XX',
            'location' => 'Paris, France',
            'github' => 'https://github.com/Rivalzina75',
            'linkedin' => 'https://linkedin.com/in/votre-username',
            'projects' => $this->getProjects(), // Projets pour la page d'accueil
            'skills' => $this->getSkills(), // Compétences pour la page d'accueil
        ];

        // CORRECTION : Pointez vers votre vue 'home'
        return view('home', $data);
    }

    /**
     * Traite le formulaire de contact
     *
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function sendContact(Request $request)
    {
        // Validation (identique à votre code, c'est parfait)
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:100',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|min:3|max:200',
            'message' => 'required|string|min:10|max:2000',
        ], [
            'name.required' => 'Le nom est requis.',
            // ... autres messages ...
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        try {
            $data = $validator->validated();

            // Envoi de l'email
            Mail::to('votre.email@exemple.com') // Votre email
                ->send(new ContactMail($data));

            return response()->json([
                'success' => true,
                'message' => 'Votre message a été envoyé avec succès !'
            ], 200);

        } catch (\Exception $e) {
            \Log::error('Erreur lors de l\'envoi du message de contact : ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'message' => 'Une erreur est survenue lors de l\'envoi du message. Veuillez réessayer.'
            ], 500);
        }
    }

    /**
     * Affiche les détails d'un projet
     *
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function showProject($id)
    {
        $projects = $this->getProjects();

        if (!isset($projects[$id])) {
            abort(404);
        }
        
        // CORRECTION : Pointez vers une vue de détails générique
        // (Vous devrez créer 'resources/views/Projects/details.blade.php')
        return view('Projects.details', [
            'project' => $projects[$id]
        ]);
    }

    // ... (Les méthodes getProjects() et getSkills() restent identiques à votre fichier) ...

    private function getProjects() { /* ... */ }
    private function getSkills() { /* ... */ }
    public function apiProjects() { /* ... */ }
    public function apiSkills() { /* ... */ }
}