<!DOCTYPE html>
<html>
<head>
    <title>New Post Created</title>
</head>
<body>
    <h1>{{ $post->title }}</h1>
    <p>New post has been created by {{ $post->user->name }}.</p>
    <p>Read the post at: {{ route('posts.show', $post->id) }}</p>
</body>
</html>
