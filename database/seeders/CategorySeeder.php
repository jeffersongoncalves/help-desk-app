<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use JeffersonGoncalves\HelpDesk\Models\Category;
use JeffersonGoncalves\HelpDesk\Models\Department;

class CategorySeeder extends Seeder
{
    public function run(): void
    {
        $categoriesByDepartment = [
            'suporte-tecnico' => [
                ['name' => 'Bug / Erro', 'slug' => 'bug-erro', 'description' => 'Defeito ou comportamento inesperado no sistema'],
                ['name' => 'Dúvida Técnica', 'slug' => 'duvida-tecnica', 'description' => 'Perguntas sobre funcionalidades ou uso do sistema'],
                ['name' => 'Acesso / Permissão', 'slug' => 'acesso-permissao', 'description' => 'Problemas com login, senha ou permissões'],
                ['name' => 'Infraestrutura', 'slug' => 'infraestrutura', 'description' => 'Servidores, rede, performance'],
            ],
            'financeiro' => [
                ['name' => 'Faturamento', 'slug' => 'faturamento', 'description' => 'Dúvidas e problemas com notas fiscais e faturas'],
                ['name' => 'Pagamento', 'slug' => 'pagamento', 'description' => 'Problemas com pagamentos e cobranças'],
                ['name' => 'Reembolso', 'slug' => 'reembolso', 'description' => 'Solicitações de estorno e reembolso'],
            ],
            'comercial' => [
                ['name' => 'Solicitação', 'slug' => 'solicitacao', 'description' => 'Pedido de nova funcionalidade ou melhoria'],
                ['name' => 'Planos / Upgrade', 'slug' => 'planos-upgrade', 'description' => 'Dúvidas sobre planos, preços e upgrades'],
            ],
            'recursos-humanos' => [
                ['name' => 'Dúvida Interna', 'slug' => 'duvida-interna', 'description' => 'Perguntas sobre políticas e processos internos'],
                ['name' => 'Benefícios', 'slug' => 'beneficios', 'description' => 'Questões sobre benefícios e folha de pagamento'],
            ],
        ];

        foreach ($categoriesByDepartment as $departmentSlug => $categories) {
            $department = Department::where('slug', $departmentSlug)->first();

            if (! $department) {
                continue;
            }

            foreach ($categories as $category) {
                Category::firstOrCreate(
                    ['department_id' => $department->id, 'slug' => $category['slug']],
                    array_merge($category, ['department_id' => $department->id, 'is_active' => true])
                );
            }
        }
    }
}
