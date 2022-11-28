<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminLoginController extends Controller
{
    public function login()
    {
        return view('Admin.Auth.login');
    }

    public function registration()
    {
        return view('Admin.Auth.AddAdmin');
    }

    public function newAdmin()
    {
        route('saveAdmin');
    }

    public function signIn(Request $request)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        $user = Admins::where('Admin_Username', '=', $request->username)->first();

        if ($user && $user->Admin_Username === 'admin') {
            if ($request->password === $user->Admin_Password) {
                $request->session()->put('LoginID', $user->Admin_Username);
                $request->session()->put('Name', $user->Admin_Name);
                $request->session()->put('Class', $user->Admin_Class);
                return redirect('listAdmin');
            } else {
                return back()->with('fail', 'Password do not match!');
            }
        }
        if ($user) {
            if (Hash::check($request->password, $user->Admin_Password)) {
                $request->session()->put('LoginID', $user->Admin_Username);
                $request->session()->put('Name', $user->Admin_Name);
                $request->session()->put('Class', $user->Admin_Class);
                if ($user->Admin_Class == 'Manager')
                    return redirect('dashboard');
                else if ($user->Admin_Class == 'Product Operator')
                    return redirect('listProduct');
                else
                    return redirect('listAdmin');
            } else {
                return back()->with('fail', 'Password do not match!');
            }
        } else {
            return back()->with('fail', 'This admin username is not registered!');
        }
    }

    public function logOut()
    {
        if (session()->has('LoginID')) {
            session()->pull('LoginID');
            session()->pull('Name');
            return redirect('loginAdmin');
        }
    }
}
