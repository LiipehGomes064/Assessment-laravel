@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <h2>Edit Event</h2>
    <form action="{{ route('events.update', $event) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="event_name" class="form-label">Event Name</label>
            <input type="text" class="form-control" id="event_name" name="event_name" value="{{ old('event_name', $event->event_name) }}" required>
        </div>

        <div class="mb-3">
            <label for="event_date" class="form-label">Date</label>
            <input type="date" class="form-control" id="event_date" name="event_date" value="{{ old('event_date', $event->event_date->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label for="event_description" class="form-label">Description</label>
            <textarea class="form-control" id="event_description" name="event_description" rows="5" required>{{ old('event_description', $event->event_description) }}</textarea>
        </div>

        <div class="mb-3">
            <label for="event_image" class="form-label">Event Image</label>
            <input type="file" class="form-control" id="event_image" name="event_image">
            @if($event->event_image)
                <div class="mt-2">
                    <img src="{{ asset($event->event_image) }}" alt="Imagem Atual do Evento" style="max-width: 200px;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Save</button>
        <a href="{{ route('events') }}" class="btn btn-secondary">Cancel</a>
    </form>
</div>
@endsection
