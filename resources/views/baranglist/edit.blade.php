@extends('layouts.app')

@section('title', 'Edit Item')

@section('content')
<div class="container">
    <div class="mt-4 container-btn" style="display: flex;width: 100%;justify-content: flex-start;">
        <a href="/baranglist">
            <button class="btn btn-secondary">Kembali</button>
        </a>
    </div>
    
    <h1 class="mt-4">Edit barang</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.update', $item->item_id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="item_name" class="form-label">Item Name</label>
            <input type="text" class="form-control" id="item_name" name="item_name" value="{{ old('item_name', $item->item_name) }}" required>
        </div>
        <div class="mb-3">
            <label for="item_description" class="form-label">Item Description</label>
            <textarea class="form-control" id="item_description" name="item_description">{{ old('item_description', $item->item_description) }}</textarea>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity', $item->quantity) }}" required min="0">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Category</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ old('category', $item->category) }}">
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ old('location', $item->location) }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
