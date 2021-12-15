<?php

namespace Database\Seeders;

use App\Models\Unidade;
use Illuminate\Database\Seeder;

class UnidadeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unidades = [
            [
                'unidade' => 'mm',
                'descricao' => 'milímetros',
            ],
            [
                'unidade' => 'cm',
                'descricao' => 'centímetros',
            ],
            [
                'unidade' => 'm',
                'descricao' => 'metros',
            ]
        ];

        foreach($unidades as $unidade){
            Unidade::create($unidade);
        }
    }
}
