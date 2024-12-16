@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Data Barang</h1>
    
    @if (auth()->user()->role === 'admin')
        <a href="{{ route('materials.create') }}" class="btn btn-primary mb-3">Add New Material</a>
    @endif

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>No</th>
                <th>Name</th>
                <th>Price</th>
                <th>Stock</th>
                <th>Date</th>
                <th>Category</th>
                @if (auth()->user()->role === 'admin')
                    <th>Actions</th>
                @endif
            </tr>
        </thead>
        <tbody>
            @foreach ($materials as $material)
            <tr>
                <td>{{ $loop->iteration }}</td>
                <td>{{ $material->name }}</td>
                <td>Rp.{{ number_format($material->price, 2) }}</td>
                <td>{{ $material->stock }}</td>
                <td>{{ \Carbon\Carbon::parse($material->date_input)->format('d/m/Y') }}</td>
                <td>{{ $material->category->name ?? 'N/A' }}</td>
                @if (auth()->user()->role === 'admin')
                    <td>
                        <a href="{{ route('materials.edit', $material->id) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('materials.destroy', $material->id) }}" method="POST" style="display:inline;">
                            @csrf @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Delete this material?')">Delete</button>
                        </form>
                    </td>
                @endif
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
