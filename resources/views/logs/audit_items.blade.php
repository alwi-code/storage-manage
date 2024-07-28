@extends('layouts.app')

@section('title', 'Audit Items')

@section('content')
<div class="container">
    <h1 class="mt-4">Audit Items</h1>
    <table class="table table-bordered mt-4">
        <thead>
            <tr>
                <th>Audit ID</th>
                <th>Item Name</th>
                <th>Description</th>
                <th>Quantity</th>
                <th>Category</th>
                <th>Location</th>
                <th>User</th>
                <th>Updated At</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($auditItems as $audit)
                <tr>
                    <td>{{ $audit->audit_id }}</td>
                    <td>{{ $audit->item_name }}</td>
                    <td>{{ $audit->item_description }}</td>
                    <td>{{ $audit->quantity }}</td>
                    <td>{{ $audit->category }}</td>
                    <td>{{ $audit->location }}</td>
                    <td>{{ $audit->username }}</td>
                    <td>{{ $audit->updated_at }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
