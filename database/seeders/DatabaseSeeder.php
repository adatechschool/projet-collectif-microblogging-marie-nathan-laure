<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // indique de créer 10 instances (ensuite lancer la commande php artisan:seed)
        User::factory(10)
        ->has(Post::factory()->count(3), 'post') // ici on spécifie de créer 3 post / user en suivant la relation 'post'
        ->create();
    }
}
