<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css"></script>
    <script src="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css"></script>
    <script src="{{ asset('index.js') }}"></script>
    {{-- Custom Styles --}}
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>

<body>
    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
  <div class="container">
    <a class="navbar-brand" href="{{ url('admin') }}"><h3><b>Admin Page</b></h3></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav ms-auto">
      <li class="nav-item active">
    <a class="nav-link" href="{{ url('user') }}" onclick="return confirmLogout()"><strong>Log Out</strong></a>
</li>
      </ul>
    </div>
  </div>
</nav>

<!-- Page Content -->
<section class="main_page">
<div class="content-wrapper">
    <div class="container">
        <div class="col-lg-12 col-offset-2">
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3 class="table__color">Admin Table</h3>
                </div>
                <div class="col-md-6 d-flex justify-content-end">
                    <a href="{{ url('create') }}">
                        <button class="btn btn-primary"><ion-icon name="add-circle-outline"></ion-icon>
                        New</button>
                    </a>
                </div>
            </div>
            <!-- Table -->
            <div class="table-responsive">
            <table id="table1" class="table table-striped" style="width:100%">
    <thead class="custom-table-header">
        <tr>
            <th class="fixed-column">Timestamp</th>
            <th class="fixed-column">Name</th>
            <th class="fixed-column">Shape</th>
            <th class="fixed-column">Color</th>
            <th class="fixed-column">Action</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($shapes as $shape)
            <tr class="{{ $loop->iteration % 2 == 0 ? 'custom-row-1' : 'custom-row-2' }}">
                <td class="table_color">{{ $shape->timestamp }}</td>
                <td class="table_color">{{ $shape->name }}</td>
                <td class="table_color">{{ $shape->shape }}</td>
                <td class="table_color">{{ $shape->color }}</td>
                <td class="table_color">
                    <a href="{{ url('edit', $shape->id) }}" class="btn btn-sm" style="background-color:#1988F5; margin-right:5px; color:white;">
                        <ion-icon name="create-outline"></ion-icon> Edit
                    </a>
                    <a href="{{ url('delete', $shape->id) }}" 
                       onClick="return confirm('Are you sure you want to delete this shape?');" 
                       class="btn btn-danger btn-sm">
                        <ion-icon name="trash-outline"></ion-icon> Delete
                    </a>
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

<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.bootstrap5.js"></script>

<script>
    new DataTable('#table1');

    function confirmLogout() {
        return confirm("Are you sure you want to log out?");
    }
</script>
</body>
</html>
