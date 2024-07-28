@extends('layouts.app')

@section('title', 'Tambah barang')

@section('content')
<div class="container">
    <div class="mt-4 container-btn" style="display: flex;width: 100%;justify-content: flex-start;">
        <a href="/baranglist">
            <button class="btn btn-secondary">Kembali</button>
        </a>
    </div>
    <h1 class="mt-4">Tambah barang</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('barang.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="item_name" class="form-label">Nama barang</label>
            <input type="text" class="form-control" id="item_name" name="item_name" value="{{ old('item_name') }}" required>
        </div>
        <div class="mb-3">
            <label for="item_description" class="form-label">Deskripsi barang</label>
            <textarea class="form-control" id="item_description" name="item_description">{{ old('item_description') }}</textarea>
        </div>
        <div class="mb-3">
            <label for="quantity" class="form-label">Jumlah</label>
            <input type="number" class="form-control" id="quantity" name="quantity" value="{{ old('quantity') }}" required min="0">
        </div>
        <div class="mb-3">
            <label for="category" class="form-label">Kategori</label>
            <input type="text" class="form-control" id="category" name="category" value="{{ old('category') }}">
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Lokasi</label>
            <input type="text" class="form-control" id="location" name="location" value="{{ old('location') }}">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
