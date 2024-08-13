@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row">
        @foreach ($events as $event)
            <div class="col-md-4 mb-4">
                <div class="card" style="width: 18rem;">
                    <img src="{{ $event->event_image }}" class="card-img-top" alt="Imagem do Evento">
                    <div class="card-body">
                        <h5 class="card-title">{{ $event->event_name }}</h5>
                        <h6 class="card-subtitle mb-2 text-muted">{{ $event->event_date->format('d/m/Y') }}</h6>
                        <p class="card-text">{{ $event->event_description }}</p>
                        @if (Auth::check() && Auth::user()->usertype == 1)
                        <a href="{{ route('events.edit', $event) }}" class="btn btn-secondary">Edit</a>
                        <form action="{{ route('events.destroy', $event) }}" method="POST" style="display: inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('Tem certeza que deseja excluir este evento?')">Delete</button>
                        </form>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
