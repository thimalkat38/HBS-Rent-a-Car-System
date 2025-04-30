<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>HBS Car Rental Management System</title>
        <!-- Favicon -->
        <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
        <!-- Google Fonts for Oxanium -->
        <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;700&display=swap" rel="stylesheet">
        <!-- Custom CSS -->
        <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
    <style>
        /* Custom styling to fit content within viewport */
        body {
            font-family: 'Oxanium', sans-serif; /* Font family */
            font-weight: bold; /* Make all text bold */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
        }

        .card-body {
            padding: 0.5rem; /* Reduces padding inside cards */
        }
        .text-center {
            margin: 0.5rem 0; /* Reduces top and bottom margins */
        }
        /* Font size adjustments */
        h1 {
            font-size: 2rem; /* Reduced main heading font size */
            text-align: center;
            margin-left: 20%;
        }
        h5 {
            font-size: 1.6rem; /* Reduced subheading font size */
            margin-bottom: 0;
            te
        }
        p, button, .text-muted {
            font-size: 1.2rem; /* Reduced paragraph and button font size */
        }
    </style>
</head>
<body>
<div class="container">
    <div class="content">
                @if($Business)
                <div class="form-section">
                        <h1>Business's Details</h1>
                        <h5 class="card-title text-primary mb-3">Business Informations</h5>
                        <p><strong>ID:</strong> <span id="b_id">{{ $Business->id }}</span></p>
                        <p><strong>Business Name:</strong> <span id="b_name">{{ $Business->b_name }}</span></p>
                        <p><strong>Email:</strong> <span id="mobileNumber">{{ $Business->email }}</span></p>
                        <p><strong>Contact No:</strong> <span id="nic">{{ $Business->b_phone }}</span></p>
                        <p><strong>Address:</strong> <span id="nic">{{ $Business->address }}</span></p>

                        <h5 class="card-title text-primary mb-3">Owner Informations</h5>
                        <p><strong>Owner's Name:</strong> <span id="nic">{{ $Business->o_name }}</span></p>
                        <p><strong>Contact No:</strong> <span id="nic">{{ $Business->o_phone }}</span></p>

                        <h5 class="card-title text-primary mb-3">Package Details</h5>
                        <p><strong>Status:</strong> <span id="nic">{{ $Business->status }}</span></p>
                        <p><strong>Reg Date:</strong> <span id="nic">{{ $Business->reg_date }}</span></p>
                        

                        {{-- <div class="submit-container">
                            <div class="form-row">
                            <a href="{{ route('Businesss.edit', $Business->id) }}" class="btn-edit">Edit Business</a>

                            <form action="{{ route('Businesss.destroy', $Business->id) }}" method="POST" >
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn-delete" onclick="return confirm('Are you sure you want to delete this Business?')">Delete Business</button>
                            </form>
                        </div>
                        </div> --}}
                    
                </div>
                @else
                <p class="text-center text-danger mt-3">No Business found.</p>
                @endif
    </div>
    </div>  
</body>
</html>

