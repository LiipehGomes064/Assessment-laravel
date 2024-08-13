<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;
use Carbon\Carbon;

class EventsController extends Controller
{
    public function create()
    {
        return view('events.create');
    }

    // Método para salvar o novo evento no banco de dados
    public function store(Request $request)
    {
        // Validação básica dos dados
        $validatedData = $request->validate([
            'event_name' => 'required|string|max:255',
            'event_date' => 'required|date',
            'event_description' => 'nullable|string',
            'event_image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Criação do evento
        $event = new Event();
        $event->event_name = $validatedData['event_name'];
        $event->event_date = $validatedData['event_date'];
        $event->event_description = $validatedData['event_description'];

        // Salvar a imagem do evento (se houver)
        if ($request->hasFile('event_image')) {
            $imageName = time().'.'.$request->event_image->extension();  
            $request->event_image->move(public_path('images'), $imageName);
            $event->event_image = 'images/'.$imageName;
        }

        $event->save();

        return redirect()->route('events.index')->with('success', 'Evento criado com sucesso!');
    }

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
