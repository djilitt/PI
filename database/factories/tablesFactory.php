<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class tablesFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
           'abrev' => 'ESP',
           'nom'=> 'Faculite de Science et Technique',
           'tutle'=> 'Minister education superieur',
           'co-tutle' => '',
           'nom-basedonne'=>'i_s_c_a_e_s',
           'privee'=>0
        ];
    }
}
