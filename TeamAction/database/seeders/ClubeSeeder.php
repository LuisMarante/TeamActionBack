<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class ClubeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clubes')->insert([
            [
                'epoca_id' => 1,
                'nome' => 'Clube Desportivo da Cidade',
                'cidade' => 'Lisboa',
                'logo_url' => 'http://example.com/logos/clube1.png',
                'contacto' => 'clube.cidade@email.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'epoca_id' => 1,
                'nome' => 'Academia Desportiva do Norte',
                'cidade' => 'Porto',
                'logo_url' => 'http://example.com/logos/clube2.png',
                'contacto' => 'academia.norte@email.com',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}
