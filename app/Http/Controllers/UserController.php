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


use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'mail php/PHPMailer-master/src/PHPMailer.php';
require 'mail php/PHPMailer-master/src/SMTP.php';
require 'mail php/PHPMailer-master/src/Exception.php';
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
    public static function deleteAddress(Request $request)
    {
        try {

            $addressId = $request->input('address_id');

            // Find the address
            $address = Address::find($addressId);

            if ($address) {
                // Update the address with the new values from the request
                $address->delete();
                return response()->json([
                    'statusCode' => 200,
                    'Message' => 'Ok !',
                ], 200);
            } else {
                return response()->json([
                    'statusCode' => 404,
                    'Message' => 'Address not found',
                ], 404);
            }

        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'Message' => $e->getMessage(),
            ], 500);
        }
    }
    public static function updateInformation(Request $request)
    {
        try {
            $user = User::where('id', $request->input('userId'))->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
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
    public static function updateAddress(Request $request)
    {
        try {
            $user = User::where('id', $request->input('userId'))->first();
            if (!$user) {
                return response()->json([
                    'statusCode' => 400,
                    'Message' => 'Cannot find user',
                ], 400);
            } else {
                $addressId = $request->input('address_id');

                // Find the address
                $address = $user->address()->find($addressId);

                if ($address) {
                    // Update the address with the new values from the request
                    $address->update($request->all());
                    return response()->json([
                        'statusCode' => 200,
                        'Message' => 'Ok !',
                        'data' => $user
                    ], 200);
                } else {
                    return response()->json([
                        'statusCode' => 404,
                        'Message' => 'Address not found',
                    ], 404);
                }
            }
        } catch (\Exception $e) {
            return response()->json([
                'statusCode' => 500,
                'Message' => $e->getMessage(),
            ], 500);
        }
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
            $user = Auth::user();
            if (!$user) {
                return response()->json([
                    'statusCode' => '400',
                    'Message' => 'Cannot find this user in db'
                ], 400);
            } else {
                if ($user->address()->count() >= 3) {
                    return response()->json([
                        'statusCode' => '400',
                        'Message' => 'Cannot create more than 3 addresses'
                    ], 400);
                }

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
                    'userId' => $user->id,
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
    public function forget(Request $request)
    {
        try {
            $mailUser = $request->email;
            $isExist = User::where('email', $mailUser)->first();
            if (!$isExist) {
                return response()->json([
                    'statusCode' => 400,
                    'Message' => 'Email do not exist',
                ], 400);
            } else {
                $mail = new PHPMailer(true);
                $mail->isSMTP(); // using SMTP protocol
                $mail->Host = 'smtp.gmail.com'; // SMTP host as gmail
                $mail->SMTPAuth = true; // enable SMTP authentication
                $mail->Username = 'hoangtu4520031234@gmail.com'; // sender's email address
                $mail->Password = 'kvos pwet spbo ceea'; // sender's email password
                $mail->SMTPSecure = 'tls'; // for an encrypted connection
                $mail->Port = 587; // port for SMTP
                $mail->setFrom('hoangtu4520031234@gmail.com', 'Sender Name'); // sender's email and name
                $mail->addAddress($mailUser, 'Receiver Name'); // receiver's email and name
                $mail->Subject = 'Reset password';
                $body = "Hello $mailUser ,please follow this link : http://127.0.0.1:8000/ to reset your password";

                $mail->Body = $body;
                $mail->IsHTML(true); // Set email body format as HTML

                $mail->send();
                return response()->json([
                    'statusCode' => 200,
                    'Message' => 'Update password successfully',
                ], 400);
            }
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
    }

}
