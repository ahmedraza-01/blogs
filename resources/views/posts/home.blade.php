<x-app-layout>
    @section('main')
    
        <!-- Cover Image Section -->
        <div class="cover-image-container" style="margin-top:0px;position: relative; height: 450px; width: 100%;padding:0%">
            <div class="cover-image" style="background-image: url('{{ asset('images/cover-4.jpg') }}'); background-size: cover; background-position: center; height: 100%; width: 100%;"></div>
            <div class="cover-button" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); text-align: center;">
                <a href="{{ route('posts.index') }}" style="padding: 15px 30px; font-size: 1.5rem; font-weight: bold; color: white; background-color: rgba(0, 123, 255, 0.8); border: none; border-radius: 5px; text-decoration: none; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.3); transition: background-color 0.3s ease, box-shadow 0.3s ease;">
                    Start Blog Now
                </a>
            </div>
            
        </div>
      
        <div class="container">
        <h1 class="display-4 mt-4 mb-4">All Posts</h1>
        
        <div class="row" style="margin-bottom: 18vh">
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
    <div class="cover-image-container" style="position: relative; height: 500px; width: 100%;">
        <div class="cover-image" style="background-image: url('{{ asset('images/cover-3.jpg') }}'); background-size: cover; background-position: center; height: 100%; width: 100%;"></div>
        <div class="cover-text" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%); color: white; text-align: center; font-size: 2.5rem; font-weight: bold; padding: 0 20px; background-color: rgba(0, 0, 0, 0.5); border-radius: 10px;">
            “Explore Our Latest Blog Posts”
        </div>
    </div>
    
    @endsection
</x-app-layout>
