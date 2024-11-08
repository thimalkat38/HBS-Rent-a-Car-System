<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HBS Car Rental Management System</title>
    <!-- Google Fonts for Oxanium -->
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Internal CSS -->
    <style>
        /* Global Styles */
        body {
            font-family: 'Oxanium', sans-serif; /* Font family */
            font-weight: bold; /* Make all text bold */
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
        }

        .container {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Full height */
        }

        /* Main Content Styles */
        .main-content {
            display: flex;
            flex: 1; /* Fill remaining space */
            overflow: hidden; /* Hide overflow */
        }

        /* Content Styles */
        .content {
            width: 100%; /* Full width of the container */
            padding: 15px; /* Padding for content */
            display: flex; /* Use flexbox for centering */
            justify-content: flex-end; /* Align content to the right */
            overflow-y: auto; /* Enable vertical scrolling for content only */
        }

        table {
            margin-top: 0px; /* No margin on top */
            width: 100%; /* Full width */
            border-collapse: collapse; /* Collapse borders */
        }

        table.table-bordered {
            width: 100%;
        }

        th {
            padding: 0.8%;
            background-color: #FA000B; /* Red header background */
            color: white; /* White text */
            height: 10%; /* Fixed height for header cells */
            width: 10%; /* Fixed width for header cells */
        }

        tr {
            height: 10%; /* Fixed height for rows */
            width: 10%; /* Fixed width for rows */
            padding: 0.3%;
        }

        tr:nth-child(odd) {
            background-color: #FFAA0066; /* Light yellow for odd rows */
        }

        tr:nth-child(even) {
            background-color: #B4FEB3; /* Light green for even rows */
        }

        td {
            text-align: center; /* Center-align text in cells */
            border: none; /* No borders for cells */
            padding: 0; /* No padding */
        }

        .text-start {
            text-align: left; /* Left align for specific columns */
        }

        img {
            width: 100px;
            height: 70px;
            border-radius: 10px; /* Rounded corners for images */
        }

        /* Footer Styles */
        .footer {
            background-color: #ffa500;
            color: white;
            text-align: center;
            padding: 10px 0; /* Padding for footer */
            margin-top: auto; /* Push footer to the bottom */
        }
    </style>
</head>
<body>
    <div class="container">

        <!-- Main Content -->
        <div class="main-content">
            <div class="content">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>CAR IMAGE</th>
                            <th>CHASSIS NUMBER</th>
                            <th>VEHICLE NAME</th>
                            <th>V/TYPE</th>
                            <th>FUEL TYPE</th>
                            <th>VEHICLE MODEL</th>
                            <th>V/NUMBER</th>
                            <th>ENGINE NUMBER</th>
                            <th>MODEL YEAR</th>
                            <th>MORE OPTIONS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td><img src="img.png" alt="Car Image"></td>
                            <td>7AT0BL2FX13123456</td>
                            <td>TOYOTA</td>
                            <td>CAR</td>
                            <td>PETROL</td>
                            <td>CIVIC</td>
                            <td>DAD-4545</td>
                            <td>52WVC10338</td>
                            <td>2018</td>
                            <td class="text-start">LEATHER SEAT <br> POWER STEERING <br> CD PLAYER <br> AIR CONDITIONER <br> POWER DOOR</td>
                        </tr>
                        <tr>
                            <td><img src="img.png" alt="Car Image"></td>
                            <td>7AT0BL2FX13123456</td>
                            <td>TOYOTA</td>
                            <td>CAR</td>
                            <td>PETROL</td>
                            <td>CIVIC</td>
                            <td>DAD-4545</td>
                            <td>52WVC10338</td>
                            <td>2018</td>
                            <td class="text-start">LEATHER SEAT <br> POWER STEERING <br> CD PLAYER <br> AIR CONDITIONER <br> POWER DOOR</td>
                        </tr>
                        <tr>
                            <td><img src="img.png" alt="Car Image"></td>
                            <td>7AT0BL2FX13123456</td>
                            <td>TOYOTA</td>
                            <td>CAR</td>
                            <td>PETROL</td>
                            <td>CIVIC</td>
                            <td>DAD-4545</td>
                            <td>52WVC10338</td>
                            <td>2018</td>
                            <td class="text-start">LEATHER SEAT <br> POWER STEERING <br> CD PLAYER <br> AIR CONDITIONER <br> POWER DOOR</td>
                        </tr>
                        <tr>
                            <td><img src="img.png" alt="Car Image"></td>
                            <td>7AT0BL2FX13123456</td>
                            <td>TOYOTA</td>
                            <td>CAR</td>
                            <td>PETROL</td>
                            <td>CIVIC</td>
                            <td>DAD-4545</td>
                            <td>52WVC10338</td>
                            <td>2018</td>
                            <td class="text-start">LEATHER SEAT <br> POWER STEERING <br> CD PLAYER <br> AIR CONDITIONER <br> POWER DOOR</td>
                        </tr>
                        <tr>
                            <td><img src="img.png" alt="Car Image"></td>
                            <td>7AT0BL2FX13123456</td>
                            <td>TOYOTA</td>
                            <td>CAR</td>
                            <td>PETROL</td>
                            <td>CIVIC</td>
                            <td>DAD-4545</td>
                            <td>52WVC10338</td>
                            <td>2018</td>
                            <td class="text-start">LEATHER SEAT <br> POWER STEERING <br> CD PLAYER <br> AIR CONDITIONER <br> POWER DOOR</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            &copy; 2023 HBS Car Rental Management System
        </div>

    </div>
</body>
</html>
