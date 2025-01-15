<div class="card" style="width: 18rem;">
    <img src="{{ $user->profile_picture_url }}" class="card-img-top" alt="{{ $user->name }}">
    <div class="card-body">
        <h5 class="card-title">{{ $user->name }}</h5>
        <p class="card-text">{{ $user->email }}</p>
        <a href="{{ route('users.show', $user->id) }}" class="btn btn-primary">View Profile</a>
    </div>
</div>
