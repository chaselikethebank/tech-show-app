@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Edit Price Tier</h1>
        <form action="{{ route('prices.update', $price->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="lower_bound" class="form-label">Lower Bound</label>
                <input type="text" class="form-control" id="lower_bound" name="lower_bound" value="{{ $price->lower_bound }}"
                    required>
            </div>
            <div class="mb-3">
                <label for="multiplier" class="form-label">Multiplier</label>
                <input type="text" class="form-control" id="multiplier" name="multiplier"
                    value="{{ $price->multiplier }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
