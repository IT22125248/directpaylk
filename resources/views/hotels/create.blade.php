<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Hotel</title>
</head>
<body>
    
    <style>
    body {
        font-family: Arial, sans-serif;
        background-color: #f5f5f5;
        padding: 0;
        margin: 0;
    }

    .form-container {
        width: 50%;
        margin: 50px auto;
        padding: 30px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    h2 {
        text-align: center;
        color: #333;
        margin-bottom: 20px;
        font-size: 24px;
    }

    label {
        display: block;
        font-size: 16px;
        color: #555;
        margin-bottom: 8px;
        font-weight: bold;
    }

    input[type="text"],
    textarea,
    input[type="file"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #ddd;
        border-radius: 5px;
        font-size: 16px;
        background-color: #f9f9f9;
        color: #333;
    }

    input[type="text"]:focus,
    textarea:focus,
    input[type="file"]:focus {
        border-color: #5b8ff9;
        outline: none;
    }

    textarea {
        resize: vertical;
        min-height: 100px;
    }

    button[type="submit"] {
        width: 40%;
        padding: 6px;
        background-color: rgb(32, 18, 107);
        color: #fff;
        font-size: 18px;
        margin-left: 180px;
        border: none;
        border-radius: 5px;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    button[type="submit"]:hover {
        background-color: #e66b3f;
    }

    .form-group {
        margin-bottom: 20px;
    }

    /* For smaller screens, adjust form width */
    @media (max-width: 768px) {
        .form-container {
            width: 90%;
            padding: 20px;
        }
    }
</style>

<div class="form-container">
    <h2>Add New Hotel</h2>
    <form action="{{ route('hotels.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="name">Hotel Name</label>
            <input type="text" id="name" name="name" required placeholder="Enter Hotel Name">
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea id="description" name="description" required placeholder="Enter Hotel Description"></textarea>
        </div>
        <div class="form-group">
            <label for="image">Hotel Image</label>
            <input type="file" id="image" name="image" required>
        </div>
        <button type="submit">Add Hotel</button>
    </form>
</div>
</body>
</html>
