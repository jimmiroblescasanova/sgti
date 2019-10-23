@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Bienvenido, {{ Auth::user()->name }}!</div>
                    <div class="card-body">
                        @if (session('success'))
                            @include('alerts.success')
                        @endif
                        <ul class="list-group">
                            @foreach($users as $user)
                                <li class="list-group-item shadow-sm border-0 d-flex justify-content-between mb-3">
                                    <span>{{ $user->name }}</span>
                                    <span><a href="{{ route('users.edit', $user) }}">Editar</a></span>
                                </li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
