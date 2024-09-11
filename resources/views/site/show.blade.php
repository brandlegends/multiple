<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $page->meta_title ?? $page->title }}</title>
    <meta name="description" content="{{ $page->meta_description }}">
</head>
<body>
    <h1>{{ $page->title }}</h1>
    <div>{!! $page->content !!}</div>
</body>
</html>