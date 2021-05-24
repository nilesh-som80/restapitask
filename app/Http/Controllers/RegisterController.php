<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function store(Request $request)
    {
        $validate = Validator::make($request->all(),[
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'password' => 'required|string|min:8|confirmed',
        ]);
        if($validate->fails()) {
            return response()->json($validate->errors(),202);
        }
        $allData = $request->all();
        $allData['password'] = Hash::make($allData['password']);
        $user = User::create($allData);
        $resArr = [];
        $resArr['token'] = $user->createToken('api-application')->accessToken;
        $resArr['name'] = $user->name;
        Auth::attempt(['email' => $allData['email'], 'password' => $request['password']]);


        return response()->json($resArr, 200);


    }


}
