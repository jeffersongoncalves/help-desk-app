<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use JeffersonGoncalves\HelpDesk\Models\Category;
use JeffersonGoncalves\HelpDesk\Models\Department;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $suporte = Department::where('slug', 'suporte-tecnico')->first();
        $financeiro = Department::where('slug', 'financeiro')->first();
        $comercial = Department::where('slug', 'comercial')->first();
        $rh = Department::where('slug', 'recursos-humanos')->first();

        $categories = [
            ['department_id' => $suporte?->id, 'name' => 'Bug / Erro', 'slug' => 'bug-erro', 'description' => 'Defeito ou comportamento inesperado no sistema', 'is_active' => true],
            ['department_id' => $suporte?->id, 'name' => 'Dúvida', 'slug' => 'duvida', 'description' => 'Perguntas sobre funcionalidades ou uso do sistema', 'is_active' => true],
            ['department_id' => $comercial?->id, 'name' => 'Solicitação', 'slug' => 'solicitacao', 'description' => 'Pedido de nova funcionalidade ou melhoria', 'is_active' => true],
            ['department_id' => $suporte?->id, 'name' => 'Acesso / Permissão', 'slug' => 'acesso-permissao', 'description' => 'Problemas com login, senha ou permissões', 'is_active' => true],
            ['department_id' => $suporte?->id, 'name' => 'Infraestrutura', 'slug' => 'infraestrutura', 'description' => 'Servidores, rede, performance', 'is_active' => true],
        ];

        foreach ($categories as $category) {
            Category::firstOrCreate(
                ['department_id' => $category['department_id'], 'slug' => $category['slug']],
                $category
            );
        }
    }
}
