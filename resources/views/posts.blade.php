<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    @foreach ($posts as $post)
        <article class="py-8 max-w-screen-md border-b border-gray-300">
            <a href="/posts/{{ $post['slug'] }}" class="hover:underline">
                <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['name'] }}</h2>
            </a>
            <div class="text-base text-gray-500">
                <p><a href="#">{{ $post['city'] }}</a>, {{ $post->created_at->diffForHumans() }}</p>
                <p>{{ $post['author'] }} - {{ $post['publisher'] }}</p>
            </div>
            <p class="my-4 font-light">
                {{ Str::limit($post['body'], 100) }}
            </p>
            <a class="font-medium text-gray-900 border-blue-200 bg-blue-300 p-3
            rounded-sm"
                href="/posts/{{ $post['slug'] }}">Read More &raquo;</a>
        </article>
    @endforeach
</x-layout>
