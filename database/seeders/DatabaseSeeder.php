<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        User::factory()->create([
            'nombre' => 'Alejandro Rivas',
            'email' => 'alejandro@test.com',
            'telefono' => '7777-7777'
        ]);

        User::factory(10)->create();
    }
}
