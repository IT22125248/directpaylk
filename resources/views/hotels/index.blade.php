<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hotel List</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
        margin: 0;
        font-family: Arial, sans-serif;
    }

    .overlay {
        position: relative;
        width: 100%;
        height: 60vh; /* Full height of the viewport */
        background-image: url('/storage/images/hotel2.jpg'); /* Replace with your image path */
        background-size: cover;
        background-position: center;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        text-align: center;
        color: white;
        padding: 0 20px;
    }

    /* Dark overlay on top of the image */
    .overlay::after {
        content: '';
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: rgba(0, 0, 0, 0.5); /* Dark overlay with 50% opacity */
        z-index: 1; /* Overlay sits above the image */
    }

    /* Main heading style */
    .overlay h1 {
        font-size: 40px; /* Larger font size */
        font-family: 'Arial', sans-serif;
        font-weight: bold;
        text-transform: uppercase;
        letter-spacing: 3px;
        text-shadow: 4px 4px 10px rgba(0, 0, 0, 0.7);
        z-index: 2;
        margin: 0;
    }

    /* Subheading style */
    .overlay h2 {
        font-size: 25px; /* Medium font size */
        font-weight: normal;
        text-shadow: 2px 2px 5px rgba(0, 0, 0, 0.6);
        margin: 10px 0;
        z-index: 2;
    }

    /* Link button style */
    .overlay a {
        display: inline-block;
        padding: 8px 10px;
        font-size: 14px;
        color: #fff;
        background-color:rgb(32, 18, 107); /* Orange color */
        text-decoration: none;
        border-radius: 5px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.2);
        transition: background-color 0.3s ease;
        z-index: 2;
        margin-top: 20px;
    }

    /* Link hover effect */
    .overlay a:hover {
        background-color: #e66b3f; /* Darker orange on hover */
    }

    /* Container for hotel items */

    /* Container for hotel items */
    .hotel-container {
        display: flex;
        flex-wrap: wrap;
        gap: 20px;
        padding: 20px;
        justify-content: space-between;

    }

    /* Style for each hotel box */
    .hotel-box {
        width: 32%; /* Set width to 32% for 3 boxes per row */
        background-color: #fff;
        padding: 15px; /* Padding for compactness */
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        text-align: center;
        box-sizing: border-box; /* Ensures padding is included in width */
        background-color:rgb(41, 23, 114);
        color: #fff
    }

    .hotel-box img {
        width: 100%; /* Ensure images fill the container width */
        height: 200px; /* Fixed height */
        object-fit: cover; /* Ensure the images maintain aspect ratio */
        border-radius: 8px;
    }

    .hotel-box h2 {
        font-size: 20px; /* Smaller font size for heading */
        color: white;
        margin-top: 10px;
    }

    .hotel-box p {
        font-size: 14px; /* Smaller font size for description */
        color: white;
        margin-top: 10px;
    }
        .btn btn-success{
            background-color: #152068;
        }

    /* Add responsive styling */
    @media (max-width: 768px) {
        .overlay h1 {
            font-size: 40px;
        }

        .overlay h2 {
            font-size: 20px;
        }

        .overlay a {
            font-size: 16px;
            padding: 10px 25px;
        }
    }
    </style>
</head>
<body>

    <div class="overlay">
    <h1 >Hotels in Srilanka</h1>
    <h2>Add your hotels here</h2>
    {{--<a href="{{ route('hotels.create') }}">Add New Hotel</a>--}}
        <a href="#" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addHotelModal">Add New Hotel</a>
    </div>

    <div class="hotel-container">
        @foreach ($hotels as $hotel)
            <div class="hotel-box">
                <img src="{{ asset('storage/' . $hotel->image) }}" alt="{{ $hotel->name }}">
                <h2>{{ $hotel->name }}</h2>
                <p>{{ $hotel->description }}</p>
            </div>
        @endforeach
    </div>

    <!-- Modal for Adding a New Hotel -->
    <div class="modal fade" id="addHotelModal" tabindex="-1" aria-labelledby="addHotelModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addHotelModalLabel">Add New Hotel</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('hotels.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="name">Hotel Name</label>
                            <input type="text" id="name" name="name" class="form-control" required>
                            @error('name')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="description">Description</label>
                            <textarea id="description" name="description" class="form-control" required></textarea>
                            @error('description')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="image">Hotel Image</label>
                            <input type="file" id="image" name="image" class="form-control" required>
                            @error('image')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-success">Add Hotel</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
