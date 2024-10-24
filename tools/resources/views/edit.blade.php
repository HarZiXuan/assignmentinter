<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('style.css') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}"><h3><b>Admin Page</b></h3></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/admin') }}">User Page</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<section class="main_page">
<form method="POST" action="{{ route('update', $shape->id) }}">
    @csrf

    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                @if (session('success'))
                <div class="alert alert-success" role="alert">
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="position: absolute; right: 15px; top: 15px;"></button>
                        {{ session('success') }}
                </div>
                @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="position: absolute; right: 15px; top: 15px;"></button>
                           
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            
                        </div>
                    @endif

                    <div class="row" style="display: flex; gap: 10px; align-items: center;">
                        <div class="col-md-4">
                            <label for="name" class="form-label">Name</label>
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $shape->name) }}" required>
                        </div>
                    </div>
                    <br>

                    <div class="row" style="display: flex; gap: 10px; align-items: center;">
                        <div class="col-md-2">
                            <label for="shape" class="form-label">Shape</label>
                            <select name="shape" id="shape" class="form-select">
                                <option value="Circle" {{ $shape->shape == 'Circle' ? 'selected' : '' }}>Circle</option>
                                <option value="Square" {{ $shape->shape == 'Square' ? 'selected' : '' }}>Square</option>
                                <option value="Triangle" {{ $shape->shape == 'Triangle' ? 'selected' : '' }}>Triangle</option>
                            </select>
                        </div>

                        <div class="col-md-2">
                            <label for="color" class="form-label">Color</label>
                            <select name="color" id="color" class="form-select">
                                <option value="Red" {{ $shape->color == 'Red' ? 'selected' : '' }}>Red</option>
                                <option value="Blue" {{ $shape->color == 'Blue' ? 'selected' : '' }}>Blue</option>
                                <option value="Green" {{ $shape->color == 'Green' ? 'selected' : '' }}>Green</option>
                                <option value="Yellow" {{ $shape->color == 'Yellow' ? 'selected' : '' }}>Yellow</option>
                            </select>
                        </div>
                    </div>

                    <br>
                    <div class="row">
                        <div class="col-md-2 d-flex align-items-end">
                            <button type="submit" class="btn btn-primary">Update Shape</button>
                        </div>
                        <div class="col-md-2 d-flex align-items-end">
                            <a href="{{ url('/admin') }}" class="btn btn-primary">Back</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

</section>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>
</body>
</html>
