<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use JeffersonGoncalves\HelpDesk\Models\Department;

class DepartmentSeeder extends Seeder
{
    public function run(): void
    {
        $departments = [
            ['name' => 'Suporte Técnico', 'slug' => 'suporte-tecnico', 'description' => 'Problemas técnicos, bugs e falhas no sistema', 'is_active' => true],
            ['name' => 'Financeiro', 'slug' => 'financeiro', 'description' => 'Faturamento, pagamentos e reembolsos', 'is_active' => true],
            ['name' => 'Comercial', 'slug' => 'comercial', 'description' => 'Vendas, planos e upgrades', 'is_active' => true],
            ['name' => 'Recursos Humanos', 'slug' => 'recursos-humanos', 'description' => 'Questões internas de RH', 'is_active' => true],
        ];

        foreach ($departments as $department) {
            Department::firstOrCreate(
                ['name' => $department['name']],
                $department
            );
        }
    }
}
