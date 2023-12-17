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
  <a href="/products/store">Product List</a>
  <a href="/products/create">Add Product</a>
  <a href="#about">Update Product</a>
  <a href="/products/sell">Sell Product</a>
  <a href="/transaction-history">Transection History</a>
</div>

<div class="content">
    <div class="container mx-auto mt-8">
        @yield('content')
    </div>
</div>
    
    


 </body>
</html>
