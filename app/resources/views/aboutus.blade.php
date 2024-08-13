@extends('layouts.app')

<link rel="stylesheet" href="{{asset('aboutus.css')}}">

@section('content')
    <main class="container my-5">
        <h2 class="mb-4">About Us</h2>

        <div class="row">
            <div class="col-md-6 mb-4">
                <img src="alunos.jpeg" alt="About Us Image" class="img-fluid rounded shadow">
            </div>
            <div class="col-md-6">
                <p>
                    The Career Training College is an approved provider of the government's ICT50220 Diploma of
                    Information Technology course through Jobs and Skills WA, under the Participation – Work
                    Readiness program. Career Training College conducts numerous events every month for its students
                    as part of the Job Ready Program. Until now, all participants' names have been manually recorded.
                    As a result, the event manager has decided to keep a record of active participants as active members
                    for these events. Active members will be registered by the event manager on the "Career Training
                    College Event Team" website, based on the participants' interests. Since the members are listed in
                    the website's system, it simplifies the process for the event manager to notify these members about
                    any new updates or events.
                </p>
                <h4 class="mt-4">Contact Information</h4>
                <p>
                    If you have any questions or need further information, please contact us at:
                </p>
                <ul class="list-unstyled">
                    <li><strong>Email:</strong> contact@careertrainingcollege.edu</li>
                    <li><strong>Phone:</strong> +1 (555) 123-4567</li>
                    <li><strong>Address:</strong> 1234 Education Lane, Learning City, ST 56789</li>
                </ul>
            </div>
        </div>
    </main>

@endsection
