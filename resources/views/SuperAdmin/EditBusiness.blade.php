<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rental Management System</title>
    <!-- Favicon -->
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <!-- Google Fonts for Oxanium -->
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
</head>

<body>
    <div class="container">
        <!-- Edit Vehicle Form -->
        <form action="{{ route('bus.update', $Business->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="form-section">
                <h1 class="title">Edit Business</h1>

                <!-- Success Message -->
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Error Message -->
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Vehicle Name -->
                <div class="form-row">
                    <label for="b_name">Business Name</label>
                    <input type="text" name="b_name" value="{{ old('b_name', $Business->b_name) }}">
                    <label for="email">Email</label>
                    <input type="text" name="email" value="{{ old('email', $Business->email) }}">
                </div>

                <!-- Business Number -->
                <div class="form-row">
                    <label for="b_phone">Business Contact Number</label>
                    <input type="text" name="b_phone" value="{{ old('b_phone', $Business->b_phone) }}">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="{{ old('address', $Business->address) }}">
                </div>

                <!-- Engine Number -->
                <div class="form-row">
                    <label for="o_name">Owner's Name</label>
                    <input type="text" name="o_name" value="{{ old('o_name', $Business->o_name) }}">
                    <label for="o_phone">Owner's Contact Number</label>
                    <input type="text" name="o_phone" value="{{ old('o_phone', $Business->o_phone) }}">
                </div>
                <div class="form-row">
                    <label for="logo">Upload New Business logo</label>
                    <input type="file" name="logo">
                </div>

                <div class="submit-container">
                    <button type="submit" class="btn-submit">Update Business</button>
                    <a href="{{ url('super') }}" class="btn-submit">Cancel</a>
                </div>

            </div>
        </form>
    </div>
</body>

</html>
