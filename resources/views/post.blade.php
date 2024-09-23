<x-layout>
    <x-slot:title>{{ $title }}</x-slot>
    <article class="py-8 max-w-screen-md border-b border-gray-300">
        <h2 class="mb-1 text-3xl tracking-tight font-bold text-gray-900">{{ $post['name'] }}</h2>
        <div class="text-base text-gray-500">
            <p><a href="#">{{ $post['city'] }}</a>, {{ $post->created_at->diffForHumans() }}</p>
            <p>{{ $post['author'] }} - {{ $post['publisher'] }}</p>
        </div>
        <p class="my-4 font-light">
            {{ $post['body'] }}
        </p>

        <a class="font-medium text-gray-900 border-blue-200 bg-blue-300 p-3
            rounded-sm" href="/posts">&laquo;
            Back to posts </a>
    </article>
</x-layout>
