<?php

namespace Database\Factories;

use App\Models\SiteContato;
use Illuminate\Database\Eloquent\Factories\Factory;

class SiteContatoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = SiteContato::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
            'email' => $this->faker->unique(),
            'telefone' =>$this->faker->toolFreePhoneNumber,
            'motivo_contato' =>$this->faker->numberBetween(1,3),
            'mensagem' =>$this->faker->text(200),
        ];
    }
}
