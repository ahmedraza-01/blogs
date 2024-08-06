<x-app-layout>

<div class="container mx-auto">
    <div class="p-4 border rounded shadow-sm">
    @if ($post->image)
        <img src="{{ asset('storage/image/' . $post->image) }}" alt="Post picture" class="mt-4 mb-4 w-full h-64 object-cover">
        @endif
        <h1 class="text-2xl font-bold mb-4 mt-4">{{ $post->title }}</h1>
        <p>{{ $post->body }}</p>
        @if (Auth::id() == $post->user_id) 

        
        <div class="flex space-x-4 mt-4">
            <a href="{{ route('posts.edit', $post->id) }}" class="text-blue-500">Edit</a>
            <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-500">Delete</button>
            </form>
        </div>
        @endif
    </div>
</div>
</x-app-layout>

