<x-app-layout>
    @section('main')
    <style>.ck.ck-editor__editable_inline {
        border: 1px solid transparent;
        overflow: auto;
        padding: 0 var(--ck-spacing-standard);
        height: 300px; /* Adjust this value as needed */
    }</style>
    <div class="container">
        <h1 class="h2 font-weight-bold mb-4">Edit Post</h1>
        <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" id="title" class="form-control" value="{{ $post->title }}" required>
            </div>
            
            <div class="mb-3">
                <label for="body" class="form-label">Body</label>
                <textarea name="body" id="body-editor" class="form-control" required>{{ $post->body }}</textarea>
            </div>
            <div class="mb-3">
                <label for="excerpt" class="form-label">Excerpt</label>
                <textarea name="excerpt" id="excerpt-editor" class="form-control" required>{{ $post->excerpt }}</textarea>
            </div>
            
            <div class="mb-3">
                <label for="category" class="form-label">Category</label>
                <select name="category_id" id="category" class="form-control" required>
                    <option value="" disabled>Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ $post->category_id == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            
            <div class="mb-3">
                <label for="picture" class="form-label">Picture</label>
                <input type="file" name="image" id="image" class="form-control">
                @if ($post->image)
                    <img src="{{ asset('storage/image/' . $post->image) }}" alt="Current picture" class="mt-3 img-thumbnail w-100 h-100 object-fit-cover" style="max-width: 8rem; max-height: 8rem;">
                @endif
            </div>
            
            <button formnovalidate="formnovalidate" type="submit" class="btn btn-primary">Update Post</button>
        </form>
    </div>
    <script type="importmap">
        {
            "imports": {
                "ckeditor5": "https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.js",
                "ckeditor5/": "https://cdn.ckeditor.com/ckeditor5/43.0.0/"
            }
        }
    </script>
    <script type="module">
        import { ClassicEditor,Heading, Essentials, Bold, Italic, Font, Paragraph,Title } from 'ckeditor5';
    
        const editorConfig = {
            plugins: [Essentials, Bold, Italic, Font, Paragraph, Heading],
            toolbar: {
                items: [
                    'undo', 'redo', '|', 'bold', 'italic', '|',
                    'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor','heading'
                ]
            },
            height: '500px' 
        };
    
        let bodyEditor, excerptEditor;
    
        // Initialize the CKEditor for body and excerpt
        ClassicEditor.create(document.querySelector('#body-editor'), editorConfig)
            .then(editor => {
                bodyEditor = editor;
            })
            .catch(error => console.error(error));
    
        ClassicEditor.create(document.querySelector('#excerpt-editor'), editorConfig)
            .then(editor => {
                excerptEditor = editor;
            })
            .catch(error => console.error(error));
    
        // Synchronize CKEditor data with the original textarea before form submission
        document.querySelector('form').addEventListener('submit', function(e) {
            if (bodyEditor) {
                bodyEditor.updateSourceElement();
            }
            if (excerptEditor) {
                excerptEditor.updateSourceElement();
            }
        });
    </script>
    @endsection
    </x-app-layout>
    