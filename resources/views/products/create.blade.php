<!-- resources/views/products/create.blade.php -->

@extends('layouts.app')

@section('content')
    <div style="width: auto; padding:5px; ">
        @if (session('success'))
        <div style="color: red;" class="alert alert-success alert-dismissable fade-show" role="alert">
            <i class="mdi mdi-check-all me6-2"></i>
            {{session('success')}}
            <button type="button" class="btn-close" data-bs-dismis="alert" area-label="close" ><a href="/products/create">OK</a></button>
            @endif

        </div>

    </div>

    <div class="create-product">
        <h2 class="text-2xl font-bold mb-4">Add New Product</h2>
        <form action="{{route('store')}}" method="POST">
            @csrf
            <div class="mb-4">
                <label for="name" class="block text-gray-600">Product Name:</label>
                <input type="text" name="name" class="w-full border rounded px-4 py-2" value="{{old('name')}}" >
            </div>
            @error('name')
            <p class="text-danger" >{{$message}}</p>
            @enderror
            <div class="form-label">
                <label for="price" class="block text-gray-600">Product Price:</label>
                <input type="number" name="price" class="w-full border rounded px-4 py-2" value="{{old('price')}}" >

            </div>
            @error('price')
            <p class="text-danger" >{{$message}}</p>
            @enderror

            <div class="mb-4">
                <label for="quantity" class="block text-gray-600">Product Quantity:</label>
                <input type="number" name="quantity" class="w-full border rounded px-4 py-2" value="{{old('quantity')}}" >
            </div>
            @error('quantity')
            <p class="text-danger" >{{$message}}</p>
            @enderror
            <div class="mb-4">
                <label for="description" class="block text-gray-600">Description:</label>
                <input type="text" name="description" class="w-full border rounded px-4 py-2" value="{{old('description')}}" >
            </div>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-700">Add Product</button>
        </form>
    </div>
@endsection

