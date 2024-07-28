@extends('layouts.app')

@section('title', 'Stock barang')

@section('content')
    <div class="container"
        style="display: flex;justify-content: center;align-items: center;flex-direction: column;width:100%;">
        <div class="title-container">
            <h1 class="mt-4">Stock barang</h1>
        </div>
        <div class="container-btn" style="display: flex;width: 100%;justify-content: flex-end;padding: 10px;">
            <a href="baranglist/create">
                <button class="btn btn-secondary">Tambah barang</button>
            </a>
        </div>

        <div class="container-item" style="width: 100%">
            <table class="table table-bordered mt-4">
                <thead class="thead-light">
                    <tr>
                        <th>Barang ID</th>
                        <th>Nama barang</th>
                        <th>Deskripsi barang</th>
                        <th>Jumlah</th>
                        <th>Kategori</th>
                        <th>Lokasi</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($baranglist as $item)
                        <tr>
                            <td>{{ $item->item_id }}</td>
                            <td>{{ $item->item_name }}</td>
                            <td>{{ $item->item_description }}</td>
                            <td>{{ $item->quantity }}</td>
                            <td>{{ $item->category }}</td>
                            <td>{{ $item->location }}</td>
                            <td>
                                <a class="btn btn-warning" href="/baranglist/{{ $item->item_id }}/edit">Edit</a>

                                <form action="{{ route('barang.destroy', $item->item_id) }}" method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger"
                                        onclick="return confirm('Barang ini akan dihapus?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
