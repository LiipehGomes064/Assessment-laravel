@extends('layouts.app')

@section('content')
<div class="container"></div>
<div class="container">
    <h1>Create a New Event</h1>
    <form action="{{ route('events.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="event_name">Event Name</label>
            <input type="text" class="form-control" id="event_name" name="event_name" required>
        </div>
        <div class="form-group">
            <label for="event_date">Event Date</label>
            <input type="date" class="form-control" id="event_date" name="event_date" required>
        </div>
        <div class="form-group">
            <label for="event_description">Event Description</label>
            <textarea class="form-control" id="event_description" name="event_description"></textarea>
        </div>
        <div class="form-group">
            <label for="event_image">Event Image</label>
            <input type="file" class="form-control-file" id="event_image" name="event_image">
        </div>
        <button type="submit" class="btn btn-primary">Create Event</button>
    </form>
</div>
<div class="container"></div>
@endsection
