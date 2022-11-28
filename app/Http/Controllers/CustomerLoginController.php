<?php

namespace App\Http\Controllers;

use App\Models\Customers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\CustomerController;

class CustomerLoginController extends Controller
{
    public function login()
    {
        return view('Customer.customerLogin');
    }

    public function registration()
    {
        return view('Customer.customerRegister');
    }

    public function newCustomer()
    {
        route('saveCustomer');
    }

    public function editPassword()
    {
        return view('Customer.customerEditPassword');
    }

    public function changePassword(Request $request)
    {
        $request->validate([
            'oldPassword' => 'required',
            'password' => 'required|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword' => 'required',
        ]);

        $id = session()->get('customerLoginID');
        $customer = Customers::where('Customer_ID', '=', $id)->first();
        $updatedCustomer = new Customers();
        if (Hash::check($request->oldPassword, $customer->Customer_Password)) {
            $updatedCustomer->Customer_Password = Hash::make($request->password);
            Customers::where('Customer_ID', '=', $id)->update([
                'Customer_Password' => $updatedCustomer->Customer_Password,
            ]);
            return back()->with('success', 'Password changed successfully!');
        } else {
            return back()->with('fail', 'Password do not match!');
        }
    }

    public function signIn(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        $user = Customers::where('Customer_Username', '=', $request->username)
            ->orWhere('Email', '=', $request->username)
            ->first();

        if ($user) {
            if (Hash::check($request->password, $user->Customer_Password)) {
                $request->session()->put('customerLoginID', $user->Customer_ID);
                $request->session()->put('customerName', $user->Customer_Name);
                return redirect('/');
            } else {
                return back()->with('fail', 'Password do not match!');
            }
        } else {
            return back()->with('fail', 'The username/email is not registered!');
        }
    }

    public function logOut()
    {
        if (session()->has('customerLoginID')) {
            session()->flush();
            return redirect('/');
        }
    }
}
