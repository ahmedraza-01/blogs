<x-app-layout>
    @section('main')
    <style>.ck.ck-editor__editable_inline {
        border: 1px solid transparent;
        overflow: auto;
        padding: 0 var(--ck-spacing-standard);
        height: 300px; /* Adjust this value as needed */
    }</style>
    <div class="container mt-5">
        <h1 class="display-4">Create Post</h1>
        <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    
            <div class="form-group mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" name="title" class="form-control" required>
            </div>
    
            <div class="mb-4">
                <label for="body" class="form-label">Content</label>
                <textarea name="body" id="body-editor" class="form-control" rows="10" style="height: 300px; opacity: 0; position: absolute; left: -9999px;" required></textarea>
            </div>
            
            <div class="form-group mb-3">
                <label for="excerpt" class="form-label">Excerpt</label>
                <textarea name="excerpt" id="excerpt-editor" class="form-control" rows="10" style="height: 300px; opacity: 0; position: absolute; left: -9999px;" required></textarea>
            </div>
    
            <div class="form-group mb-3">
                <label for="category_id" class="form-label">Category</label>
                <select name="category_id" id="category_id" class="form-control" required>
                    <option value="">Select a category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
    
            <div class="form-group mb-3">
                <label for="image" class="form-label">Feature Image</label>
                <input type="file" name="image" id="image" class="form-control">
            </div>
    
            <button  formnovalidate="formnovalidate" type="submit" class="btn btn-primary">Create Post</button>
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
            plugins: [Essentials, Bold, Italic, Font, Paragraph,Heading],
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
