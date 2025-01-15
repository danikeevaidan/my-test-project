@extends('layouts.app')

@section('title', 'Users and Posts')

@section('content')
    <h1>Users and their Posts</h1>

    @foreach ($users as $user)
        <div class="user">
            <h2>{{ $user->name }}</h2>

            @if ($user->posts->isEmpty())
                <p>No posts available.</p>
            @else
                <ul>
                    @foreach ($user->posts as $post)
                        <li>
                            <strong>{{ $post->title }}</strong> — Views: {{ $post->views_count }}
                        </li>
                    @endforeach
                </ul>
            @endif
        </div>
        <hr>
    @endforeach
@endsection
