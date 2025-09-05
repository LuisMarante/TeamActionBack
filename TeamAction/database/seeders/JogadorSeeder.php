<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class JogadorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('jogadores')->insert([
            [
                'nome' => 'Rui Costa',
                'data_nascimento' => '1995-03-20',
                'posicao' => 'Guarda-redes',
                'numero_camisola' => 1,
                'contacto' => '911111111',
                'morada' => 'Rua do Guarda-redes, 1',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Diogo Fernandes',
                'data_nascimento' => '1996-07-12',
                'posicao' => 'Defesa',
                'numero_camisola' => 4,
                'contacto' => '912222222',
                'morada' => 'Rua do Defesa, 2',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Luís Pinto',
                'data_nascimento' => '1994-09-05',
                'posicao' => 'Avançado',
                'numero_camisola' => 9,
                'contacto' => '913333333',
                'morada' => 'Rua do Avançado, 3',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'Sara Mendes',
                'data_nascimento' => '2000-01-25',
                'posicao' => 'Central',
                'numero_camisola' => 10,
                'contacto' => '914444444',
                'morada' => 'Rua da Central, 4',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'nome' => 'André Neves',
                'data_nascimento' => '1999-04-18',
                'posicao' => 'Extremo',
                'numero_camisola' => 7,
                'contacto' => '915555555',
                'morada' => 'Rua do Extremo, 5',
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}