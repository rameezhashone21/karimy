<?php

namespace App\Http\Controllers\Api\Auth;

use DB;
use Mail; 
use App\Role;
use App\Plan;
use App\User;
use App\Subscription;
use App\UserVerify;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Session;

class AuthenticationController
{
  
      public function register(Request $request)
      {
        $data = $request->all();
        
        $validate = $this->validateRegisterationRequest($request->all());
            if($validate->fails()) return response()->json([
                'success'   => false,
                'error'     => $validate->errors(),
                'message'   => 'Invalid input, please check the errors.'
            ], 422);

            // dd($request);

        // $request['role'] = "3";
        
        // Media

        // if ($request->hasFile('profile_photo')) {
        //   // Save image to folder
        //   $loc = '/public/user_profile_photos';
        //   $fileData = $request->file('profile_photo');
        //   $fileNameToStore = $this->uploadImage($fileData, $loc);
        // } else {
        //   $fileNameToStore = 'no_img.jpg';
        // }


        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->role_id = Role::USER_ROLE_ID;
        $user->user_suspended = User::USER_NOT_SUSPENDED;
        $user->save();

        $free_plan = Plan::where('plan_type', Plan::PLAN_TYPE_FREE)->first();

        $user_subscription = new Subscription;
        $user_subscription->user_id = $user->id;
        $user_subscription->plan_id =  $free_plan->id;
        $user_subscription->subscription_start_date = Carbon::now()->toDateString();
        $user_subscription->save();

        $token = Str::random(64);

        $verifyuser = new UserVerify;
        $verifyuser->user_id = $user->id;
        $verifyuser->token = $token;
        $verifyuser->save();


        $url=URL::to('https://localhost:8000/api/v1/auth/account/verify/'.$token);
        

        $hello = Mail::send('email.userregistered', ['url' => $url, 'name' => $request->name,'email' => $request->email], function($message) use($request){
          $message->to($request->email);
          $message->subject('New User Registered');
        });

        if (Mail::failures()) {
            return response(['status' => '0', 'message' => 'User did not register'], 404);
        } else {
            return response(["result" => $user, 'status' => '1', 'message' => 'User Registration Successfully Completed'], 201);

        }
        
      }

      protected function validateRegisterationRequest($data) {
          $validate = Validator::make($data, [
              'name'    => 'required|string|max:255',
              'email'         => 'required|string|email|max:255|unique:users',
              'password'      => 'required'
          ]);

          return $validate;
      }

      public function login(Request $request)
      {
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
          // Get authenticated user
          $user = Auth::user();
         
          // create token
          $token =  $user->createToken('MyApp')->accessToken;

          $result = new stdClass;
          $result->user = $user;
          $result->token = $token;

          return response()->json([
            'result' => $result,
            'message' => 'Logged In Successfully',
            'status'  => 1
          ], 200);
        } else {
          return response()->json([
            'message' => 'Incorrect login details',
            'status'  => 0
          ], 200);
        }
      }

      public function verifyAccount($token)
      {
          $verifyUser = UserVerify::where('token', $token)->first();
    
          $message = 'Sorry your email cannot be identified.';
    
          if(!is_null($verifyUser) ){
              $user = $verifyUser->user;
                
              if(!$user->email_verified_at) {
                  $verifyUser->user->email_verified_at = Carbon::now();
                  $verifyUser->user->save();
                  $message = "Your e-mail is verified. You can now login.";
              } else {
                  $message = "Your e-mail is already verified. You can now login.";
              }
          }
    
          return response()->json([
            'result' => $verifyUser->user,
            'status' => 1,
            'message' => $message,
          ], 200);

      }
      
}
