<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HBS Car Rental Management System</title>
    <!-- Google Fonts for Oxanium -->
    <link href="https://fonts.googleapis.com/css2?family=Oxanium:wght@300;400;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/Style.css') }}">
    <style>
        .cards-row {
            justify-content: space-between;
        }

        .card {
            flex: 1;
            height: 70%;
            padding: 15px 30px;
            font-size: 12px;
            text-align: center;
            border: none;
            color: white;
            border-radius: 8px;
            cursor: pointer;
            margin: 0 10px;
            transition: transform 0.2s;
            margin-bottom: 10px;
        }

        .card:hover {
            transform: scale(1.05);
        }

        .card h3 {
            margin: 0 0 5px;
        }

        .card-buttons {
            display: flex;
            justify-content: center;
            gap: 10px;
            margin-top: 10px;
        }

        .btn-delete {
            background-color: #dc3545;
            padding: 15px 30px;
            display: flex;
        }

        .btn-delete:hover {
            background-color: #c82333;
        }

        .card-green {
            background-color: #8AC289;
        }

        .card-orange {
            background-color: #FD754E;
        }

        .card-pink {
            background-color: #F37383;
        }

        .card-purple {
            background-color: #AE85ED;
        }

        .details {
            padding: 10px;
            background-color: #f9f9f9;
            border: 1px solid black;
            border-radius: 8px;
            height: 25%;
        }

        img {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            cursor: pointer;
        }

        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            padding-top: 60px;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            overflow: auto;
            background-color: rgba(0, 0, 0, 0.9);
        }

        .modal-content {
            margin: auto;
            display: block;
            max-width: 90%;
            max-height: 90%;
            border-radius: 8px;
        }

        .close {
            position: absolute;
            top: 20px;
            right: 35px;
            color: white;
            font-size: 40px;
            font-weight: bold;
            cursor: pointer;
        }

        #prevButton,
        #nextButton {
            position: absolute;
            top: 50%;
            color: white;
            font-size: 30px;
            font-weight: bold;
            background-color: rgba(0, 0, 0, 0.5);
            border: none;
            cursor: pointer;
            padding: 10px;
            border-radius: 50%;
        }

        #prevButton {
            left: 5%;
        }

        #nextButton {
            right: 5%;
        }
    </style>
</head>

