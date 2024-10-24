{{-- resources/views/admin.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>

    {{-- Include Bootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
    {{-- Custom Styles --}}
    <link rel="stylesheet" href="{{ asset('style.css') }}">
</head>
<body>
    <!-- Navigation -->
<nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/create') }}"><h3><b>Create Shape</b></h3></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="{{ url('/admin') }}">Admin Page</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Page Content -->
<section class="main_page">
<form id="create-shape-form" method="POST" action="{{ route('store') }}">
    <div class="content-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    @csrf {{-- Laravel CSRF Token --}}

                    @if (session('success'))
                        <div class="alert alert-success" role="alert" style="position: relative;">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="position: absolute; right: 15px; top: 15px;"></button>
                        </div>
                    @endif

                    @if (session('error'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('error') }}
                        </div>
                    @endif

                    <!-- Display Validation Errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close" style="position: absolute; right: 15px; top: 15px;"></button>
                            
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            
                        </div>
                    @endif

                    <!-- Form Row 1: Name Input -->
                    <div class="row" style="display: flex; gap: 10px; align-items: center;">     
                        <div class="col-md-6">  
                            <label for="name" class="form-label">Name</label> 
                            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}" required>
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <br>

                    <!-- Form Row 2: Shape, Color, and Submit Button -->
                    <div class="row" style="display: flex; gap: 10px; align-items: center;">     
                        <!-- Shape Selection -->
                        <div class="col-md-3">
                            <label for="shape" class="form-label">Shape</label>
                            <select name="shape" id="shape" class="form-select">
                                <option selected>Circle</option>
                                <option>Square</option>
                                <option>Triangle</option>
                            </select>
                        </div>

                        <!-- Color Selection -->
                        <div class="col-md-3">
                            <label for="color" class="form-label">Color</label>
                            <select name="color" id="color" class="form-select">
                                <option selected>Red</option>
                                <option>Blue</option>
                                <option>Green</option>
                                <option>Yellow</option>
                            </select>
                        </div>

                        <br>

                        <!-- Add Account Button -->
                        <div class="row">
                            <div class="col-md-2 d-flex align-items-end">
                                <button type="submit" class="btn btn-primary">Create Shape</button>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <a href="{{ url('admin') }}" class="btn btn-primary">Back</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>

</section> 



<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.7.1.js"></script>

<script>


</script>
</body>
</html>
