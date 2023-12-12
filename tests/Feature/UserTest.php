<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_serverResponse_status(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }
    
    public function test_user_creation(): void
    {
    // Les données de l'utilisateur à créer
    $userData = [
        'name' => 'Marie',
        'email' => 'marie@test.com',
        'password' => 'password123',
        'password_confirmation' => 'password123', // Champ de confirmation du mot de passe
    ];

    // Fait une requête POST pour créer un nouvel utilisateur
    $response = $this->post('/register', $userData);

    // Affiche le contenu de la réponse en cas d'échec
    $response->dump();

    // Assure que la création de l'utilisateur a réussi (code de redirection)
    $response->assertStatus(302);

    // Assure que l'utilisateur est présent dans la base de données
    $this->assertDatabaseHas('users', [
        'email' => 'marie@test.com',
    ]);
    }



}
