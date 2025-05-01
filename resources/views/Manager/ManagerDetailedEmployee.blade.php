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
    <style>
        /* Custom styling to fit content within viewport */
        body {
            font-family: 'Oxanium', sans-serif;
            /* Font family */
            font-weight: bold;
            /* Make all text bold */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
        }

        .container {
            max-height: 90vh;
            /* Adjusts max height to fit within the screen */
            overflow-y: auto;
            padding: 1rem;
        }

        .card-body {
            padding: 0.5rem;
            /* Reduces padding inside cards */
        }

        .text-center {
            margin: 0.5rem 0;
            /* Reduces top and bottom margins */
        }

        /* Font size adjustments */
        h1 {
            font-size: 1.5rem;
            /* Reduced main heading font size */
        }

        h5,
        h6 {
            font-size: 1rem;
            /* Reduced subheading font size */
        }

        p,
        button,
        .text-muted {
            font-size: 0.875rem;
            /* Reduced paragraph and button font size */
        }
    </style>
</head>

<body>

    <div class="container my-3">
        <div class="row">
            <div class="col-12">
                <h1 class="text-center mb-3">employee's Details</h1>

                @if ($employee)
                    <div class="card shadow-sm">
                        <div class="card-body">
                            <h5 class="card-title text-primary mb-3">Personal Informations</h5>
                            <p><strong>Full Name [ID]:</strong> <span id="fullName">{{ $employee->title }}
                                    {{ $employee->emp_name }} [{{ $employee->emp_id }}]</span></p>
                            <p><strong>Age:</strong> <span id="mobileNumber">{{ $employee->age }}</span></p>
                            <p><strong>NIC:</strong> <span id="nic">{{ $employee->nic }}</span></p>
                            <p><strong>Contact Number:</strong> <span
                                    id="nic">{{ $employee->mobile_number }}</span></p>
                            <p><strong>Email:</strong> <span id="nic">{{ $employee->email }}</span></p>
                            <p><strong>Address:</strong> <span id="nic">{{ $employee->address }}</span></p>


                            <h5 class="card-title text-primary mb-3">Organizational Details</h5>
                            <p><strong>Employee Since:</strong> <span id="nic">{{ $employee->join_date }}</span>
                            </p>
                            <p><strong>Remaining Leaves:</strong> <span
                                    id="nic">{{ $employee->remaining_leaves }}</span></p>
                            <p><strong>Salary Per Month:</strong> RS <span id="salary">
                                    {{ number_format($employee->salary, 2) }}
                                </span></p>
                            <p><strong>Bank:</strong> <span id="nic">{{ $employee->bank }}</span></p>
                            <p><strong>Bank Account Number:</strong> <span
                                    id="nic">{{ $employee->acc_number }}</span></p>





                            <!-- Photos Section -->
                            <h5 class="card-title text-primary mt-3 mb-2">Employee's Photo</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        @if (!empty($employee->photo))
                                            @foreach ($employee->photo as $photo)
                                                <div class="col-6 col-md-4 col-lg-3 mb-3">
                                                    <img src="{{ asset('storage/' . $photo) }}"
                                                        class="img-fluid img-thumbnail medium-thumbnail"
                                                        alt="NIC Photo">
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="text-muted">No Images for this employee.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>

                            <h5 class="card-title text-primary mt-3 mb-2">Document About Employee</h5>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="row">
                                        @if (!empty($employee->doc_photos))
                                            @foreach ($employee->doc_photos as $doc_photo)
                                                <div class="col-6 col-md-4 col-lg-3 mb-3">
                                                    <img src="{{ asset('storage/' . $doc_photo) }}"
                                                        class="img-fluid img-thumbnail medium-thumbnail"
                                                        alt="Document Photo">
                                                </div>
                                            @endforeach
                                        @else
                                            <p class="text-muted">No document images for this employee.</p>
                                        @endif
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>
                @else
                    <p class="text-center text-danger mt-3">No employee found.</p>
                @endif
            </div>
        </div>
    </div>
</body>
<style>
    .medium-thumbnail {
        max-width: 750px;
        /* Maximum width */
        max-height: 750px;
        /* Maximum height */
        width: auto;
        /* Automatically adjust width while maintaining aspect ratio */
        height: auto;
        /* Automatically adjust height while maintaining aspect ratio */
        border: 1px solid #ddd;
        /* Optional: Add a border for styling */
        padding: 5px;
        /* Optional: Add padding for better spacing */
    }
</style>


</html>
