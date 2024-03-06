<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    public function run()
    {
        // Seeder 1
        DB::table('users')->insert([
            'name' => 'rizkypratama',
            'First_Name' => 'Rizky',
            'Last_Name' => 'Pratama',
            'Status' => 'Mahasiswa Teknik Informatika',
            'Location' => 'Jakarta',
            'email' => 'rizky.pratama@gmail.com',
            'password' => bcrypt('password123'),
            'profile_path' => 'path/to/rizky.jpg',
            'Phone' => '081234567890',
            'Birthday' => '2000-05-15',
            'gender' => 'Laki-laki',
        ]);

        // Seeder 2
        DB::table('users')->insert([
            'name' => 'noviantiindah',
            'First_Name' => 'Novianti',
            'Last_Name' => 'Indah',
            'Status' => 'Mahasiswi Ekonomi',
            'Location' => 'Surabaya',
            'email' => 'novi.indah@gmail.com',
            'password' => bcrypt('password123'),
            'profile_path' => 'path/to/novianti.jpg',
            'Phone' => '087654321098',
            'Birthday' => '1998-09-20',
            'gender' => 'Perempuan',
        ]);

        // Seeder 3
        DB::table('users')->insert([
            'name' => 'fahrulhidayat',
            'First_Name' => 'Fahrul',
            'Last_Name' => 'Hidayat',
            'Status' => 'Mahasiswa Teknik Elektro',
            'Location' => 'Bandung',
            'email' => 'fahrul.hidayat@gmail.com',
            'password' => bcrypt('password123'),
            'profile_path' => 'path/to/fahrul.jpg',
            'Phone' => '089876543210',
            'Birthday' => '2001-03-08',
            'gender' => 'Laki-laki',
        ]);

        // Seeder 4
        DB::table('users')->insert([
            'name' => 'lutfiah',
            'First_Name' => 'Lutfi',
            'Last_Name' => 'Ahmad',
            'Status' => 'Mahasiswa Psikologi',
            'Location' => 'Yogyakarta',
            'email' => 'lutfi.ahmad@gmail.com',
            'password' => bcrypt('password123'),
            'profile_path' => 'path/to/lutfi.jpg',
            'Phone' => '081122334455',
            'Birthday' => '1999-11-10',
            'gender' => 'Laki-laki',
        ]);

        // Seeder 5
        DB::table('users')->insert([
            'name' => 'sitisalma',
            'First_Name' => 'Siti',
            'Last_Name' => 'Salma',
            'Status' => 'Dosen Matematika',
            'Location' => 'Semarang',
            'email' => 'siti.salma@gmail.com',
            'password' => bcrypt('password123'),
            'profile_path' => 'path/to/siti.jpg',
            'Phone' => '082112233445',
            'Birthday' => '1980-07-25',
            'gender' => 'Perempuan',
        ]);
    }
}
