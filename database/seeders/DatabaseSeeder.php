<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ESP;
use App\Models\FST;
use App\Models\ISCAE;

use App\Models\ISN;
use App\Models\tables;
use App\Models\_i_s_n;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);


ISN::factory(234)->create();
ISCAE::factory(643)->create();
ESP::factory(742)->create();
FST::factory(563)->create();


    }
}
