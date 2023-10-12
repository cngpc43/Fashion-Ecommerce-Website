<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Model
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
// 

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class UserController extends Controller
{
    public function getAllUsers(){
        $users = User::all();
        if (!$users){
            return response()->json([
                'errCode'=>400,
                'errMess'=>'No user in the table',
            ],400);
        } else {
            return response()->json([
                'errCode'=>200,
                'errMess'=>'Success!',
                'data'=>$users
            ],200);
        }
    }
    // Find by email
    public function findUser(Request $request){
        $user = User::where('email',$request->query('email'))->first();
        if (!$user){
            return response()->json([
                'errCode'=>400,
                'errMess'=>'No user in the table',
            ],400);
        } else {
            return response()->json([
                'errCode'=>200,
                'errMess'=>'Success!',
                'data'=>$user
            ],200);
        }
    }

    public function createNewUser(Request $request){
        // Validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        // Check email in db
        $emailExist = User::where('email',$request->query('email'))->first();
        if($emailExist){
            return redirect()->back()->withErrors(['email' => 'email has existed in db'])->withInput();
        }


        $user = User::create([
            'email'=>$request->email,
            'password'=>Hash::make($request->password),
            'phoneNumber'=>$request->phoneNumber,
            'address'=>$request->address,
            'roleId'=>$request->roleId
        ]);
        if (!$user){
            return response()->json([
                'errCode'=>400,
                'errMess'=>'Cannot create user',
            ],400);
        } else {
            return response()->json([
                'errCode'=>200,
                'errMess'=>'Ok !',
                'data'=>$user
            ],200);
        }
    }

    public function updateUser(Request $request){

        $user = User::where('email', $request->email)->update([
            'password' => Hash::make($request->password),
            'phoneNumber' => $request->phoneNumber,
            'address' => $request->address,
            'roleId' => $request->roleId
        ]);
        if (!$user){
            return response()->json([
                'errCode'=>400,
                'errMess'=>'Cannot update user',
            ],400);
        } else {
            return response()->json([
                'errCode'=>200,
                'errMess'=>'Ok !',
                'data'=>$user
            ],200);
        }
    }
    public function deleteUser(Request $request){
        $user = User::find($request->query('id'));
        if(!$user){
            return response()->json([
                'errCode'=>'400',
                'errMess'=>'Cannot find this user in db'
            ],400);
        }
        else {
            $user->delete();
            return response()->json([
                'errCode'=>'200',
                'errMess'=>'Delete successfully'
            ],200);
        }
    }


    // LOGIN PART 
    public function login(Request $request){
        // Validation
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'The email field is required.',
            'email.email' => 'Please enter a valid email address.',
            'password.required' => 'The password field is required.',
        ]);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $isLogin = Auth::attempt([
            'email'=>$request->email,
            'password'=>$request->password
        ]);
        if(!$isLogin){
            return redirect()->back()->withErrors(['email' => 'Invalid email or password'])->withInput();
        } else {
            // Check if we not have cart session . Convert session -> DB 
            if ($request->session()->has('cart')){
                $sessionProducts = $request->session()->get('cart');
                foreach($sessionProducts as $sessionProductId => $sessionQuantity){
                    // Case user have product in cart before
                    $ExistProductCart = Cart::where('customerId',Auth::user()->id)
                    ->where('productDetailId',$sessionProductId)
                    ->first();
                    if ($ExistProductCart) {
                        $ExistProductCart->quantity+=$sessionQuantity['quantity'];
                        $ExistProductCart->save();
                    } else {
                        $newProduct = new Cart();
                        $newProduct->customerId = Auth::user()->id;
                        $newProduct->productDetailId = $sessionProductId;
                        $newProduct->quantity = $sessionQuantity['quantity'];
                        $newProduct->save();
                    }
                }
                $request->session()->forget('cart');
            } 

            $request->session()->regenerate();
            return response()->json([
                'errCode'=>200,
                'errMess'=>'Login successfully',
                'data'=>Auth::user()
            ]);
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerate();
        return redirect('/');
    }
    public function test(Request $request){
        Auth::attempt([
            'email'=>'jey1@gmail.com',
            'password'=>'123'
        ]);
        $request->session()->regenerate();
        if (Auth::check()){
            echo 'ok';
        } else {
            echo 'no';
        }
    }
    public function test2(Request $request){
        if(Auth::check()){
            return response()->json([
                'err'=>'ok'
            ]);
        } else {
            return response()->json([
                'err'=>'err'
            ]);
        }
    }
    public function test3(Request $request){
        if(Auth::check()){
            echo Auth::user();
        } else {
            echo 'no';
        }
    }
    public function test4(Request $request){
        $sessionTest = $request->session()->get('cart');
        $request->session()->forget('cart');
    }
    public function test5(Request $request){
        $cart = $request->session()->get('cart');
        echo json_encode($cart);
        
    }
}
