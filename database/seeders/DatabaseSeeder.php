<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //Unidades de apartamentos
        DB::table('units')->insert([
            'name' => 'ATP 100',
            'id_owner' => 1,

        ]);

        DB::table('units')->insert([
            'name' => 'ATP 101',
            'id_owner' => 1,

        ]);
        DB::table('units')->insert([
            'name' => 'ATP 200',
            'id_owner' => '0',

        ]);
        DB::table('units')->insert([
            'name' => 'ATP 201',
            'id_owner' => '0',

        ]);
        //Areas comuns do condomínio

        DB::table('areas')->insert([
            'allowed' => '1',
            'title' => 'Academia',
            'cover' => 'gym.jpg',
            'days' => 1, 2, 4, 5,
            'start_time' => '06:00:00',
            'end_time' => '22:00:00',

        ]);

        DB::table('areas')->insert([
            'allowed' => '1',
            'title' => 'Piscina',
            'cover' => 'pool.jpg',
            'days' => 1, 2, 3, 4, 5,
            'start_time' => '07:00:00',
            'end_time' => '23:00:00',

        ]);

        DB::table('areas')->insert([
            'allowed' => '1',
            'title' => 'Academia',
            'cover' => 'barbecue.jpg',
            'days' => 1, 2, 4, 5,
            'start_time' => '06:00:00',
            'end_time' => '22:00:00',

        ]);

        DB::table('walls')->insert([
            'title' => 'Titulo de aviso de Teste',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'datacreated' => '2022-10-16 15:00:00',

        ]);

        DB::table('walls')->insert([
            'title' => 'Alerta geral para todos',
            'body' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit.',
            'datacreated' => '2022-10-16 18:00:00',

        ]);

    }
}
