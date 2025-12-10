<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PortfolioController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function submitContact(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'subject' => 'required|string|max:255',
            'message' => 'required|string',
        ]);

        // TODO: envoyer l'email / stocker le message
        return response()->json(['success' => true, 'data' => $data]);
    }

    public function showProject($slug)
    {
        // TODO: charger un projet par slug
        return view('projects.show', compact('slug'));
    }

    public function downloadCV()
    {
        // TODO: fournir un fichier CV
        abort(404);
    }

    public function veille()
    {
        // TODO: vue de veille
        return view('veille');
    }
}
