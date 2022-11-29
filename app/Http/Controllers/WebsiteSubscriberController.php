<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\WebsiteSubscribers;

class WebsiteSubscriberController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
   
     public function subscribe(Request $request)
    {
         $request->validate([
          'subscribe_email' => 'required|email',
        ],[
        'subscribe_email.required' => 'Email is required',
        'subscribe_email.email' => 'Invalid Email Format',
    ]);

        //$data = $request->all();
       
       $find_subs = WebsiteSubscribers::where('email',$request->subscribe_email)->count();
       
       if($find_subs >= 1){
            return response()->json(['success'=> true,'message'=>"This email is already added in subscription list.",'already'=> true,]);
       }
       
        
        $subscriber = new WebsiteSubscribers();
        
        $subscriber->email = $request->subscribe_email;
        $subscriber->is_active = 1;
        $subscriber->save();

       
        if($subscriber){
        return response()->json(['success'=> true,'data'=>$subscriber,"message"=>"Email added successfully in subscription list"]);
        
        } else {
            return response()->json(['error'=> true,'message'=>"Error while adding in subscription list. Please contact website administrator."]);
        }
        #create or update your data here
        
        //unique:users,email,
        

    }
    
}
