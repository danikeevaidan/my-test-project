@extends('layouts.app')

@section('title', 'Home')

@section('content')
    <h1>Welcome to My Application</h1>

    <div class="row">
        @foreach ($users as $user)
            <div class="col-md-4">
                <x-user-card :user="$user" />
            </div>
        @endforeach
    </div>
@endsection
