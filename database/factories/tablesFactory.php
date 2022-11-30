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
           'abrev' => 'ISN',
           'nom'=> 'Institue Superieur De Numerique',
           'tutle'=> 'Minister education superieur ',
           'co-tutle' => 'Minister numerisation ',
           'nom-basedonne'=>'_i_s_ns'
        ];
    }
}
