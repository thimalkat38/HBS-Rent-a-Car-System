<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HBS Car Rental Management System</title>
    <!-- Google Fonts for Oxanium -->
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;700&display=swap" rel="stylesheet">
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

/*Content Styles */
.content {
            width: 100%; /* 80% of the container */
            padding: 10px; /* Padding for content */
            display: flex; /* Use flexbox for centering */
            justify-content: flex-end; /* Align content to the right */
            overflow-y: auto; /* Enable vertical scrolling for content only */
            padding: 15px 15px;
        }

        table {
            margin-top: 0px; /* Add some space above the table */
            width: 100%; /* Make the table take full width of the content area */
            border-collapse: collapse; /* Collapse borders */
        }

        table table-bordered{
            width: 100%;
        }

        th {
            padding: 0.8%;
            background-color: #FA000B; /* Set header background color to red */
            color: white; /* Change text color to white for better contrast */
            height: 10%;
            width: 10%; /* Set a fixed height for header cells */
        }

        tr {
            height: 10%; /* Set a fixed height for table rows */
            width: 10%;
            padding: 0.3%;
        }

        tr:nth-child(odd) {
            background-color: #FFAA0066; /* Light gray background for odd rows */
        }

        tr:nth-child(even) {
            background-color: #B4FEB3; /* Light green background for even rows */
        }

        td {
            text-align: center; /* Center-align text in table cells */
            border: none; /* Remove cell borders */
            padding: 0; /* Remove padding for uniform height */
        }
        .text-start{
            text-align: left;
        }
        img {
            width: 100px;
            height: 70px;
            border-radius: 10px;
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
                            <th>EMP ID</th>
                            <th>EMP NAME</th>
                            <th>M/NUMBER</th>
                            <th>JOIN DATE</th>
                            <th>EMAIL ADDRESS</th>
                            <th>DISTRICT </th>
                            <th>NIC NO </th>
                            <th>ADDRESS</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>E0001</td>
                            <td>MOHAMED SAHAN</td>
                            <td>+94782877888</td>
                            <td>2024-10-10</td>
                            <td>sahansafa2002@gmail.com</td>
                            <td>ANURADHEPURA</td>
                            <td>200131802340 </td>
                            <td class="text-start">IKKIRIGOLLEWA,<br> WAHAMALGOLLEWA <br> TEMPLEROAD <br> ANURADHEPURA</td>
                        </tr>
                        <tr>
                            <td>E0001</td>
                            <td>MOHAMED SAHAN</td>
                            <td>+94782877888</td>
                            <td>2024-10-10</td>
                            <td>sahansafa2002@gmail.com</td>
                            <td>ANURADHEPURA</td>
                            <td>200131802340 </td>
                            <td class="text-start">IKKIRIGOLLEWA,<br> WAHAMALGOLLEWA <br> TEMPLEROAD <br> ANURADHEPURA</td>
                        </tr>
                        <tr>
                            <td>E0001</td>
                            <td>MOHAMED SAHAN</td>
                            <td>+94782877888</td>
                            <td>2024-10-10</td>
                            <td>sahansafa2002@gmail.com</td>
                            <td>ANURADHEPURA</td>
                            <td>200131802340 </td>
                            <td class="text-start">IKKIRIGOLLEWA,<br> WAHAMALGOLLEWA <br> TEMPLEROAD <br> ANURADHEPURA</td>
                        </tr>
                        <tr>
                            <td>E0001</td>
                            <td>MOHAMED SAHAN</td>
                            <td>+94782877888</td>
                            <td>2024-10-10</td>
                            <td>sahansafa2002@gmail.com</td>
                            <td>ANURADHEPURA</td>
                            <td>200131802340 </td>
                            <td class="text-start">IKKIRIGOLLEWA,<br> WAHAMALGOLLEWA <br> TEMPLEROAD <br> ANURADHEPURA</td>
                        </tr>
                        <tr>
                            <td>E0001</td>
                            <td>MOHAMED SAHAN</td>
                            <td>+94782877888</td>
                            <td>2024-10-10</td>
                            <td>sahansafa2002@gmail.com</td>
                            <td>ANURADHEPURA</td>
                            <td>200131802340 </td>
                            <td class="text-start">IKKIRIGOLLEWA,<br> WAHAMALGOLLEWA <br> TEMPLEROAD <br> ANURADHEPURA</td>
                        </tr>
                        <tr>
                            <td>E0001</td>
                            <td>MOHAMED SAHAN</td>
                            <td>+94782877888</td>
                            <td>2024-10-10</td>
                            <td>sahansafa2002@gmail.com</td>
                            <td>ANURADHEPURA</td>
                            <td>200131802340 </td>
                            <td class="text-start">IKKIRIGOLLEWA,<br> WAHAMALGOLLEWA <br> TEMPLEROAD <br> ANURADHEPURA</td>
                        </tr>
                        <tr>
                            <td>E0001</td>
                            <td>MOHAMED SAHAN</td>
                            <td>+94782877888</td>
                            <td>2024-10-10</td>
                            <td>sahansafa2002@gmail.com</td>
                            <td>ANURADHEPURA</td>
                            <td>200131802340 </td>
                            <td class="text-start">IKKIRIGOLLEWA,<br> WAHAMALGOLLEWA <br> TEMPLEROAD <br> ANURADHEPURA</td>
                        </tr>
                        
                    </tbody>
                </table>
            </div>

        </div>

    </div>
</body>
</html>
