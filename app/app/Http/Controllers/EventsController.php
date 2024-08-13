<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventsController extends Controller
{
    public function index()
    {
        $events = Event::all();

        foreach ($events as $event) {
            $event->event_date = Carbon::parse($event->event_date);
        }

        return view('events', compact('events'));
    }

    public function edit(Event $event)
    {
        return view('edit_event', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_description' => 'required|string',
            'event_image' => 'nullable|image|max:2048',
        ]);

        $event->event_name = $request->event_name;
        $event->event_date = Carbon::parse($request->event_date);
        $event->event_description = $request->event_description;

        if ($request->hasFile('event_image')) {
            $event->event_image = $request->file('event_image')->store('events');
        }

        $event->save();

        return redirect()->route('events')->with('success', 'Evento atualizado com sucesso!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->route('events')->with('success', 'Evento excluído com sucesso!');
    }
}
