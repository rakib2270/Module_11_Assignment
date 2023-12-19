<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>StoreKeeper</title>
    <link href="{{asset('assets/dashboard/style.css')}}" rel="stylesheet" >

</head>
<body class="bg-gray-100">

<div class="sidebar">


  <a class="active" href="/">Dashboard</a>
  <a href="{{route('products')}}">Product List</a>
  <a href="/products/create">Add Product</a>
  <a href="{{route('updateView')}}"> Update Price</a>
  <a href="/">All Transection</a>
</div>

<div class="content">
    <div class="container mx-auto mt-8">
        @yield('content')
    </div>
</div>




 </body>
</html>
