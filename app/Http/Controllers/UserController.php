<?php

namespace App\Http\Controllers;

use App\Helper\JWTToken;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{

    public function updateUserInfo(Request $request)
    {
        // Validate only the fields that are provided
        $validatedRequest = $request->validate([
            'email' => 'sometimes|email',
            'name' => 'sometimes|max:20',
            'password' => 'sometimes|nullable', // Allow password to be nullable
        ]);

        // Find the user based on the ID passed in the header
        $user = User::find($request->header('id'));

        if ($user) {
            // Loop through the validated fields and update only if there's a difference
            foreach ($validatedRequest as $key => $value) {
                // Only update password if it is not null (to avoid setting password to null)
                if ($key === 'password' && is_null($value)) {
                    continue; // Skip password update if null
                }

                // Update only if the value has changed
                if ($user->$key !== $value) {
                    $user->$key = $value;
                }
            }

            // Save only if there's any change
            if ($user->isDirty()) {
                $user->save();
                noty()->success('Updated successfully');
            } else {
                noty()->error('No changes made');
            }
        } else {
            noty()->error('User not found');
        }

        return redirect()->back();
    }

    public function logout()
    {
        return redirect()->to('/')->cookie('token', -1);
    }
    public function login(Request $request)
    {
        $validatedRequest = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $userId = User::where('email', $validatedRequest['email'])
            ->where('password', $validatedRequest['password'])
            ->select('id')->first();

        if ($userId != null) {
            $time = time() + 60 * 60 * 24 * 7;
            $token = JWTToken::createToken($request->input('email'), $userId->id, $time);
            $intendedUrl = $request->input('intended_url');
            if ($intendedUrl == null) {
                $intendedUrl = route('profile');
            }
            noty()->success('Login Successfull');
            return redirect()->intended($intendedUrl)->cookie('token', $token, 60 * 24 * 7);

        } else {
            noty()->error('Login Failed');
            return redirect()->back();
        }
    }

    public function register(Request $request)
    {
        try {
            $validatedRequest = $request->validate([
                'email' => 'required|email',
                'name' => 'required',
                'password' => 'required',
            ]);

            User::create([
                'name' => $validatedRequest['name'],
                'email' => $validatedRequest['email'],
                'password' => $validatedRequest['password'],
            ]);
            return response()->json([
                'status' => 'success',
                'message' => 'User Registration Successfully',
            ], 200);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Something Wrong! Registration Failed',
            ], 400);
        }

    }

}
