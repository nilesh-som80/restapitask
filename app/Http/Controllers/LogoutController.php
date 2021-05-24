<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class LogoutController extends Controller
{
    
    public function destroy(Request $request)
    {
        $token = $request->user()->token();
        $token->revoke();
        Auth::guard('web')->logout();
        $res = ['message'=>'you have logged out successfully'];
        return response()->json($res,200);
    }
}
