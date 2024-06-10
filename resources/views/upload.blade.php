<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <!-- resources/views/upload.blade.php -->
<form action="{{ route('images.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="image">Choose an image:</label>
    <input type="file" id="image" name="image" required>
    <label for="description">Description:</label>
    <input type="text" id="description" name="description">
    <button type="submit">Upload</button>
</form>

</body>
</html>