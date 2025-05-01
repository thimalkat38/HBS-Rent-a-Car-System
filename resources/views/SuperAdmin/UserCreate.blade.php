
<div class="container">
    <h2>Create New User</h2>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li style="color:red;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="{{ route('user.store') }}">
        @csrf
        <div class="form-group mb-3">
            <label for="business_id">Select Business</label>
            <select name="business_id" id="business_id" class="form-control" required>
                <option value="">-- Select Business --</option>
                @foreach($businesses as $business)
                    <option value="{{ $business->id }}">{{ $business->b_name }}</option>
                @endforeach
            </select>
        </div>
        
        <div>
            <label>Name:</label>
            <input type="text" name="name" required />
        </div>
        <div>
            <label>Email:</label>
            <input type="email" name="email" required />
        </div>
        <div>
            <label>Password:</label>
            <input type="password" name="password" required />
        </div>
        <div>
            <label>Confirm Password:</label>
            <input type="password" name="password_confirmation" required />
        </div>
        <div>
            <label>User Type:</label>
            <select name="userType" required>
                {{-- <option value="user">User</option> --}}
                <option value="manager">Cashier</option>
                {{-- <option value="admin">Admin</option> --}}
            </select>
        </div>
        <button type="submit">Create User</button>
    </form>
</div>
