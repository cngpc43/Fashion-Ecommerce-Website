<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// Model
use App\Models\User;
use App\Models\Product;
use App\Models\Cart;
use App\Models\Address;
// 

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use Illuminate\View\View;

class UserController extends Controller
{

    public function show(string $id): View
    {

        return view('user.profile', [
            'user' => User::findOrFail($id),
            'address' => Address::GetDefaultAddress($id),
            'nonDefaultAddress' => Address::GetAllNonDefaultAddress($id),
        ]);
    }
    public function getAllUsers()
    {
        try {
            $users = User::all();
            if (!$users) {
                return response()->json([
                    'statusCode' => 400,
                    'Message' => 'No user in the table',
                ], 400);
            } else {
                return response()->json([
                    'statusCode' => 200,
                    'Message' => 'Success!',
                    'data' => $users
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'Message' => $e->getMessage(),
            ], 500);
        }

    }
    // Find by email
    public function findUser(Request $request)
    {
        try {
            $user = User::where('email', $request->query('email'))->first();
            if (!$user) {
                return response()->json([
                    'statusCode' => 400,
                    'Message' => 'No user in the table',
                ], 400);
            } else {
                return response()->json([
                    'statusCode' => 200,
                    'Message' => 'Success!',
                    'data' => $user
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'Message' => $e->getMessage(),
            ], 500);
        }

    }

    // public function createNewUser(Request $request)
    // {
    //     try {
    //         // Validation
    //         $validator = Validator::make($request->all(), [
    //             'email' => 'required|email',
    //             'password' => 'required',
    //         ], [
    //             'email.required' => 'The email field is required.',
    //             'email.email' => 'Please enter a valid email address.',
    //             'password.required' => 'The password field is required.',
    //         ]);
    //         if ($validator->fails()) {
    //             return redirect()->back()->withErrors($validator)->withInput();
    //         }
    //         // Check email in db
    //         $emailExist = User::where('email', $request->query('email'))->first();
    //         if ($emailExist) {
    //             return redirect()->back()->withErrors(['email' => 'email has existed in db'])->withInput();
    //         }


    //         $user = User::create([
    //             'email' => $request->email,
    //             'password' => Hash::make($request->password),
    //             'phoneNumber' => $request->phoneNumber,
    //             'address' => $request->address,
    //             'roleId' => $request->roleId
    //         ]);
    //         if (!$user) {
    //             return response()->json([
    //                 'statusCode' => 400,
    //                 'Message' => 'Cannot create user',
    //             ], 400);
    //         } else {
    //             return response()->json([
    //                 'statusCode' => 200,
    //                 'Message' => 'Ok !',
    //                 'data' => $user
    //             ], 200);
    //         }
    //     } catch (\Exception $e) {
    //         return response()->json([
    //             'statusCode' => 500,
    //             'Message' => $e->getMessage(),
    //         ], 500);
    //     }

    // }

    public function updateUser(Request $request)
    {
        try {
            $user = User::where('email', $request->email)->update([
                'password' => Hash::make($request->password),
                'phoneNumber' => $request->phoneNumber,
                'address' => $request->address,
                'roleId' => $request->roleId
            ]);
            if (!$user) {
                return response()->json([
                    'statusCode' => 400,
                    'Message' => 'Cannot update user',
                ], 400);
            } else {
                return response()->json([
                    'statusCode' => 200,
                    'Message' => 'Ok !',
                    'data' => $user
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'Message' => $e->getMessage(),
            ], 500);
        }

    }
    public function deleteUser(Request $request)
    {
        try {
            $user = User::find($request->query('id'));
            if (!$user) {
                return response()->json([
                    'statusCode' => '400',
                    'Message' => 'Cannot find this user in db'
                ], 400);
            } else {
                $user->delete();
                return response()->json([
                    'statusCode' => '200',
                    'Message' => 'Delete successfully'
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'Message' => $e->getMessage(),
            ], 500);
        }

    }


    // LOGIN PART 
    public function login(Request $request)
    {
        try {
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
                'email' => $request->email,
                'password' => $request->password
            ]);
            if (!$isLogin) {
                return redirect()->back()->withErrors(['email' => 'Invalid email or password'])->withInput();
            } else {
                // Check if we not have cart session . Convert session -> DB 
                if ($request->session()->has('cart')) {
                    $sessionProducts = $request->session()->get('cart');
                    foreach ($sessionProducts as $sessionProductId => $sessionQuantity) {
                        // Case user have product in cart before
                        $ExistProductCart = Cart::where('customerId', Auth::user()->id)
                            ->where('productDetailId', $sessionProductId)
                            ->first();
                        if ($ExistProductCart) {
                            $ExistProductCart->quantity += $sessionQuantity['quantity'];
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
                    'statusCode' => 200,
                    'Message' => 'Login successfully',
                    'data' => Auth::user()
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'Message' => $e->getMessage(),
            ], 500);
        }

    }

    public function createNewAddress(Request $request)
    {
        try {
            $user = User::FindByID($request->input('userId'));
            if (!$user) {
                return response()->json([
                    'statusCode' => '400',
                    'Message' => 'Cannot find this user in db'
                ], 400);
            } else {
                $isDefault = 0;
                if ($user->address()->count() == 0) {
                    $isDefault = 1;
                }
                $user->address()->create([
                    'street' => $request->input('street'),
                    'ward' => $request->input('ward'),
                    'city' => $request->input('city'),
                    'state' => $request->input('state'),
                    'receiver' => $request->input('receiver'),
                    'phone' => $request->input('phone'),
                    'userId' => $request->input('userId'),
                    'isDefault' => $isDefault
                ]);
                return response()->json([
                    'statusCode' => '200',
                    'Message' => 'Create successfully'
                ], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'Message' => $e->getMessage(),
            ], 500);
        }
    }
    public function logout(Request $request)
    {
        try {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerate();
            return redirect('/');
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'Message' => $e->getMessage(),
            ], 500);
        }
    }

}
