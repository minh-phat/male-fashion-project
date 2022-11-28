<?php

namespace App\Http\Controllers;

use App\Models\Admins;
use App\Models\Products;
use App\Models\Categories;
use Illuminate\Http\Request;
use App\Models\Order_details;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\DBAL\TimestampType;

//Another test

class AdminController extends Controller
{
    public function dashboard()
    {
        /* $categoryCount = Products::select("count (Category_ID) as categoryCount")->get(); */
        $categories = Categories::get()/* ->union($categoryCount)->get() */;
        $products = Products::join('Categories', 'Categories.Category_ID', '=', 'Products.Category_ID')->get();
        $order_details = Order_details::join('Products', 'Products.Product_ID', '=', 'Order_details.Product_ID')->get();
        return view('Admin.Dashboard', compact('products', 'categories', 'order_details'));
    }

    public function index()
    {
        $data = Admins::get();
        return view('Admin.Admins.list', compact('data'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'username' => 'required|unique:admins,Admin_Username',
            'name' => 'required',
            'password' => 'required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required'
        ]);

        $admin = new Admins();

        $admin->Admin_Username = $request->username;
        $admin->Admin_Password = Hash::make($request->password);
        $admin->Admin_Class = $request->class;
        $admin->Admin_Name = $request->name;
        $admin->save();

        return redirect()->back()->with('success', 'Admin added successfully!');
    }

    public function edit($id)
    {
        $data = Admins::where('Admin_Username', '=', $id)->first();
        return view('Admin.Admins.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'password' => 'required_with:confirm_password|same:confirm_password',
            'confirm_password' => 'required'
        ]);

        $username = $request->username;
        $admin = new Admins();
        if ($username !== 'admin') {
            $admin->Admin_Password = Hash::make($request->password);
        } else {
            $admin->Admin_Password = $request->password;
        }
        $admin->Admin_Name = $request->name;
        $admin->Admin_Class = $request->class;

        Admins::where('Admin_Username', '=', $username)->update([
            'Admin_Password' => $admin->Admin_Password,
            'Admin_Name' => $admin->Admin_Name,
            'Admin_Class' => $admin->Admin_Class
        ]);
        return redirect()->back()->with('success', 'Admin updated successfully!');
    }

    public function delete($id)
    {
        if ($id !== 'admin') {
            Admins::where('Admin_Username', '=', $id)->delete();
            return redirect()->back()->with('success', 'Admin deleted successfully');
        } else {
            return redirect()->back()->with('fail', 'cannot delete the default admin account');
        }
    }

    public function search()
    {
        // Get search keyword and search methods from form
        $search = $_GET['search'];
        $searchMethod = $_GET['searchType'];

        // If search keyword is empty then return to default page
        if ($search === "") {
            $data = Admins::get();
            return view('Admin.Admins.list', compact('data'));
        } else {
            // If search method is not chosen then implement simple search
            if ($searchMethod == "none") {
                $name = Admins::where('Admin_Name', 'LIKE', '%' . $search . '%')->get();            //query search for likeliness in the admin_name column
                $username = Admins::where('Admin_Username', 'LIKE', '%' . $search . '%')->get();    //query search for likeliness in the admin_username column
                $data = $username->union($name);                                                    //combine results
                if ($data->count() !== 0) {
                    return view('Admin.Admins.list')                                            //
                        ->with('data', $data)                                                   // return successful search data
                        ->with('notify', 'Showing search results for "' . $search . '".');      //
                } else {
                    $data = Admins::get();                                                      //
                    return view('Admin.Admins.list')->with('data', $data)                       //return with empty search data.
                        ->with('fail', 'No result found for "' . $search . '".');               //
                }
                // Search by username
            } else if ($searchMethod == "username") {
                $username = Admins::where('Admin_Username', 'LIKE', '%' . $search . '%')->get();
                if ($username->count() !== 0) {
                    return view('Admin.Admins.list')
                        ->with('data', $username)
                        ->with('notify', 'Showing search results for "' . $search . '".');
                } else {
                    $data = Admins::get();
                    return view('Admin.Admins.list')->with('data', $data)
                        ->with('fail', 'No result found for "' . $search . '".');
                }
                // Search by name
            } else if ($searchMethod == "name") {
                $name = Admins::where('Admin_Name', 'LIKE', '%' . $search . '%')->get();
                if ($name->count() !== 0) {
                    return view('Admin.Admins.list')
                        ->with('data', $name)
                        ->with('notify', 'Showing search results for "' . $search . '".');
                } else {
                    $data = Admins::get();
                    return view('Admin.Admins.list')->with('data', $data)
                        ->with('fail', 'No result found for "' . $search . '".');
                }
                // Search by class
            } else {
                $class = Admins::where('Admin_Class', '=', $search)->get();
                if ($class->count() !== 0) {
                    return view('Admin.Admins.list')
                        ->with('data', $class)
                        ->with('notify', 'Showing search results for "' . $search . '".');
                } else {
                    $data = Admins::get();
                    return view('Admin.Admins.list')->with('data', $data)
                        ->with('fail', 'No result found for "' . $search . '".');
                }
            }
        }
    }
}
