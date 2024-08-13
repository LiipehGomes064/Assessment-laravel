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
                        <a href="#" class="btn btn-primary">Saiba mais</a>
                        <a href="#" class="btn btn-secondary">Edit</a>
                        <a href="#" class="btn btn-danger">Delete</a>
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection
