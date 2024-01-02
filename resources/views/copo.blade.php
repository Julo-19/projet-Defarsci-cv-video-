<x-app-layout>
    <x-slot>
        <h2>
            {{ _('Dashboard')}}
        </h2>
    <x-slot>

    @foreach($post as $posts)

        <h1>{{$posts->title}}</h1>

        <h3>{{$posts->description}}</h3>

    @endforeach

    <livewire:comments :model="$posts"/>

</x-app-layout>