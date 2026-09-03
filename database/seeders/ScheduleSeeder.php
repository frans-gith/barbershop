<?php

namespace Database\Seeders;

use App\Models\Barber;
use App\Models\Schedule;
use Illuminate\Database\Seeder;

class ScheduleSeeder extends Seeder
{
    public function run(): void
    {
        $barbers = Barber::all();

        $days = [
            'Senin',
            'Selasa',
            'Rabu',
            'Kamis',
            'Jumat',
            'Sabtu',
        ];

        foreach ($barbers as $barber) {
            foreach ($days as $day) {
                Schedule::create([
                    'barber_id' => $barber->id,
                    'day' => $day,
                    'start_time' => '09:00',
                    'end_time' => '20:00',
                    'is_active' => true,
                ]);
            }
        }
    }
}