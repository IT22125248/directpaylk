@extends('admins.admin')

@section('content')
    <h1>Manage Hotels</h1>
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Created At</th>
                <th>Edited At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($hotels as $hotel)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $hotel->name }}</td>
                    <td>{{ $hotel->description }}</td>
                    <td><img src="{{ asset('storage/' . $hotel->image) }}" width="100" alt="Hotel Image"></td>
                    <td>{{ $hotel->created_at->format('Y-m-d') }}</td>
                    <td>
                        @if($hotel->updated_at)
                            {{ $hotel->updated_at->format('Y-m-d') }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        @if($hotel->deleted_at)
                            {{ $hotel->deleted_at->format('Y-m-d') }}
                        @else
                            N/A
                        @endif
                    </td>
                    <td>
                        <!-- Edit and Delete Actions -->
                        <a href="{{ route('admins.edit', $hotel->id) }}" class="btn btn-warning">Edit</a>

                        <form action="{{ route('admins.destroy', $hotel->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
