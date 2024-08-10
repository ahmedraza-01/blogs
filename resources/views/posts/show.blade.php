<x-app-layout>
@section('main')
    <div class="container">
        <div class="p-4 border rounded shadow-sm">
            @if ($post->image)
            <img src="{{ asset('storage/image/' . $post->image) }}" alt="Post picture" class="mt-4 mb-4 w-100 h-100 object-fit-cover">
            @endif
            <h1 class="h2 font-weight-bold mb-4 mt-4">{{ $post->title }}</h1>
            <p> <?=$post->body?> </p>
            @if (Auth::id() == $post->user_id || Auth::user()->hasRole('admin')) 
            
            <div class="d-flex gap-3 mt-4">
                <a href="{{ route('posts.edit', $post->id) }}" class="text-primary">Edit</a>
                <form action="{{ route('posts.destroy', $post->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this post?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="text-danger btn btn-link p-0">Delete</button>
                </form>
            </div>
            @endif
        </div>
    </div>
    @endsection
    </x-app-layout>
    