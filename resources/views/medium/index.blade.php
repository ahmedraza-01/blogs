<x-app-layout>
    @section('main')
    <h1>Medium Blog Posts</h1>
    <ul>
        @foreach($posts as $post)
            <li>
                <a href="{{ $post['url'] }}" target="_blank">{{ $post['title'] }}</a>
            </li>
        @endforeach
    </ul>
    
@endsection
</x-app-layout>
      
