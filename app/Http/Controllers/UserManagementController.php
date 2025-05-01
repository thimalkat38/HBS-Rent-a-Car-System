<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Business;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class UserManagementController extends Controller
{

    public function index(Request $request)
    {
        $search = $request->input('search');
        $businessId = $request->input('business_id');

        $query = User::query();

        if ($search) {
            $query->where('User_number', 'LIKE', "%{$search}%");
        }

        if ($businessId) {
            $query->where('business_id', $businessId);
        }

        $Users = $query->get();

        return view('SuperAdmin.AllUsers', compact('Users', 'search', 'businessId'));
    }



    public function create()
    {
        $businesses = Business::all();
        return view('SuperAdmin.UserCreate', compact('businesses')); // Create this blade view
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'userType' => 'required|in:user,manager,admin',
            'business_id' => 'required|exists:businesses,id',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'userType' => $request->userType,
            'business_id' => $request->business_id, // <-- Get business_id from dropdown
        ]);


        return redirect()->back()->with('success', 'User created successfully.');
    }


    public function destroy($id)
    {
        $Users = User::findOrFail($id);

        // Delete the User record
        $Users->delete();

        return redirect('users')->with('success', 'User deleted successfully!');
    }


    public function search(Request $request)
    {
        $query = User::query();

        if ($request->filled('name')) {
            $query->where('name', 'LIKE', "%{$request->name}%");
        }

        if ($request->filled('userType')) {
            $query->where('userType', 'LIKE', "%{$request->userType}%");
        }

        if ($request->filled('email')) {
            $query->where('email', 'LIKE', "%{$request->email}%");
        }


        // Retrieve matching vehicles
        $Users = $query->get();

        return view('SuperAdmin.AllUsers', compact('Users'));
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = User::findOrFail($request->user_id);
        $user->password = Hash::make($request->password);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully.');
    }
}
