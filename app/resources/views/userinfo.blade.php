@extends('layouts.app')

<link rel="stylesheet" href="{{asset('userinfo.css')}}">

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <img class="card-img-top" src="{{$user->image}}" alt="Foto do Usuário">
                <div class="card-body">
                    <h5 class="card-title">{{ $user->first_name }} {{ $user->last_name }}</h5>
                </div>
            </div>
        </div>
        <div class="espace"></div>
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Informações do Usuário</h5>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                        <li class="list-group-item"><strong>Idade:</strong> {{ $user->age }}</li>
                        <li class="list-group-item"><strong>Telefone:</strong> {{ $user->phone }}</li>
                        <li class="list-group-item"><strong>Endereço:</strong> {{ $user->address }}</li>
                        <li class="list-group-item"><strong>Resumo Profissional:</strong> {{ $user->professional_summary }}</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
