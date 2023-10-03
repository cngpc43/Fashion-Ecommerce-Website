<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    public function getAllUsers(){
        echo '2';
    }
    public function createNewUser(Request $request){
        $data = $request->only('email','password');

        // Validation
        // $user = [
        //     'email'=>$request->email,
        //     'password'=>Hash::make($request->password)
        // ];
        
        $user = User::create([
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
        ]);
        if (!$user){
            return response()->json([
                'errCode'=>406,
                'errMess'=>'err',
            ],406);
        } else {
            return response()->json([
                'errCode'=>200,
                'errMess'=>'Ok !',
                'data'=>$user
            ],200);
        }
    }
}
