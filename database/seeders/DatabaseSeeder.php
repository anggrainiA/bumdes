<?php

namespace Database\Seeders;
use App\Models\Pengelola;
use App\Models\ProfilBumdes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Pengelola::create([
            'nama'=>'bayu',
            'id'=>Str::random(30),
            'status'=>'Ketua',
            'no_telp'=>'414123',
            'alamat'=>'w',
            'foto'=>'w',
            'password'=>Hash::make('user1234'),
        ]);
        Pengelola::create([
            'nama'=>'anggi',
            'id'=>Str::random(30),
            'status'=>'Bendahara',
            'no_telp'=>'11111',
            'alamat'=>'w',
            'foto'=>'w',
            'password'=>Hash::make('user1234'),
        ]);
        profilbumdes::create([
            'id'=>Str::random(30),
            'nama'=>'bayu',
            'alamat'=>'w',
            'foto'=>'w',
        ]);


    }
}
