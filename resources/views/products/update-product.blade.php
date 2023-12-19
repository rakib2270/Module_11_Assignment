<!-- Update Product-->


@extends('layouts.app')


@section('content')
    <h2>Update Prices</h2>


    <!-- Method To Show Message-->
        <div style="width: auto; padding:5px; ">
        @if (session('success'))
            <div style="color: red;" class="alert alert-success alert-dismissable fade-show" role="alert">
                <i class="mdi mdi-check-all me6-2"></i>
                {{session('success')}}
                <button type="button" class="btn-close" data-bs-dismis="alert" area-label="close" ><a href="/products/update-product">OK</a></button>
                @endif

            </div>

    </div>




    <!-- Method To View Product-->

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Description</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>${{ $product->price }}</td>
                <td>{{ $product->quantity }}</td>
                <td>{{ $product->description }}</td>



                <!-- Method To Update Price-->
                 <td>
                       <form action="/products/update-price/{{$product->id}} " method="post">
                        @csrf
                        @method('put')
                        <input style="width: 80px" type="number" name="new_price" placeholder="New Price" value="{{old('new_price')}}" required>

                        <button type="submit">Update Price</button>
                        </form>
                </td>




                <!-- Method To Update Quantity-->

                <td>
                       <form action="/products/update-quantity/{{$product->id}} " method="post">
                        @csrf
                        @method('put')
                        <input style="width: 100px" type="number" name="new_quantity" placeholder="New Quantity" value="{{ $product->quantity}}" required>

                        <button type="submit">Update Quantity</button>
                        </form>
                </td>





                <!-- Method To Delete A Product-->

                <td>
                    <form action="/products/delete/{{ $product->id }}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit">Delete</button>
                    </form>
                </td>





                <!-- Method To Sell Product-->
                <td>
                    <form action="/products/sale/{{$product->id}} " method="post">
                        @csrf
                        @method('put')
                        <input style="width: 80px" type="number" name="quantity_sold" value="1" placeholder="Quantity" required>
                        <button type="submit">Sell Product</button>
                    </form>
                </td>



            </tr>
        @endforeach
        </tbody>
    </table>





@endsection

