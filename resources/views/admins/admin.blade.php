<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            height: 100vh;
            background-color:rgb(37, 72, 107);
            color: white;
            padding: 15px;
        }
        .sidebar a {
            color: white;
            text-decoration: none;
            margin-bottom: 10px;
            display: block;
        }
        .sidebar a:hover {
            background-color: #495057;
            padding-left: 10px;
            transition: 0.3s;
        }
        .content {
            padding: 20px;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="row">
            <!-- Sidebar -->
            <div class="col-md-3 sidebar">
                <h3>Admin Panel</h3>
                <a href="{{ route('admins.dashboard') }}">Dashboard</a>
                <a href="{{ route('admins.hotellist') }}">Manage Hotels</a>
                
            </div>
            
            <!-- Main Content -->
            <div class="col-md-9 content">
                @yield('content')
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
