<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- link or texteditor -->
    <link href="https://cdn.datatables.net/1.13.6/css/jquery.dataTables.min.css" rel="stylesheet" type="text/css">
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
</head>

<body>

<nav class="navbar navbar-expand-lg bg-white">
        <div class="container">
            <a class="navbar-brand" href="{{url('admin_dashboard')}}"><b><i class="fa fa-dashboard"></i> Dashboard</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-lg-0">
                    <!-- 1st Drop Down -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <b>Users</b>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="userDropdown">
                            <li><a class="dropdown-item" href="{{url('user_data')}}">View <i class="fa fa-eye"></i></a></li>
                        </ul>
                    </li>
                    <!-- END Dropdown -->
                    <!-- 2nd Drop Down -->
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="feedbackDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                            <b>Feedbacks</b>
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="feedbackDropdown">
                            <li><a class="dropdown-item" href="{{url('feedback_list')}}">View <i class="fa fa-eye"></i></a></li>
                        </ul>
                    </li>
                    <!-- END Dropdown -->
                </ul>
                <div class="d-flex" role="logout">
                    <a href="{{url('logout')}}" class="btn btn-danger btn-sm">Logout <i class="fa fa-sign-out"></i></a>
                </div>
            </div>
        </div>
    </nav>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous">
    </script>
    <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
    <!-- CDN of flash message for show a few seconds -->
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
    <!-- END CDN -->
    <!-- END script -->
    <script>
     $(document).ready(function() {
        $('.custom-table').DataTable();
    });
</script>
</body>

</html>
