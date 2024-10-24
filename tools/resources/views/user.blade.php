{{-- resources/views/user_page.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"></script>
    <script src="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css"></script>
    <script src="{{ asset('index.js') }}"></script>
</head>
<body style="background-color:#323232">
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><h3><b>User Page</b></h3></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('login') }}"><strong>Log In</strong></a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<section class="main_page">
    <div class="content-wrapper">
        <div class="container" >
            <div class="col-lg-12 col-offset-2">
                <h3>Content table</h3>
                <div class="table-responsive">
                    <table id="table1" class="table table-striped" style="width:100%">
                        <thead class="alert-info">
                            <tr>
                                <th class="fixed-column">Timestamp</th>
                                <th class="fixed-column">Name</th>
                                <th class="fixed-column">Shapecolor</th>
                            </tr>
                        </thead>
                        <tbody>
        @foreach ($shapes as $shape)
            <tr>
                <td class="table_color">{{ \Carbon\Carbon::parse($shape->timestamp)->format('H:i:s Y-m-d') }}</td>
                <td class="table_color">{{ $shape->name }}</td>
                <td class="table_color">
                    <div class="shape" style="{{ getShapeStyle($shape->shape, $shape->color) }}"></div>
                </td>
            </tr>
        @endforeach
    </tbody>
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

<script>
    new DataTable('#table1');

    // Function to get shape styles

</script>
@php
function getShapeStyle($shape, $color) {
    switch ($shape) {
        case 'Triangle':
            return "width: 0; height: 0; border-left: 25px solid transparent; border-right: 25px solid transparent; border-bottom: 50px solid $color;";
        case 'Circle':
            return "width: 50px; height: 50px; border-radius: 50%; background-color: $color;";
        case 'Square':
            return "width: 50px; height: 50px; background-color: $color;";
        default:
            return "width: 50px; height: 50px; background-color: gray;";
    }
}
@endphp

</body>
</html>
