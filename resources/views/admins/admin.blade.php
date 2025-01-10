<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .sidebar {
            position: fixed; /* Fix the sidebar in place */
            top: 0;
            left: 0;
            height: 100vh; /* Full viewport height */
            width: 40vh;
            background-color: rgb(37, 72, 107);
            color: white;
            padding: 15px;
            overflow-y: auto; /* Add scroll if sidebar content overflows */
            z-index: 1000; /* Ensure it's above other elements */
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
            margin-left: 40vh; /* Adjust content to not overlap with the sidebar */
            padding: 20px;
        }


        .button-container {
            display: flex;
        }
        .editButton {
            background-color: #04AA6D;
            border: none;
            color: white;
            padding: 7px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            border-radius: 70%;
        }
        .deleteButton {
            background-color: red;
            border: none;
            color: white;
            padding: 7px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            border-radius: 70%;
        }

        .tooltip-inner {
            background-color: #000000 !important;
            color: #ffffff;
        }

        .alert {
            font-size: small;
            padding: 10px;
            height: 5vh;
            width: 60vh;
            margin-left: 600px;
            border: 1px solid transparent;
            border-radius: 5px;
        }

        .alert-success {
            color: #155724;

            background-color: #d4edda;
            border-color: #c3e6cb;
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
    <!-- Include jQuery if not already included -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Include Bootstrap JS if not already included -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>

        $(function () {
            $('[data-toggle="tooltip"]').tooltip(); // Initialize tooltips for elements with data-toggle="tooltip"
        });
    </script>

    <script>
        // Hide the success message after 5 seconds
        setTimeout(function() {
            const successMessage = document.getElementById('successMessage');
            if (successMessage) {
                successMessage.style.display = 'none';
            }
        }, 1500); // 5000ms = 5 seconds
    </script>
    <script>
        function showDeleteConfirmation(deleteUrl) {
            Swal.fire({
                title: "Are You Sure?",
                text: "Do you want to delete this?",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    // Find the form and submit it programmatically
                    const form = document.getElementById('deleteForm' + deleteUrl.split('/').pop()); // Select the form using the hotel ID
                    form.submit(); // Submit the form
                    Swal.fire("Deleted!", "Your item has been deleted.", "success");
                }
            });
        }
    </script>

</body>
</html>
