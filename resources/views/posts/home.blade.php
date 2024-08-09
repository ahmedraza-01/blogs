<x-app-layout>
    @section('main')
    <div class="container">
        <!-- Cover Image Section -->
        <div class="cover-image-container" style="position: relative; height: 400px; width: 100%;">
            <div class="cover-image" style="background-image: url('{{ asset('images/cover-image.jpg') }}'); background-size: cover; background-position: center; height: 100%; width: 100%;"></div>
            <div class="cover-text" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; text-align: center; font-size: 2.5rem; font-weight: bold; padding: 0 20px; background-color: rgba(0, 0, 0, 0.5); border-radius: 10px;">
                “Explore Our Latest Blog Posts”
            </div>
        </div>
        
        <h1 class="display-4 mt-4 mb-4">All Posts</h1>
        
        <div class="row">
            @foreach($posts as $post)
            <div class="col-md-6 mb-4" style="width: 33%; height: 242px;">
                <div class="card h-100" style="background-image: url('{{ asset('storage/image/' . $post->image) }}'); background-size: cover; background-position: center;">
                    <div class="card-body" style="background-color: rgba(0, 0, 0, 0.5); color: white;">
                        <h2 class="card-title">{{ $post->title }}</h2>
                        <p class="card-text"><?= $post->excerpt ?></p>
                        <a href="{{ route('posts.show', $post->id) }}" class="btn btn-primary">Read More..</a>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endsection
</x-app-layout>
