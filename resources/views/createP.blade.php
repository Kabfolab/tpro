<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8"> 
    <meta name="viewport" content="width=device-width, initial-scale=1">
	  <title>Add Product Details</title>
    <link rel="stylesheet" type="text/css" href="exam.css">
</head>
<body>





<div class="container">
    <h2>Create Product</h2>
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf

        <div class="form-group">
            <label for="product_name">Product Name</label>
            <input type="text" class="form-control" id="product_name" name="product_name" required>
        </div>

        <div class="form-group">
            <label for="price">Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="form-group">
            <label for="description">Description</label>
            <textarea class="form-control" id="description" name="description" rows="4" required></textarea>
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" class="form-control-file" id="image" name="image">
        </div>

        <button type="submit" class="btn btn-primary">Add</button>
    </form>
</div>


<script>
        @if(session('success'))
            // Display a JavaScript alert with the success message
            alert("{{ session('success') }}");
        @endif
    </script>
</body>
</html>
