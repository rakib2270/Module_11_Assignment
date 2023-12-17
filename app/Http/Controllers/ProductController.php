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



//====================store method====================
public function store(Request $request)
{
    $this->validate($request,[
        'name' => 'required|string|max:255',
        'price' => 'required|numeric',
        'quantity' => 'required|integer',
        'description' => 'integer',
    ]);

    DB::table('products')->insert([
        'name'=>$request->name,
        'price'=>$request->price,
        'quantity'=>$request->quantity,
        'description'=>$request->description,
    ]);

    dd:

    return redirect('/dashboard')->with('success', 'Product added successfully!');
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



//====================store method====================
public function updatePrice($productId, $newPrice)
{
    // Update product price
    DB::table('products')->where('id', $productId)->update(['price' => $newPrice]);

    return redirect('/dashboard')->with('success', 'Product price updated successfully!');
}





//====================TO Show All Products====================
    public function dashboard()
    {
        // Calculate sales figures for today, yesterday, this month, and last month
        $todaySales = Product::whereDate('created_at', Carbon::today())->sum('price');
        $yesterdaySales = Product::whereDate('created_at', Carbon::yesterday())->sum('price');
        $thisMonthSales = Product::whereMonth('created_at', Carbon::now()->month)->sum('price');
        $lastMonthSales = Product::whereMonth('created_at', Carbon::now()->subMonth()->month)->sum('price');

        return view('dashboard', compact('todaySales', 'yesterdaySales', 'thisMonthSales', 'lastMonthSales'));
    }





    //====================TO Show All Transactions====================
    public function transactionHistory()
    {
        // Fetch all product transactions
        $transactions = Product::orderBy('created_at', 'desc')->paginate(10);

        return view('transaction-history', compact('transactions'));
    }
}
