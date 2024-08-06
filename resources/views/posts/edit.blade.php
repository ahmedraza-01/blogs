<x-app-layout>
<div class="container mx-auto">
    <h1 class="text-2xl font-bold mb-4">Edit Post</h1>
    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <label for="title" class="block text-sm font-medium">Title</label>
            <input type="text" name="title" id="title" class="border p-2 rounded w-full" value="{{ $post->title }}" required>
        </div>
        <div class="mb-4">
            <label for="excerpt" class="block text-sm font-medium">Excerpt</label>
            <textarea name="excerpt" id="excerpt" class="border p-2 rounded w-full" required>{{ $post->excerpt }}</textarea>
        </div>
        <div class="mb-4">
            <label for="body" class="block text-sm font-medium">Body</label>
            <textarea name="body" id="body" class="border p-2 rounded w-full" required>{{ $post->body }}</textarea>
        </div>
        <div class="mb-4">
            <label for="picture" class="block text-sm font-medium">Picture</label>
            <input type="file" name="image" id="image" class="border p-2 rounded w-full">
            @if ($post->image)
            <img src="{{ asset('storage/image/' . $post->image) }}" alt="Current picture" class="mt-4 w-32 h-32 object-cover">
            @endif
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Update Post</button>
    </form>
</div>
</x-app-layout>