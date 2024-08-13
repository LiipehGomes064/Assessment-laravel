<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon; // Importar a classe Carbon

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::all();

        // Converter a data para Carbon
        foreach ($events as $event) {
            $event->event_date = Carbon::parse($event->event_date);
        }

        return view('events', compact('events'));
    }
}
