<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.ckeditor.com/ckeditor5/43.0.0/ckeditor5.css" />

    <title>Document</title>
</head>
<body>
    <h1>add CK here</h1>
    <h1 class="text-2xl font-bold mt-10">Create Post</h1>
    <form action="" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="mb-4">
            <label for="title" class="block text-sm font-medium mt-8">Title</label>
            <input type="text" name="title" class="border p-2 rounded w-full" required>
        </div>

        <div class="mb-4">
            <label for="body" class="block text-sm font-medium">Content</label>
            <textarea name="body" id="editor" required></textarea>
        </div>
        <div class="mb-4">
            <label for="excerpt" class="block text-sm font-medium">Excerpt</label>
            <textarea name="excerpt" class="tiny" class="border p-2 rounded w-full" required></textarea>
        </div>
      
        <div class="mb-4">
            <label for="image" class="block text-sm font-medium">Feature Image</label>
            <input type="file" name="image" id="image" class="border p-2 rounded w-full">
        </div>
        <button type="submit" class="bg-blue-500 text-white p-2 rounded">Create Post</button>
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
        import {
            ClassicEditor,
            Essentials,
            Bold,
            Italic,
            Font,
            Paragraph
        } from 'ckeditor5';
    
        ClassicEditor
            .create( document.querySelector( '#editor' ), {
                plugins: [ Essentials, Bold, Italic, Font, Paragraph ],
                toolbar: {
                    items: [
                        'undo', 'redo', '|', 'bold', 'italic', '|',
                        'fontSize', 'fontFamily', 'fontColor', 'fontBackgroundColor'
                    ]
                }
            } )
            .then( /* ... */ )
            .catch( /* ... */ );
    </script>
    
</body>
</html>