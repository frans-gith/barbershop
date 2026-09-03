<?php

namespace Database\Seeders;

use App\Models\Barber;
use Illuminate\Database\Seeder;

class BarberSeeder extends Seeder
{
    public function run(): void
    {
        Barber::create([
            'name' => 'Andi Pratama',
            'phone' => '081234567890',
            'specialization' => 'Classic Haircut',
            'description' => 'Berpengalaman dalam classic haircut dan modern hairstyle.',
            'status' => 'active',
        ]);

        Barber::create([
            'name' => 'Bima Saputra',
            'phone' => '081234567891',
            'specialization' => 'Fade & Styling',
            'description' => 'Spesialis fade haircut, styling, dan modern haircut.',
            'status' => 'active',
        ]);

        Barber::create([
            'name' => 'Raka Wijaya',
            'phone' => '081234567892',
            'specialization' => 'Hair & Beard',
            'description' => 'Spesialis haircut, beard trim, dan grooming.',
            'status' => 'active',
        ]);
    }
}