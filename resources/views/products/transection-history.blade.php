<!-- resources/views/transaction-history.blade.php -->

@extends('layouts.app')

@section('content')
    <h2>Transaction History</h2>
    <table>
        <thead>
        <tr>
            <th>Product Name</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Date</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($transactions as $transaction)
            <tr>
                <td>{{ $transaction->name }}</td>
                <td>${{ $transaction->price }}</td>
                <td>{{ $transaction->quantity }}</td>
                <td>{{ $transaction->created_at }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{ $transactions->links() }} <!-- For pagination -->
@endsection