<body>
    <div class="container">
        <!-- Header -->
        <div class="header">
            <div class="logo-section">
                <img src="{{ asset('images/logo.png') }}" class="logo-icon" alt="HBS Car Rental Logo">
            </div>
            <div class="header-title">HBS Rent a Car</div>
            <a href="#" class="sign-out"> Sign Out</a>
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
                        <a class="nav-link"><img src="{{ asset('images/2.png') }}" alt="Vehicles" class="nav-icon">
                            VEHICLES</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('addvehicle') }}">Add Vehicle</a>
                            <a class="dropdown-link" href="{{ url('manager/vehicles') }}">List Vehicle</a>
                        </div>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link active"><img src="{{ asset('images/3.png') }}" alt="Bookings"
                                class="nav-icon">
                            BOOKINGS</a>
                        <div class="dropdown-menu">
                            <a class="dropdown-link" href="{{ url('manager/addbook') }}">Book Vehicle</a>
                            <a class="dropdown-link" href="{{ url('bookings') }}">Booking History</a>
                            <a class="dropdown-link" href="{{ url('postbookings') }}">Completed Businesses</a>
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
                        <a class="nav-link" href="{{ url('hr-management') }}"><img src="{{ asset('images/5.png') }}"
                                alt="HRM" class="nav-icon"> HRM</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ url('crms') }}"><img src="{{ asset('images/6.png') }}"
                                alt="CRM" class="nav-icon"> CRM</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('inventory.index') }}">
                            <img src="{{ asset('images/7.png') }}" alt="Inventory" class="nav-icon">
                            INVENTORY
                        </a>
                    </div>
                    {{-- <div class="nav-item">
                        <a class="nav-link" href="#"><img src="{{ asset('images/8.png') }}" alt="Accounting"
                                class="nav-icon"> ACCOUNTING</a>
                    </div> --}}
                </nav>
            </div>

            <!-- Form Section -->
            <form action="{{ route('postbookings.store') }}" method="POST">
                @csrf
                <div class="content">
                    <div class="form-section">
                        <h3>Customer Information</h3>
                        <div class="form-row">
                            <input type="hidden" name="id" value="{{ $booking->id }}">
                            <label for="v_number">Full Name</label>
                            <input type="text" name="full_name" id="full_name" value="{{ $booking->full_name }}"
                                readonly>
                            <label for="v_name">NIC</label>
                            <input type="text" name="nic" id="nic" value="{{ $booking->nic }}" readonly>
                            <label for="from-date">Contact Number</label>
                            <input type="text" name="mobile_number" id="mobile_number"
                                value="{{ $booking->mobile_number }}" readonly>
                        </div>
                        <h3>Booking Information</h3>
                        <div class="form-row">
                            <label for="v_number">Vehicle Number</label>
                            <input type="text" name="vehicle_number" id="vehicle_number"
                                value="{{ $booking->vehicle_number }}" readonly>
                            <label for="v_name">Vehicle</label>
                            <input type="text" name="vehicle" id="vehicle_name"
                                value="{{ $booking->vehicle_name }}" readonly>
                            <label for="from-date">FROM</label>
                            <input type="text" name="from_date" id="from-date" value="{{ $booking->from_date }}"
                                readonly>
                            <label for="to-date">TO</label>
                            <input type="text" name="to_date" id="to_date" value="{{ $booking->to_date }}"
                                readonly>
                        </div>
                        <h3>Billing Information</h3>
                        <div class="form-row">
                            <label for="price">Before Base Price</label>
                            <input type="text" name="base_price" id="base_price"
                                value="{{ $booking->price + $booking->payed }}" readonly>
                            <label for="after_additional">After Additional Charges</label>
                            <input type="text" name="after_additional" id="after_additional"
                                oninput="updateDue(); updateTotalIncome();">
                            <label for="charge">Reason for Additional Charges</label>
                            <input type="text" name="reason" id="reason">
                            <label for="after_discount">After Discount Price</label>
                            <input type="text" name="after_discount" id="after_discount"
                                oninput="updateDue(); updateTotalIncome();">
                            <label for="price">Paid Amount</label>
                            <input type="text" name="paid" id="payed" value="{{ $booking->payed }}"
                                readonly>
                            <label for="price" style="color: #c82333">Due (Amount remaining to be paid by the
                                customer)</label>
                            <input type="text" name="due" id="price" value="{{ $booking->price }}"
                                readonly>
                        </div>
                        <div class="form-row">
                            <label for="total_income">Total Income</label>
                            <input type="text" name="total_income" id="total_income" readonly>
                        </div>
                        <h3>Vehicle Images when Released </h6>
                            <div class="form-row">
                                <div class="form-row">
                                    @if (!empty($booking->driving_photos))
                                        <div class="image-gallery">
                                            @foreach ($booking->driving_photos as $photo)
                                                <div class="col-6 col-md-4 col-lg-3 mb-3">
                                                    <img src="{{ asset('storage/' . $photo) }}"
                                                        class="img-fluid img-thumbnail gallery-image"
                                                        alt="Driving Photo">
                                                </div>
                                            @endforeach
                                            <h6>(Click on Image to see in full screen)</h6>
                                        </div>

                                        <!-- Popup Modal -->
                                        <div id="imageModal" class="modal">
                                            <span class="close">&times;</span>
                                            <img class="modal-content" id="modalImage">
                                            <button id="prevButton">&#8249;</button>
                                            <button id="nextButton">&#8250;</button>
                                        </div>
                                    @else
                                        <p class="text-muted">No Images before vehicle release.</p>
                                    @endif
                                </div>
                            </div>
                            <div class="checkbox-section">
                                <div>
                                    <input type="hidden" name="due_paid" value="0">
                                    <input type="checkbox" name="due_paid" id="due_paid" value="1">
                                    <label for="due_paid">Due paid</label>

                                    <input type="hidden" name="deposit_refunded" value="0">
                                    <input type="checkbox" name="deposit_refunded" id="refund" value="1">
                                    <label for="refund">Deposit Refunded</label>

                                    <input type="hidden" name="vehicle_checked" value="0">
                                    <input type="checkbox" name="vehicle_checked" id="checked" value="1">
                                    <label for="checked">Vehicle Checked</label>
                                </div>


                            </div>
                    </div>
                    <div class="submit-container">
                        <button type="submit" class="btn-submit">COMPLETED</button>
                    </div>
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
        document.querySelectorAll('.card').forEach(card => {
            card.addEventListener('click', () => {
                const details = document.querySelector('.details');
                const cardTitle = card.querySelector('h3').textContent;
                details.innerHTML = `
            <h2>${cardTitle} Details</h2>
            <p>More information about ${cardTitle}.</p>
        `;
            });
        });

        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', (e) => {
                e.stopPropagation(); // Prevent the card click event
                const card = button.closest('.card');
                card.remove();
            });
        });
    </script>
