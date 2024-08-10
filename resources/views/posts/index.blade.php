<x-app-layout>
    @section('main')
    <div class="container py-5">
        <div class="d-flex justify-content-between mb-4">
            <h2 class="h4 font-weight-bold">My Posts</h2>
            <a href="{{ route('posts.create') }}" class="btn btn-primary">
                + Add new Post
            </a>
        </div>
        <div class="card p-4">
            @if ($posts->isEmpty())
                <p class="text-muted">You have no posts yet.</p>
            @else
                <table class="table table-striped">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th scope="col">Sr.</th>
                            <th scope="col">Post Title</th>
                            <th scope="col">Category</th>
                            <th scope="col">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($posts as $index => $post)
                            <tr class="text-center">
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->category->name }}</td>
                                <td>
                                    <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary btn-sm">View</a>
                                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm ml-2">Edit</a>
                                    <form action="{{ route('posts.destroy', $post->id) }}" method="POST" class="d-inline ml-2" onsubmit="return confirm('Are you sure you want to delete this post?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                                
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </div>
    @endsection
    </x-app-layout>
    