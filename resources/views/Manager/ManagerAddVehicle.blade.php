<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HBS Car Rental Management System</title>
    <!-- Google Fonts for Oxanium -->
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;700&display=swap" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo-section">
                <img src="{{ asset('images/logo.png') }}" class="logo-icon" alt="HBS Car Rental Logo">
            </div>
            <div class="header-title">HBS Car Rental Management System</div>
            <div>
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                        onclick="event.preventDefault();
                                    this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>

        <!-- Main Content -->
        <div class="main-content">
            <!-- Sidebar -->
            <div class="sidebar">
                <nav class="nav">
                    <div class="nav-item">
                        <a class="nav-link" href="{{ url('manager/dashboard') }}"><img src="{{ asset('images/1.png') }}"
                                alt="Dashboard" class="nav-icon"> DASHBOARD</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link active"><img src="{{ asset('images/2.png') }}" alt="Vehicles" class="nav-icon">
                            VEHICLES</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('addvehicle') }}">Add Vehicle</a>
                            <a class="dropdown-link" href="{{ url('manager/vehicles') }}">List Vehicle</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link"><img src="{{ asset('images/3.png') }}" alt="Bookings" class="nav-icon">
                            BOOKINGS</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('manager/addbook') }}">Book Vehicle</a>
                            <a class="dropdown-link" href="{{ url('bookings') }}">Booking History</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link"><img src="{{ asset('images/4.png') }}" alt="Customers" class="nav-icon">
                            CUSTOMERS</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('/customers/create') }}">Add Customer</a>
                            <a class="dropdown-link" href="{{ url('customers') }}">List Customer</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link"><img src="{{ asset('images/5.png') }}" alt="HRM" class="nav-icon"> HRM
                            (under development...)</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('manager/addemp') }}">Add Employee</a>
                            <a class="dropdown-link" href="{{ url('manager/emp') }}">List Employee</a>
                            <a class="dropdown-link" href="{{ url('hrm/details') }}">Employee Details</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/6.png') }}" alt="CRM"
                                class="nav-icon"> CRM (under development...)</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('inventory.index') }}">
                            <img src="{{ asset('images/7.png') }}" alt="Inventory" class="nav-icon">
                            INVENTORY (under development...)
                        </a>
                    </div>  
                    <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/8.png') }}" alt="Accounting"
                                class="nav-icon"> ACCOUNTING (under development...)</a>
                    </div>
                </nav>
            </div>

            <!-- Form Section -->
            <div class="content">
                <form action="{{ route('manager.storevehicle') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-section">

                        {{-- error handling --}}
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-row">
                            <input type="text" name="vehicle_number" placeholder="Register Number">                            
                                <input type="text" name="vehicle_name" id="vehicle_name" placeholder="Vehicle Model" autocomplete="off">
                                <ul id="model-suggestions" class="list-group" style="position: absolute; display: none;">
                                </ul>
                        </div>
                        
                        
                        <div class="form-row">
                            <select name="vehicle_type" class="selection-list">
                                <option value="" disabled selected>Vehicle Type</option>
                                <option value="Car">Car</option>
                                <option value="Van">Van</option>
                                <option value="Bus">Bus</option>
                                <option value="Other">Other</option>
                            </select>
                            <input type="text" name="vehicle_model" placeholder="Manufacturer">
                        </div>
                        <div class="form-row">
                            <input type="text" name="engine_number" placeholder="Engine Number">
                            <select name="fuel_type" class="selection-list">
                                <option value="" disabled selected>Fuel Type</option>
                                <option value="Petrol">Petrol</option>
                                <option value="Diesel">Diesel</option>
                                <option value="Electric">Electric</option>
                            </select>
                        </div>
                        <div class="form-row">
                            <input type="text" name="chassis_number" placeholder="Chassis Number">
                            <input type="text" name="model_year" placeholder="Year Of Manufacture">
                        </div>
                        <div class="form-row">
                            <input type="text" name="price_per_day" placeholder="Price Per Day">
                            <input type="text" name="free_km" placeholder="Free KM">
                            <input type="text" name="extra_km_chg" placeholder="Extra 1 KM Charge">                      
                        </div>
                        <div class="upload-section">
                            <p>Add Vehicle Images</p>
                            <input type="file" name="images[]" accept="image/*" multiple>
                        </div>

                        <div class="checkbox-section">
                            <div>
                                <input type="checkbox" id="chassyNumber" name="chassyNumber">
                                <label for="chassyNumber">Chassy Number</label>
                            </div>
                            <div>
                                <input type="checkbox" id="leatherSeats" name="leatherSeats">
                                <label for="leatherSeats">Leather Seats</label>
                            </div>
                            <div>
                                <input type="checkbox" id="airConditioner" name="airConditioner">
                                <label for="airConditioner">Air Conditioner</label>
                            </div>
                            <div>
                                <input type="checkbox" id="powerSteering" name="powerSteering">
                                <label for="powerSteering">Power Steering</label>
                            </div>
                            <div>
                                <input type="checkbox" id="cdPlayer" name="cdPlayer">
                                <label for="cdPlayer">CD Player</label>
                            </div>
                            <div>
                                <input type="checkbox" id="powerDoor" name="powerDoor">
                                <label for="powerDoor">Power Door</label>
                            </div>
                        </div>
                    </div>
                    <div class="submit-container">
                        <button type="reset" class="btn-submit">CANCEL</button>
                        <button type="submit" class="btn-submit">SUBMIT</button>
                    </div>
                </form>
            </div>
        </div>

        <!-- Footer -->
        <div class="footer">
            <p>© 2024. All rights reserved. Designed by Ezone IT Solutions.</p>
        </div>
    </div>
    
    <script>
        $(document).ready(function() {
            $('#vehicle_name').on('keyup', function() {
                let query = $(this).val();
                if (query.length >= 2) {
                    $.ajax({
                        url: "{{ route('getVehicleModels') }}",
                        type: "GET",
                        data: { query: query },
                        success: function(data) {
                            // Remove duplicate models from data
                            let uniqueData = Array.from(new Set(data));
    
                            let dropdown = $('#model-suggestions');
                            dropdown.empty().show();
                            if (uniqueData.length) {
                                $.each(uniqueData, function(index, model) {
                                    dropdown.append(`<div class="list-group-item" onclick="selectModel('${model}')">${model}</div>`);
                                });
                            } else {
                                dropdown.append(`<div class="list-group-item">No results found. Type to Add New model.</div>`);
                            }
                        }
                    });
                } else {
                    $('#model-suggestions').hide();
                }
            });
    
            // Function to set the selected model in the input field and hide the dropdown
            window.selectModel = function(model) {
                $('#vehicle_name').val(model);
                $('#model-suggestions').hide();
            };
    
            // Hide dropdown when clicking outside of it
            $(document).on('click', function(event) {
                if (!$(event.target).closest('#vehicle_name, #model-suggestions').length) {
                    $('#model-suggestions').hide();
                }
            });
        });
    </script>
    

<style>
    #model-suggestions {
        background-color: #fff;
            border: 1px solid #ccc;
            max-height: 200px;
            /* Adjust based on your preference */
            overflow-y: auto;
            list-style-type: none;
            padding: 1%;
            margin-top: 3%;
            margin-left: 38%;
            width: 35%;
            align-content: left;
    }

    #model-suggestions .list-group-item {
        padding: 10px;
        cursor: pointer;
    }

    #model-suggestions .list-group-item:hover {
        background-color: #f0f0f0;
    }
</style>

</body>

</html>
