@extends('admins.admin')

@section('content')
    <h1>Edit Hotel</h1>
    <form action="{{ route('admins.update', $hotel->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Hotel Name</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $hotel->name }}" required>
        </div>

        <div class="form-group">
            <label for="description">Hotel Description</label>
            <textarea class="form-control" id="description" name="description" required>{{ $hotel->description }}</textarea>
        </div>

        <div class="form-group">
            <label for="image">Hotel Image</label>
            <input type="file" class="form-control" id="image" name="image">
            @if($hotel->image)
                <img src="{{ asset('storage/' . $hotel->image) }}" width="100" alt="Hotel Image">
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update Hotel</button>
    </form>
@endsection
