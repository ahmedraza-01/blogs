<x-app-layout>
<div class="container mx-auto py-8">
    <div class="flex justify-between mb-4">
        <h2 class="text-2xl font-semibold">My Posts</h2>
        <a href="{{ route('posts.create') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
            +Add new post
        </a>
    </div>
    <div class="bg-white shadow-md rounded p-6">
        @if ($posts->isEmpty())
            <p class="text-gray-500">You have no posts yet.</p>
        @else
            <table class="min-w-full bg-white">
                <thead>
                    <tr>
                        <th class="py-2 px-4 bg-gray-200">Sr.</th>
                        <th class="py-2 px-4 bg-gray-200">Post Title</th>
                        <th class="py-2 px-4 bg-gray-200">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($posts as $index => $post)
                        <tr class="border-b text-center">
                            <td class="py-2 px-4">{{ $index + 1 }}</td>
                            <td class="py-2 px-4">{{ $post->title }}</td>
                            <td class="py-2 px-4 ">
                                <a href="{{ route('posts.show', $post->id) }}" class="text-blue-500 hover:underline">View</a>
                                <a href="{{ route('posts.edit', $post->id) }}" class="text-yellow-500 hover:underline ml-2">Edit</a>
                                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="inline-block ml-2" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-500 hover:underline">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif
    </div>
</div>
</x-app-layout>
