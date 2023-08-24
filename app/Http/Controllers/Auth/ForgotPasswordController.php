<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\SendsPasswordResetEmails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;

class ForgotPasswordController extends Controller
{
        public function sendResetLinkEmail(Request $request)
        {
            $email = $request->email;

            $response = Password::sendResetLink(['email' => $email]);

            // return $response == Password::RESET_LINK_SENT
            // ? response()->json(['message' => 'Reset link sent to your email'])
            // : response()->json(['message' => 'Unable to send reset link'], 422);

            if ($response == Password::RESET_LINK_SENT) {
                return response()->json([
                    'status' => 'success',
                    'message' => 'Reset password link sent.',
                ]);
            } else {
                return response()->json([
                    'status' => 'error',
                    'message' => 'Please enter valid email',
                ]);
            }
        }
}
