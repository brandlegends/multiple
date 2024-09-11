<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $site->domain }}</title>
</head>
<body>
    <h1>Posts for {{ $site->domain }}</h1>
    <ul>
        @foreach ($posts as $post)
            <li>
                <h2>{{ $post->title }}</h2>
                <p>{{ $post->content }}</p>
            </li>
        @endforeach
    </ul>
</body>
</html>