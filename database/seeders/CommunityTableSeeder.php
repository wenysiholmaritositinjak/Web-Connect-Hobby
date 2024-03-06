<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\Community;

class CommunityTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Tambahkan data dummy ke dalam tabel community
        Community::create([
            'category_id' => 1,
            'title' => 'Komunitas Pecinta Olahraga',
            'slug' => 'komunitas-pecinta-olahraga',
            'image' => 'image1.jpg',
            'description' => 'Komunitas ini didedikasikan untuk para pecinta olahraga yang ingin berbagi pengalaman, tips, dan informasi seputar berbagai jenis olahraga. Kami memiliki kegiatan rutin seperti lari pagi, bersepeda santai, serta diskusi seputar olahraga terkini. Bergabunglah bersama kami untuk hidup lebih sehat!',
            'status' => 'Sport',
            'whatsapp' => '08123456789',
        ]);

        Community::create([
            'category_id' => 2,
            'title' => 'Komunitas Fotografi Kreatif',
            'slug' => 'komunitas-fotografi-kreatif',
            'image' => 'image2.jpg',
            'description' => 'Komunitas ini adalah tempat berkumpulnya para pecinta fotografi yang ingin bereksplorasi, belajar, dan berbagi karya fotografi kreatif. Kami menyelenggarakan workshop fotografi, hunting foto, serta pameran fotografi lokal. Mari bergabung dan kembangkan kreativitas fotografi bersama kami!',
            'status' => 'Photography',
            'whatsapp' => '087654321',
        ]);

        Community::create([
            'category_id' => 3,
            'title' => 'Komunitas Musik Indie',
            'slug' => 'komunitas-musik-indie',
            'image' => 'image3.jpg',
            'description' => 'Komunitas ini mengajak para pecinta musik indie untuk saling mendukung, berkolaborasi, dan mengeksplorasi musik dari berbagai genre indie. Kami mengadakan jam session musik, diskusi tentang musik independen, dan konser kecil. Mari bergabung dan ekspresikan dirimu melalui musik bersama kami!',
            'status' => 'Music',
            'whatsapp' => '08123456789',
        ]);

        Community::create([
            'category_id' => 4,
            'title' => 'Komunitas Kuliner Lokal',
            'slug' => 'komunitas-kuliner-lokal',
            'image' => 'image4.jpg',
            'description' => 'Komunitas ini menyediakan platform bagi para pecinta kuliner lokal untuk berbagi resep, pengalaman, dan mengeksplorasi aneka masakan lokal. Kami sering mengadakan acara masak bareng, tur kuliner, dan festival makanan. Bergabunglah dan nikmati kelezatan dari berbagai masakan daerah!',
            'status' => 'Culinary',
            'whatsapp' => '087654321',
        ]);

        Community::create([
            'category_id' => 5,
            'title' => 'Komunitas Travelling Enthusiast',
            'slug' => 'komunitas-travelling-enthusiast',
            'image' => 'image5.jpg',
            'description' => 'Komunitas ini diisi oleh para penggemar perjalanan yang ingin berbagi pengalaman, tips perjalanan, dan destinasi menarik di seluruh dunia. Kami sering mengadakan pertemuan travel sharing, trip bersama, serta acara diskusi tentang petualangan. Mari bergabung dan jelajahi dunia bersama kami!',
            'status' => 'Travel',
            'whatsapp' => '08123456789',
        ]);

        // Tambahkan entri lainnya jika diperlukan
    }
}
