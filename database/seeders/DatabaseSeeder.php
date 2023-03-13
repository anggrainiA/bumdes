<?php

namespace Database\Seeders;
use App\Models\Pengelola;
use App\Models\Pelanggan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Crypt;
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
            'id'=>'test1',
            'status'=>'Ketua',
            'no_telp'=>'414123',
            'alamat'=>'w',
            'foto'=>'w',
            'password'=>Hash::make('user1234'),
        ]);

        Pelanggan::create([
            'nama'=>'Semeton',
            'kontak'=>'08',
            'alamat'=>'w',

        ]);


    }
}
