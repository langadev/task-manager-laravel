<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria um usuário de teste específico para login fácil
        $mainUser = User::factory()->create([
            'name' => 'Alfredo',
            'email' => 'hp@gmail.com',
            'password' => bcrypt('password'),
        ]);

        // Categorias para o usuário principal
        $mainCategories = \App\Models\Category::factory(5)->create(['user_id' => $mainUser->id]);

        // Adiciona tarefas ao usuário principal com categorias aleatórias
        \App\Models\Task::factory(15)->create([
            'user_id' => $mainUser->id,
            'category_id' => fn() => $mainCategories->random()->id
        ]);

        // Cria outros usuários e suas tarefas/categorias
        User::factory(3)->create()->each(function ($user) {
            $categories = \App\Models\Category::factory(3)->create(['user_id' => $user->id]);
            \App\Models\Task::factory(10)->create([
                'user_id' => $user->id,
                'category_id' => fn() => $categories->random()->id
            ]);
        });
    }
}
