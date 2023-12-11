<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class BiographyController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'biography' => 'required|string|max:255',
        ]);

        $user = Auth::user();
        
        if ($user) {
            $user->update([
                'biography' => $request->input('biography')
            ]);
        } else {
            // Gérer le cas où l'utilisateur n'est pas connecté
            return redirect()->back()->with('error', 'Utilisateur non connecté');
        }

        return redirect()->back()->with('success', 'Biographie mise à jour avec succès');
    }
}
