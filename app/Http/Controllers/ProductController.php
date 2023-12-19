<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{

//====================Index====================
    public function index()
    {
        return view('layouts.app');
    }
      public function createForm()
    {
        return view('products.create');
    }




    //====================All Products====================
    public function products()
    {
        $products = DB::table('products')->get();

        return view('products/all-product', compact('products'));

    }


//====================store method====================
public function store(Request $request)
{
    $validatedData = $request->validate([
        'name' => 'required|string|max:25',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'description' => 'nullable|string|max:255',
    ]);

    DB::table('products')->insert($validatedData);

    return redirect('/products/create')->with('success', 'Product added successfully!');
}




//====================Sell method====================
    public function sell(Request $request)
{
    $productId = $request->input('product_id');
    $quantitySold = $request->input('quantity_sold');

    // Update product quantity
    DB::table('products')->where('id', $productId)->decrement('quantity', $quantitySold);

    return redirect('/dashboard')->with('success', 'Product sold successfully!');
}



//====================View All Products====================

    public function updateView()
    {
        $products = DB::table('products')->get();

        return view('products/update-product', compact('products'));

    }






//====================Update Price====================

    public function updatePrice(Request $request, $productId)
{
    $newPrice = $request->input('new_price');

    DB::table('products')->where('id', $productId)->update(['price' => $newPrice]);

    return redirect('/products/update-product')->with('success', 'Product price updated successfully!');
}





//====================Update Quantity====================

public function updateQuantity(Request $request, $productId)
{
    $newQuantity = $request->input('new_quantity');

    DB::table('products')->where('id', $productId)->update(['quantity' => $newQuantity]);

    return redirect('/products/update-product')->with('success', 'Product quantity updated successfully!');
}






//====================Sale  Product====================

    public function sellProduct(Request $request, $productId)
    {

        $quantitySold = $request->input('quantity_sold');
        // Retrieve product details
        $product = DB::table('products')->find($productId);

        // Ensure there is enough quantity to sell
        if ($product->quantity >= $quantitySold) {
            // Record the transaction
            DB::table('transactions')->insert([
                'product_id' => $productId,
                'product_name' => $product->name,
                'price' => $product->price,
                'quantity' => $quantitySold,
                'created_at' => now(),
                'updated_at' => now(),
            ]);


            // Update product quantity
            DB::table('products')->where('id', $productId)->decrement('quantity', $quantitySold);

            return redirect('/products/update-product')->with('success', 'Product sold successfully!');
        } else {
            return redirect('/products/update-product')->with('error', 'Not enough quantity to sell!');
        }
    }







//====================Delete A Product====================

    public function deleteProduct($productId)
    {

        DB::table('products')->where('id', $productId)->delete();

        return redirect('/products/update-product')->with('success', 'Product deleted successfully!');
    }




//====================Sales Summary===================
    public function dashboard()
    {
        // Calculate sales figures for today, yesterday, this month, and last month
        $todaySales = Product::whereDate('created_at', Carbon::today())->sum('price');
        $yesterdaySales = Product::whereDate('created_at', Carbon::yesterday())->sum('price');
        $thisMonthSales = Product::whereMonth('created_at', Carbon::now()->month)->sum('price');
        $lastMonthSales = Product::whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('price');

        return view('dashboard', compact('todaySales', 'yesterdaySales', 'thisMonthSales', 'lastMonthSales'));
    }





    //====================All Transactions====================
    public function transactionHistory()
    {
        // Fetch all product transactions
        $transactions = Product::orderBy('created_at', 'desc')->paginate(10);

        return view('transaction-history', compact('transactions'));
    }





}




