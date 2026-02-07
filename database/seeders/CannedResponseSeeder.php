<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use JeffersonGoncalves\HelpDesk\Models\CannedResponse;

class CannedResponseSeeder extends Seeder
{
    public function run(): void
    {
        $responses = [
            [
                'title' => 'Saudação inicial',
                'body' => "Olá! Obrigado por entrar em contato com nosso suporte.\n\nEstou analisando sua solicitação e retorno em breve com uma atualização.",
                'is_active' => true,
            ],
            [
                'title' => 'Solicitação de mais informações',
                'body' => "Para que possamos dar continuidade ao atendimento, precisamos de algumas informações adicionais:\n\n- Qual navegador/dispositivo está utilizando?\n- Pode descrever os passos para reproduzir o problema?\n- Há alguma mensagem de erro?\n\nAguardo seu retorno.",
                'is_active' => true,
            ],
            [
                'title' => 'Problema resolvido',
                'body' => "O problema relatado foi identificado e corrigido.\n\nPor favor, teste novamente e nos informe se está tudo funcionando corretamente. Caso contrário, estamos à disposição.",
                'is_active' => true,
            ],
            [
                'title' => 'Encaminhamento para outra equipe',
                'body' => "Sua solicitação foi encaminhada para a equipe responsável. Eles darão continuidade ao atendimento.\n\nVocê será notificado assim que houver uma atualização.",
                'is_active' => true,
            ],
            [
                'title' => 'Encerramento por inatividade',
                'body' => "Como não recebemos retorno nos últimos dias, estamos encerrando este ticket.\n\nCaso o problema persista, fique à vontade para reabrir ou criar um novo ticket.",
                'is_active' => true,
            ],
        ];

        foreach ($responses as $response) {
            CannedResponse::firstOrCreate(
                ['title' => $response['title']],
                $response
            );
        }
    }
}
