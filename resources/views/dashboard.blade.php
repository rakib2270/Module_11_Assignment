<!-- resources/views/dashboard.blade.php -->

@extends('layouts.app')

@section('content')
    <div class="bg-white p-8 rounded shadow-md">
        <h2 class="text-2xl font-bold mb-4">Sales Dashboard</h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
            <div class="bg-blue-100 p-4 rounded shadow">
                <h4 class="text-lg font-semibold mb-2">Today's Sales</h4>
                <p class="text-2xl">${{ $todaySales }}</p>
            </div>
            <div class="bg-blue-100 p-4 rounded shadow">
                <h4 class="text-lg font-semibold mb-2">Yesterday's Sales</h4>
                <p class="text-2xl">${{ $yesterdaySales }}</p>
            </div>
            <div class="bg-blue-100 p-4 rounded shadow">
                <h4 class="text-lg font-semibold mb-2">This Month's Sales</h4>
                <p class="text-2xl">${{ $thisMonthSales }}</p>
            </div>
            <div class="bg-blue-100 p-4 rounded shadow">
                <h4 class="text-lg font-semibold mb-2">Last Month's Sales</h4>
                <p class="text-2xl">${{ $lastMonthSales }}</p>
            </div>
        </div>
    </div>
    <!-- Add styling or additional content as needed -->
@endsection
