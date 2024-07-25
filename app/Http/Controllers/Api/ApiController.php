<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pharmacist;

class ApiController extends Controller
{
    //REGISTER METHOD - POST
    public function register(Request $request){
        //validation
        $request -> validate([
            "name" => "required",
            "password" => "required",
            "phone_num" => "required|unique:pharmacists",
            "role" => "required"
        ]);

        //create data
        $pharmacist = new Pharmacist();

        $pharmacist -> name = $request->name;
        $pharmacist -> phone_num = $request->phone_num;
        $pharmacist -> password = bcrypt($request->password);
        $pharmacist -> role = $request->role;

        //save data and send response
        $pharmacist->save();

        return response()->json([
            "message" => "Phamacists created successfully"
        ]);
    }

    //LOGIN METHOD - POST
    public function login(Request $request){
        //validation
        $login_data = $request -> validate([
            "phone_num" => "required",
            "password" => "required"
        ]);

        //validate pharmacist data
        if(!auth()->attempt($login_data)){

            return response()->json([
                "status"=>false,
                "message"=> "Invalid Credentials"
            ]);
        }

        //token
        $token = auth()->user()->createToken("auth_token")->accessToken;

        //send resposne
        return response()->json([
            "status" => true,
            "message" => "Pharmacist logged in successfully",
            "access_token" => $token
        ]);
    }

    // Logout API (GET)
    public function logout(){

        auth()->user()->token()->revoke();

        return response()->json([
            "status" => true,
            "message" => "User logged out"
        ]);
    }
}
