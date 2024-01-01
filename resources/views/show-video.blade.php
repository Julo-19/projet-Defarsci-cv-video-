@extends('components.navbar')


@section('content')
<video width="640" height="360" controls>
    <source src="{{ asset('storage/' . $video->path) }}" type="video/mp4">
    Votre navigateur ne supporte pas la lecture de vidéos.
</video>

<p>aimer</p>

@endsection
    