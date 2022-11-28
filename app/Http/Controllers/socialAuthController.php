<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class socialAuthController extends Controller
{
    public function googleRedirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function googleCallback()
    {
        $Customer = Socialite::driver('google')->user();
        return $this->createOrUpdateUser($Customer);
    }

    public function createOrUpdateUser($data)
    {
        $name = explode('.', $data->email);
        $data->username = $name[0];
        //split email before '@' into username
        $Customer = Customers::where('Email', '=', $data->email)->where('Customer_Username', '=', $data->username)->first();
        //query customer for matching email or username with the google account

        if (!$Customer) {

            $customer = new Customers();

            $customer->Customer_Username = $data->username;
            $customer->Customer_Name = $data->name;
            $customer->Email = $data->email;
            $customer->Customer_Password = Hash::make('EmptyPasswordForGoogleAccount'); //default password LMAO

            $customer->save();  //register

            $Customer = Customers::where('Email', '=', $data->email)->first();

            session()->put('customerLoginID', $Customer->Customer_ID);
            session()->put('customerName', $Customer->Customer_Name);   //Log in user
            session()->put('loggedWith', 'google');

            return redirect('/');

        } elseif (
            $data->username === $Customer->Customer_Username &&
            $data->name === $Customer->Customer_Name &&         //check for all fields being the same
            $data->email === $Customer->Email
        ) {
            session()->put('customerLoginID', $Customer->Customer_ID);
            session()->put('customerName', $Customer->Customer_Name);   //putting user into session - Log in user
            session()->put('loggedWith', 'google');
            return redirect('/');
        } else {
            return redirect()->view('Customer.customerLogin')->with('fail', 'There is an registered with the same Email or Username');
        }
    }
}
