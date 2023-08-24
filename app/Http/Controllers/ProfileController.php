<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Validator;

class ProfileController extends Controller
{
    public function showProfile(User $user)
    {
        $user['role'] = $user->role->name;
        // dd($user);
        return response()->json(['profile' => $user]);
    }

    public function updateProfile(Request $request)
    {
        try{
        // Validate and update the authenticated user's profile data
        $user = $request->user();

        $request->validate([
            'name' => 'required|string',
            // Add more validation rules for other fields you want to update
        ]);

        $user->profile->update([
            'name' => $request->input('name'),
            // Update other fields here
        ]);

        return response()->json(['message' => 'Profile updated successfully'], 200);
    }catch (Exception $e) {
        return response()->json(['message' => 'Error while accessing the API.'], 500);
    }
    }

    public function createProfile(Request $request)
    {
        try {
        // dd($request);
        // Validate and create a new user profile
        // $user = $request->user();
// dd($us/er);
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'profile_id' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'phone_no' => 'required',
            'role' => 'required',
            // 'captcha' => 'required|captcha',
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()], 422);
        }
        $user = User::where('profile_id', $request->profile_id)->get();
// dd($user);
        if (!$user) {
            return response()->json(['error' => 'Profile already exists'], 400);
        }
// dd($request);
        // $user->create([
        //     'name' => $request->name,
        //     'profile_id' => $request->profile_id,
        //     'email' => $request->email,
        //     'password' => bcrypt($request->password),
        //     'phone_no' => $request->phone_no,
        //     'role_id' => $request->role,
        //     // Create other fields here
        // ]);

        $user = new User([
            'name' => $request->name,
            'profile_id' => $request->profile_id,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone_no' => $request->phone_no,
            'role_id' => $request->role,
            'created_by' => auth()->user()->id,
        ]);
        // dd($user);
        $user->save();
// dd($user);
        return response()->json(['message' => 'Profile created successfully']);
    }catch (\Exception $e) {
        return response()->json(['error' => 'Failed to create profile'], 500);
    }
}
}
