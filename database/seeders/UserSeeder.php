<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Operator;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use JeffersonGoncalves\HelpDesk\Models\Department;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Users (clientes que abrem tickets)
        $user = User::firstOrCreate(
            ['email' => 'user@example.com'],
            [
                'name' => 'João Silva',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        User::firstOrCreate(
            ['email' => 'maria@example.com'],
            [
                'name' => 'Maria Santos',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // Operators (atendem tickets)
        $operator1 = Operator::firstOrCreate(
            ['email' => 'operator@example.com'],
            [
                'name' => 'Carlos Operador',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        $operator2 = Operator::firstOrCreate(
            ['email' => 'suporte@example.com'],
            [
                'name' => 'Ana Suporte',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );

        // Vincular operadores aos departamentos
        $departments = Department::all();
        if ($departments->isNotEmpty()) {
            $operator1->helpDeskDepartments()->syncWithoutDetaching($departments->pluck('id'));
            $operator2->helpDeskDepartments()->syncWithoutDetaching(
                $departments->where('name', 'Suporte Técnico')->pluck('id')
            );
        }

        // Admin
        Admin::firstOrCreate(
            ['email' => 'admin@example.com'],
            [
                'name' => 'Admin Master',
                'password' => Hash::make('password'),
                'email_verified_at' => now(),
            ]
        );
    }
}
