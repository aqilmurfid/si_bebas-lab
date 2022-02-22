<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'nama'=>'Murfid Aqil',
            'nip'=>'1234567890',
            'email'=>'murfidaqil8@gmail.com',
            'no_hp'=>'082182708791',
            'role'=>'LABORAN',
            'password'=>Hash::make('password')
        ]);


        User::create([
            'nama'=>'Mufti Restu Mahesa',
            'npm'=>'G1A019014',
            'email'=>'mufti.restumahesa@gmail.com',
            'no_hp'=>'0811748512',
            'role'=>'MAHASISWA',
            'password'=>Hash::make('password')
        ]);

        User::create([
            'nama'=>'Ferzha Pura Utama',
            'nip'=>'1234567890',
            'email'=>'ferzha@gmail.com',
            'no_hp'=>'081122334455',
            'role'=>'KEPALA LAB',
            'password'=>Hash::make('password')
        ]);

    }
}
