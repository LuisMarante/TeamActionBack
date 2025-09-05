<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            UserSeeder::class,
            EpocaSeeder::class,
            ClubeSeeder::class,
            EquipaSeeder::class,
            JogadorSeeder::class,
            EventoSeeder::class,
            JogadorEquipaSeeder::class,
            TarefaSeeder::class,
            ConvocatoriaSeeder::class,
            ObservacaoSeeder::class,
            AnaliseEventoSeeder::class,
            EstatisticaEquipaSeeder::class,
            EstatisticaJogadorSeeder::class,
        ]);
    }
}

