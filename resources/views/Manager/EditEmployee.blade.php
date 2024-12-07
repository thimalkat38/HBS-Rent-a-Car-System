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
    </head>
<body>
    <div class="container">
        <!-- Edit Employee Form -->
        <form action="{{ route('employees.update', $employee->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        
            <div class="form-section">
                <h1 class="title">Edit Employee</h1>
        
                <!-- Success Message -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
        
                <!-- General Error Message -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
        
                <!-- Employee ID -->
                <div class="form-row">
                    <label for="emp_id">Employee ID</label>
                    <input type="text" name="emp_id" value="{{ old('emp_id', $employee->emp_id) }}" required readonly>
                </div>
        
                <!-- Employee Name and Mobile Number -->
                <div class="form-row">
                    <label for="emp_name">Employee Name</label>
                    <input type="text" name="emp_name" value="{{ old('emp_name', $employee->emp_name) }}" readonly>
                    @error('emp_name')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
        
                    <label for="mobile_number">Mobile Number</label>
                    <input type="text" name="mobile_number" value="{{ old('mobile_number', $employee->mobile_number) }}" required>
                    @error('mobile_number')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
        
                <!-- Join Date and Email -->
                <div class="form-row">
                    <label for="join_date">Join Date</label>
                    <input type="date" name="join_date" value="{{ old('join_date', $employee->join_date) }}" readonly>
                    @error('join_date')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
        
                    <label for="email">Email Address</label>
                    <input type="email" name="email" value="{{ old('email', $employee->email) }}" required>
                    @error('email')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
        
                <!-- Age and NIC -->
                <div class="form-row">
                    <label for="age">Age</label>
                    <input type="number" name="age" value="{{ old('age', $employee->age) }}" required>
                    @error('age')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
        
                    <label for="nic">NIC</label>
                    <input type="text" name="nic" value="{{ old('nic', $employee->nic) }}" readonly>
                    @error('nic')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
        
                <!-- Bank and Account Number -->
                <div class="form-row">
                    <label for="bank">Bank</label>
                    <input type="text" name="bank" value="{{ old('bank', $employee->bank) }}" required>
                    @error('bank')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
        
                    <label for="acc_number">Account Number</label>
                    <input type="text" name="acc_number" value="{{ old('acc_number', $employee->acc_number) }}" required>
                    @error('acc_number')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
        
                <!-- Address -->
                <div class="form-row">
                    <label for="address">Address</label>
                    <textarea name="address" rows="4" required>{{ old('address', $employee->address) }}</textarea>
                    @error('address')
                        <div class="error-message">{{ $message }}</div>
                    @enderror
                </div>
        
                <!-- Submit and Cancel Buttons -->
                <div class="submit-container">
                    <button type="submit" class="btn-submit">Update Employee</button>
                    <a href="{{ route('employees.index') }}" class="btn-submit">Cancel</a>
                </div>
            </div>
        </form>
        
    </div>
</body>
</html>
