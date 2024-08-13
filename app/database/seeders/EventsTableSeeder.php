<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            [
                'event_name' => 'Evento 1',
                'event_image' => 'https://via.placeholder.com/150',
                'event_description' => 'Descrição do Evento 1',
                'event_date' => Carbon::create('2024', '08', '01')
            ],
            [
                'event_name' => 'Evento 2',
                'event_image' => 'https://via.placeholder.com/150',
                'event_description' => 'Descrição do Evento 2',
                'event_date' => Carbon::create('2024', '08', '02')
            ],
            [
                'event_name' => 'Evento 3',
                'event_image' => 'https://via.placeholder.com/150',
                'event_description' => 'Descrição do Evento 3',
                'event_date' => Carbon::create('2024', '08', '03')
            ],
            [
                'event_name' => 'Evento 4',
                'event_image' => 'https://via.placeholder.com/150',
                'event_description' => 'Descrição do Evento 4',
                'event_date' => Carbon::create('2024', '08', '04')
            ],
            [
                'event_name' => 'Evento 5',
                'event_image' => 'https://via.placeholder.com/150',
                'event_description' => 'Descrição do Evento 5',
                'event_date' => Carbon::create('2024', '08', '05')
            ],
            [
                'event_name' => 'Evento 6',
                'event_image' => 'https://via.placeholder.com/150',
                'event_description' => 'Descrição do Evento 6',
                'event_date' => Carbon::create('2024', '08', '06')
            ],
            [
                'event_name' => 'Evento 7',
                'event_image' => 'https://via.placeholder.com/150',
                'event_description' => 'Descrição do Evento 7',
                'event_date' => Carbon::create('2024', '08', '07')
            ],
            [
                'event_name' => 'Evento 8',
                'event_image' => 'https://via.placeholder.com/150',
                'event_description' => 'Descrição do Evento 8',
                'event_date' => Carbon::create('2024', '08', '08')
            ],
            [
                'event_name' => 'Evento 9',
                'event_image' => 'https://via.placeholder.com/150',
                'event_description' => 'Descrição do Evento 9',
                'event_date' => Carbon::create('2024', '08', '09')
            ],
        ];

        DB::table('events')->insert($events);
    }
}
