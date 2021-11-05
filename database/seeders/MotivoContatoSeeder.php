<?php

namespace Database\Seeders;

use App\Models\MotivoContato;
use Illuminate\Database\Seeder;

class MotivoContatoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $motivo_contatos = [
            [
                'motivo_contato' => 'Dúvida',
            ],
            [
                'motivo_contato' => 'Elogio',
            ],
            [
                'motivo_contato' => 'Reclamação',
            ]

        ];

        foreach ($motivo_contatos as $motivo_contato){
            MotivoContato::create($motivo_contato);
        }

    }
}
