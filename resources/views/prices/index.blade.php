@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Price Tiers</h1>
    <a href="{{ route('prices.create') }}" class="btn btn-primary">Add New Tier</a>
    <table class="table mt-3 table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Lower Bound</th>
                <th>Multiplier</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prices as $price)
            <tr>
                <td>{{ $price->id }}</td>
                <td>{{ $price->lower_bound }}</td>
                <td>{{ $price->multiplier }}</td>
                <td>
                    <a href="{{ route('prices.edit', $price->id) }}" class="btn btn-warning">Edit</a>
                    <form action="{{ route('prices.destroy', $price->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
