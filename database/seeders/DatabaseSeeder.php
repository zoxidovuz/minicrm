<?php

declare(strict_types=1);

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{

    public function run(): void
    {
        if (app()->environment('local')) {
            $this->call(
                class: CompanySeeder::class
            );
            $this->call(
                class: RoleSeeder::class
            );
        }

        User::factory()->create([
            'name' => 'Admin CRM',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password'),
            'email_verified_at' => now(),
            'role_id' => 1,
        ]);
    }
}
