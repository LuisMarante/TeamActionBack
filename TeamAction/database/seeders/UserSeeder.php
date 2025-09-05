<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'tipo_acesso' => 1, // Exemplo: 1 para Administrador
                'name' => 'António Silva',
                'data_nascimento' => '1990-05-15',
                'genero' => 'Masculino',
                'telefone' => '912345678',
                'email' => 'antonio.silva@exemplo.com',
                'email_verified_at' => Carbon::now(),
                'funcao' => 'Administrador',
                'foto_perfil_url' => 'http://example.com/fotos/antonio.jpg',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tipo_acesso' => 2, // Exemplo: 2 para Gestor de Equipa
                'name' => 'Maria Santos',
                'data_nascimento' => '1992-08-22',
                'genero' => 'Feminino',
                'telefone' => '961234567',
                'email' => 'maria.santos@exemplo.com',
                'email_verified_at' => Carbon::now(),
                'funcao' => 'Gestor de Equipa',
                'foto_perfil_url' => 'http://example.com/fotos/maria.jpg',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tipo_acesso' => 3, // Exemplo: 3 para Jogador
                'name' => 'João Pereira',
                'data_nascimento' => '1995-11-10',
                'genero' => 'Masculino',
                'telefone' => '934567890',
                'email' => 'joao.pereira@exemplo.com',
                'email_verified_at' => Carbon::now(),
                'funcao' => 'Membro',
                'foto_perfil_url' => 'http://example.com/fotos/joao.jpg',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tipo_acesso' => 3,
                'name' => 'Ana Rodrigues',
                'data_nascimento' => '1998-03-01',
                'genero' => 'Feminino',
                'telefone' => '927890123',
                'email' => 'ana.rodrigues@exemplo.com',
                'email_verified_at' => Carbon::now(),
                'funcao' => 'Membro',
                'foto_perfil_url' => 'http://example.com/fotos/ana.jpg',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
            [
                'tipo_acesso' => 3,
                'name' => 'Pedro Almeida',
                'data_nascimento' => '1988-06-30',
                'genero' => 'Masculino',
                'telefone' => '919876543',
                'email' => 'pedro.almeida@exemplo.com',
                'email_verified_at' => null,
                'funcao' => 'Membro',
                'foto_perfil_url' => 'http://example.com/fotos/pedro.jpg',
                'password' => Hash::make('password'),
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now(),
            ],
        ]);
    }
}