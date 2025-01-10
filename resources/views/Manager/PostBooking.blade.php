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
                            <a class="dropdown-link" href="{{ url('vehicle_owners') }}">Vehicle Owner Management</a>
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
                            <input type="text" name="nic" id="nic" value="{{ $booking->nic }}">
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
                        </div><br>
                        <div class="form-row">
                            <label for="start_km">Starting Mileage</label>
                            <input type="text" name="start_km" id="start_km" value="{{ $booking->start_km }}" readonly>
                            <label for="end_km">Ending Mileage</label>
                            <input type="text" name="end_km" id="end_km" required>
                            <label for="drived">Drived Mileage</label>
                            <input type="text" name="drived" id="drived" readonly>
                            <label for="free_km">Free KM</label>
                            <input type="text" name="free_km" id="free_km" value="{{ $booking->free_km }}" readonly>
                            <label for="over">Over Drived KM</label>
                            <input type="text" name="over" id="over" readonly>
                            <label for="extra_km_chg">Extra 1KM charges</label>
                            <input type="text" name="extra_km_chg" id="extra_km_chg" value="{{ $booking->extra_km_chg }}" readonly>
                        </div>
                        <h3>Billing Information</h3>
                        <div class="form-row">
                            <label for="price">Before Base Price</label>
                            <input type="text" name="base_price" id="base_price"
                                value="{{($booking->price + $booking->payed)}}" readonly>                            
                            <label for="price">Paid Amount</label>
                            <input type="text" name="paid" id="payed" value="{{$booking->payed}}"
                                readonly>
                                <label for="price">Payment Note</label>
                                <input type="text" name="method"value="{{$booking->method}}"
                                    readonly>
                            <label for="price" style="color: #c82333">Due (Amount remaining to be paid by the
                                customer)</label>
                            <input type="text" name="due" id="price" value="{{$booking->price }}"
                                readonly>
                        </div><br>
                        <div class="form-row">
                            <label for="extra_km">Extral KM Charges</label>
                            <input type="text" name="extra_km" id="extra_km"onfocus="clearDefaultValue(this);">
                            <label for="extra_hours">Extra hours Charges</label>
                            <input type="text" name="extra_hours" id="extra_hours"onfocus="clearDefaultValue(this);">
                            <label for="damage_fee">Damage fee</label>
                            <input type="text" name="damage_fee" id="damage_fee" onfocus="clearDefaultValue(this);">
                        </div><br>
                        <div class="form-row">
                        <label for="after_additional">Other Additional Charges</label>
                        <input type="text" name="after_additional" id="after_additional" value="0.00"
                            onfocus="clearDefaultValue(this);" oninput="updateDue(); updateTotalIncome();">
                    <label for="charge">Reason for Other Additional Charges</label>
                    <input type="text" name="reason" id="reason">
                    <label for="after_discount">After Discount Price</label>
                    <input type="text" name="after_discount" id="after_discount" value="0.00"
                        onfocus="clearDefaultValue(this);" oninput="updateDue(); updateTotalIncome();">
                        </div><br>
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
                                <div class="form-row">
                                    <label for="officer">Relesed <br>Officer's Name</label>
                                    <input type="text" name="rel_officer" id="rel_officer" value="{{$booking->officer}}" readonly>
                                    <label for="officer">Checked <br>Officer's Name</label>
                                    <input type="text" name="officer" id="officer" >
                                </div>
                                <div class="form-row">
                                    <label for="officer">Agreement <br>Number</label>
                                    <input type="text" name="agn" id="agn" >
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
    function updateCalculations() {
        const startKm = parseFloat(document.getElementById('start_km').value) || 0;
        const endKm = parseFloat(document.getElementById('end_km').value) || 0;
        const freeKm = parseFloat(document.getElementById('free_km').value) || 0;
        const extraKmChg = parseFloat(document.getElementById('extra_km_chg').value) || 0;

        const additionalCharges = parseFloat(document.getElementById('after_additional').value) || 0;
        const discountPrice = parseFloat(document.getElementById('after_discount').value) || 0;
        const extraHoursCharges = parseFloat(document.getElementById('extra_hours').value) || 0;
        const damageFee = parseFloat(document.getElementById('damage_fee').value) || 0;
        const payed = parseFloat(document.getElementById('payed').value) || 0;

        const basePrice = parseFloat(document.getElementById('base_price').value) || 0;

        // Calculate drived and over
        const drived = endKm - startKm;
        document.getElementById('drived').value = drived;

        const over = drived - freeKm;
        document.getElementById('over').value = over;

        // Calculate extra km charges
        const extraKm = over > 0 ? over * extraKmChg : 0;
        document.getElementById('extra_km').value = extraKm.toFixed(2);

        // Calculate the updated due
        const updatedDue = basePrice - payed + additionalCharges + extraKm + extraHoursCharges + damageFee - discountPrice;
        document.getElementById('price').value = updatedDue.toFixed(2);

        // Calculate total income
        const totalIncome = basePrice + additionalCharges + extraKm + extraHoursCharges + damageFee - discountPrice;
        document.getElementById('total_income').value = totalIncome.toFixed(2);
    }

    document.addEventListener("DOMContentLoaded", function () {
        // Set default values
        document.getElementById('after_additional').value = "0";
        document.getElementById('after_discount').value = "0";
        document.getElementById('extra_km').value = "0";
        document.getElementById('extra_hours').value = "0";
        document.getElementById('damage_fee').value = "0";

        const basePrice = parseFloat(document.getElementById('base_price').value) || 0;
        document.getElementById('total_income').value = basePrice.toFixed(2);

        // Add event listeners to recalculate on input
        document.querySelectorAll('#end_km, #after_additional, #after_discount, #extra_km, #extra_hours, #damage_fee').forEach(input => {
            input.addEventListener('input', updateCalculations);
        });

        // Initial calculation
        updateCalculations();
    });
</script>
<style>
    .modal {
        display: none;
        position: fixed;
        z-index: 1000;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: hidden;
        background-color: rgba(0, 0, 0, 0.9);
    }

    .modal-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        max-width: 90%;
        max-height: 90%;
        width: auto;
        height: auto;
        border-radius: 5px;
    }

    .close {
        position: absolute;
        top: 20px;
        right: 30px;
        color: white;
        font-size: 35px;
        font-weight: bold;
        cursor: pointer;
    }

    .close:hover,
    .close:focus {
        color: red;
    }

    #prevButton,
    #nextButton {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background: rgba(0, 0, 0, 0.6);
        color: white;
        border: none;
        font-size: 24px;
        cursor: pointer;
        padding: 10px 20px;
        z-index: 1001;
    }

    #prevButton {
        left: 20px;
    }

    #nextButton {
        right: 20px;
    }

    #prevButton:hover,
    #nextButton:hover {
        background: rgba(255, 255, 255, 0.8);
        color: black;
    }
</style>

</html>
