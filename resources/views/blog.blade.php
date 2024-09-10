<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    @foreach ($articles as $article)
        <article>
            <h2>{{ $article['name'] }}</h2>
            <p>Author : {{ $article['author'] }}</p>
            <p>Release Date : {{ $article['release_date'] }}</p>
            <p>Publisher : {{ $article['publisher'] }}</p>
            <p>City : {{ $article['city'] }}</p>
        </article>
    @endforeach
</x-layout>
