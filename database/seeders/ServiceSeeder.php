<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;

class ServiceSeeder extends Seeder
{
    public function run(): void
    {
        Service::create([
            'name' => 'Classic Haircut',
            'description' => 'Potongan rambut klasik yang rapi dan cocok untuk berbagai gaya.',
            'price' => 35000,
            'duration' => 45,
            'status' => 'active',
        ]);

        Service::create([
            'name' => 'Fade Haircut',
            'description' => 'Potongan fade modern dengan hasil clean dan stylish.',
            'price' => 45000,
            'duration' => 60,
            'status' => 'active',
        ]);

        Service::create([
            'name' => 'Haircut + Wash',
            'description' => 'Potong rambut sekaligus keramas untuk hasil lebih fresh.',
            'price' => 50000,
            'duration' => 60,
            'status' => 'active',
        ]);

        Service::create([
            'name' => 'Beard Trim',
            'description' => 'Perawatan dan perapian jenggot agar terlihat lebih rapi.',
            'price' => 25000,
            'duration' => 30,
            'status' => 'active',
        ]);

        Service::create([
            'name' => 'Haircut + Beard',
            'description' => 'Paket haircut dan beard grooming.',
            'price' => 60000,
            'duration' => 75,
            'status' => 'active',
        ]);
    }
}