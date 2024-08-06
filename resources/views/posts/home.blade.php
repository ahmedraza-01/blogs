<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
       
    </x-slot>

    <div class=" flex justify-end mr-8 mt-4 mb-4">
        <a href="{{ route('posts.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            My Posts
        </a>
    </div>
    <div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">All Posts</h1>
    <div class="grid grid-cols-2 gap-4">
        @foreach($posts as $post)
        <div class="p-4 border-2 rounded shadow-sm">
            <h2 class="text-xl font-semibold">{{ $post->title }}</h2>
            <p>{{ $post->excerpt }}</p>
            <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 font-bold">Read More..</a>
            </div>
        @endforeach
    </div>
</div>

   
</x-app-layout>
