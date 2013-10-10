<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Laravel PHP Framework</title>
</head>
<body>
<nav id="navbar" style="margin-bottom: 20px;">
    <a href="/create/">Upload Image...</a>
</nav>
<section id="main">
@foreach ($images as $image)
    <img src="/image/{{ $image->Checksum }}" />
@endforeach
</section>
</body>
</html>