</body>

<script>
    document.addEventListener('DOMContentLoaded', () => {
        const images = document.querySelectorAll('.gallery-image');
        const modal = document.getElementById('imageModal');
        const modalImage = document.getElementById('modalImage');
        const closeBtn = document.querySelector('.close');
        const prevButton = document.getElementById('prevButton');
        const nextButton = document.getElementById('nextButton');

        let currentIndex = 0;

        function showImage(index) {
            modal.style.display = 'block';
            modalImage.src = images[index].src;
        }

        images.forEach((image, index) => {
            image.addEventListener('click', () => {
                currentIndex = index;
                showImage(currentIndex);
            });
        });

        closeBtn.addEventListener('click', () => {
            modal.style.display = 'none';
        });

        prevButton.addEventListener('click', () => {
            currentIndex = (currentIndex > 0) ? currentIndex - 1 : images.length - 1;
            showImage(currentIndex);
        });

        nextButton.addEventListener('click', () => {
            currentIndex = (currentIndex < images.length - 1) ? currentIndex + 1 : 0;
            showImage(currentIndex);
        });

        modal.addEventListener('click', (e) => {
            if (e.target === modal) {
                modal.style.display = 'none';
            }
        });
    });
</script>
<script>
    // Original due value
    const originalDue = parseFloat(document.getElementById('price').value) || 0;

    function updateDue() {
        // Get input values
        const additionalCharges = parseFloat(document.getElementById('after_additional').value) || 0;
        const discountPrice = parseFloat(document.getElementById('after_discount').value) || 0;

        // Calculate the updated due
        const updatedDue = originalDue + additionalCharges - discountPrice;

        // Update the due (price) field
        document.getElementById('price').value = updatedDue.toFixed(2); // Ensure two decimal places
    }

    function updateTotalIncome() {
        // Get input values
        const basePrice = parseFloat(document.getElementById('base_price').value) || 0;
        const additionalCharges = parseFloat(document.getElementById('after_additional').value) || 0;
        const discountPrice = parseFloat(document.getElementById('after_discount').value) || 0;

        let totalIncome;

        // Check if both additionalCharges and discountPrice are zero (empty)
        if (additionalCharges === 0 && discountPrice === 0) {
            totalIncome = basePrice; // Show basePrice if both fields are empty
        } else {
            // Calculate total income
            totalIncome = basePrice + additionalCharges - discountPrice;
        }

        // Update the Total Income field
        document.getElementById('total_income').value = totalIncome.toFixed(2); // Ensure two decimal places
    }

    // Initialize total_income field on page load
    document.addEventListener("DOMContentLoaded", function () {
        const basePrice = parseFloat(document.getElementById('base_price').value) || 0;
        document.getElementById('total_income').value = basePrice.toFixed(2); // Set initial value
    });
</script>

</html>
