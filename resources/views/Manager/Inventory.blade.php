<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HBS Car Rental Management System</title>
    <!-- Google Fonts for Oxanium -->
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="Style.css">
</head>
<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo-section">
                <img src="logo.png" class="logo-icon" alt="HBS Car Rental Logo">
            </div>
            <div class="header-title">HBS Car Rental Management System</div>
        </div>

<!-- Main Content -->
<div class="main-content">
    <!-- Sidebar -->
    <div class="sidebar">
        <nav class="nav">
        <div class="nav-item">
            <a class="nav-link" href="Dashboard.html"><img src="1.png" alt="Dashboard" class="nav-icon"> DASHBOARD</a>
        </div>

        <div class="nav-item">
            <a class="nav-link"><img src="2.png" alt="Vehicles" class="nav-icon"> VEHICLES</a>
            <div class="dropdown-menu">
                <a class="dropdown-link" href="Vehicle.html">Add Vehicle</a>
                <a class="dropdown-link" href="VehicleList.html">List Vehicle</a>
            </div>
        </div>

        <div class="nav-item">
            <a class="nav-link"><img src="3.png" alt="Bookings" class="nav-icon"> BOOKINGS</a>
            <div class="dropdown-menu">
                <a class="dropdown-link" href="Booking.html">Book Vehicle</a>
                <a class="dropdown-link" href="Booking2.html">Booking History</a>
            </div>
        </div>

        <div class="nav-item">
            <a class="nav-link"><img src="4.png" alt="Customers" class="nav-icon"> CUSTOMERS</a>
            <div class="dropdown-menu">
                <a class="dropdown-link" href="Customers.html">Add Cuctomer</a>
                <a class="dropdown-link" href="CustomerList.html">List Customer</a>
            </div>
        </div>

        <div class="nav-item">
            <a class="nav-link" ><img src="5.png" alt="HRM" class="nav-icon"> HRM</a>
            <div class="dropdown-menu">
                <a class="dropdown-link" href="HRM.html">Add Employee</a>
                <a class="dropdown-link" href="HRM01.html">Details Employee</a>
            </div>
        </div>

        <div class="nav-item">
            <a class="nav-link" href="CRM.html"><img src="6.png" alt="CRM" class="nav-icon"> CRM</a>
        </div>

        <div class="nav-item">
            <a class="nav-link active" href="Inventory-1.html"><img src="7.png" alt="Inventory" class="nav-icon"> INVENTORY</a>
        </div>

        <div class="nav-item">
            <a class="nav-link" href="Accounting.html"><img src="8.png" alt="Accounting" class="nav-icon"> ACCOUNTING</a>
        </div>
    </nav>
</div>

<!-- Form Section -->
            <div class="table-content">
                <div class="form-section">
                    <form>
                        <div class="form-row">
                            <select class="selection-list">
                                <option value="Year" disabled selected>Item ID</option>
                                <option>ID 1</option>
                                <option>ID 2</option>
                                <option>ID 3</option>
                            </select>
                            <select class="selection-list">
                                <option value="Month" disabled selected>Item Name</option>
                                <option>Item 1</option>
                                <option>Item 2</option>
                                <option>Item 3</option>
                            </select>
                            <div class="card1">
                            <div class="card1-content">
                                <div class="card1-submit-container">
                                    <a href="Inventory.html">
                                    <button type="submit" class="card1-btn-submit">ADD INVENTORY</button></a>
                                </div>
                            </div>
                            </div>
                        </div>
                    </form>
            <table class="table table-bordered">
                     <thead>
                    <tr>
                        <th>Item ID</th>
                        <th>Item Name</th>
                        <th>Item Image</th>
                        <th>Item Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="row bg-beige">
                        <td>INV 01</td>
                        <td>LICENCE PLATE</td>
                        <td><img src="numberplate.jpeg" alt="Licence Plate"></td>
                        <td>
                            <span>115</span>
                            <div class="stock-bar green-bar" style="width: 90%;"></div>          
                        </td>
                    </tr>
                    <tr class="row bg-green">
                        <td>INV 01</td>
                        <td>LICENCE PLATE</td>
                        <td><img src="numberplate.jpeg" alt="Licence Plate"></td>
                        <td>
                            <span>30</span>
                            <div class="stock-bar orange-bar" style="width: 50%;"></div>
                        </td>
                    </tr>
                    <tr class="row bg-beige">
                        <td>INV 01</td>
                        <td>LICENCE PLATE</td>
                        <td><img src="numberplate.jpeg" alt="Licence Plate"></td>
                        <td>
                            <span>10</span>
                            <div class="stock-bar red-bar" style="width: 20%;"></div>
                        </td>
                    </tr>
                    <tr class="row bg-green">
                        <td>INV 01</td>
                        <td>LICENCE PLATE</td>
                        <td><img src="numberplate.jpeg" alt="Licence Plate"></td>
                        <td>
                            <span>115</span>
                            <div class="stock-bar green-bar" style="width: 90%;"></div>
                        </td>
                    </tr>
                    <tr class="row bg-beige">
                        <td>INV 01</td>
                        <td>LICENCE PLATE</td>
                        <td><img src="numberplate.jpeg" alt="Licence Plate"></td>
                        <td>
                            <span>115</span>
                            <div class="stock-bar green-bar" style="width: 90%;"></div>
                        </td>
                    </tr>
                </tbody>
                </table>
            </div>

            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>Copyright © 2022 Golden Ray. All Rights Reserved. Designed By Ezone IT SOLUTION</p>
        </div>
    </div>
    <script src="Dashboard.js"></script>
</body>
</html>
