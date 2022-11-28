<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Customers;
use App\Models\Categories;
use App\Models\Orders;
use Illuminate\Http\Request;
use Dflydev\DotAccessData\Data;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\ProductController;

use App\Models\Order_details;
use Illuminate\Database\DBAL\TimestampType;

class CustomerController extends Controller
{

    //!View customers on admin page
    public function index()
    {
        $data = Customers::get();
        return view('Admin.Customer.list', compact('data'));
    }
    //!

    public function profile()
    {
        $customer = session()->get('customerLoginID');
        $data = Customers::where('Customer_ID', '=', $customer)->first();
        $categories = Categories::get();
        return view('Customer.profile', compact('data', 'categories'));
    }

    //handle show order cart page
    public function orderCart()
    {
        session()->forget('OrderIDArray');  //destroy only one session     
        $_SESSION['OrderIDArray'] = array();
        
        $CustomerID = session()->get('customerLoginID');

        $OrderID = Orders::where('Customer_ID', '=', $CustomerID)->get();
        
        
        $OrderDetailsIDDistinct = Order_Details::distinct()->get('Order_ID'); // take unique vulue base on Ỏder_ID

            foreach ($OrderID as $Order) {
                
                
                $OrderIDGet = $Order->Order_ID;
                
                $OrderDetails = Order_details::where('Order_ID', $OrderIDGet)->get();  
                
                // $OrderDetailsDuplicate = Order_details::all();
                // $usersUnique = $OrderDetailsDuplicate->unique(['Order_ID']);
                // $userDuplicates = $OrderDetailsDuplicate->diff($usersUnique);
                //$userDuplicates = array();

                // $userDuplicates->toArray();
                // dd($userDuplicates);die;      
                        // $results = Order_details::whereIn('Order_ID', function ( $query ) {
                        //     $query->select('Order_Details_ID')->from('order_details')->groupBy('Order_ID')->havingRaw('count(*) > 1');
                        // })->get(); 
                        // dd($results); die;
                            // if()
                foreach ($OrderDetails as $OrderDetailsRow){

                    $Product = Products::where('Product_ID', '=' , $OrderDetailsRow['Product_ID'])->get();
                    

                    foreach($Product as $Product){
                        $OrderIDArray = collect([
                            "OrderID" => $OrderDetailsRow['Order_ID'],
                            "name" => $Product ['Product_Name'],
                            "img" => $Product['Images'],
                            "size" => $OrderDetailsRow['Size'],
                            "price" =>$Product['Price'],
                            "quantity" =>$OrderDetailsRow['Quantity'],
                        ]);
                    }
                    session()->push('OrderIDArray', $OrderIDArray);                 
                    //$value = session()->get('OrderIDArray');        
                }
            
            }
            //check value of session
            //dd($value); die;    
            $categories = Categories::get();
        return view('Navigate.orderCart', compact('categories','OrderDetailsIDDistinct'));          
    }

    public function save(Request $request)
    {
        $request->validate([
            'userName' => 'required|unique:Customers,Customer_Username',
            'name' => 'required',
            'password' => 'required|required_with:confirmPassword|same:confirmPassword',
            'confirmPassword' => 'required',
            'email' => 'required|unique:Customers',
            'phone' => 'required|digits:10',
            'address' => 'required',
            'gender' => 'required',
            'DoB' => 'required'
        ]);

        $customers = new Customers();

        $customers->Customer_Username = $request->userName;
        $customers->Customer_Password = Hash::make($request->password);
        $customers->Customer_Name = $request->name;
        $customers->Email = $request->email;
        $customers->Phone = $request->phone;
        $customers->Address = $request->address;
        $customers->Gender = $request->gender;
        $customers->Date_of_Birth = $request->DoB;

        $customers->save();

        return redirect()->back()->with('success', 'Customers added successfully!');
    }

    public function delete($id)
    {
        if ($id) {
            Customers::where('Customer_Username', '=', $id)->delete();
            return redirect()->back()->with('success', 'Customer deleted successfully');
        } else {
            return redirect()->back()->with('fail', 'Failed to delete customer, maybe because none was selected?');
        }
    }

    public function edit()
    {
        $id = session()->get('customerLoginID');
        $data = Customers::where('Customer_ID', '=', $id)->first();
        return view('Customer.customerEditInfo', compact('data'));
    }

    public function update(Request $request)
    {
        $id = session()->get('customerLoginID');
        $data = Customers::where('Customer_ID', '=', $id)->first();
        $request->validate([
            'name' => 'required',
            'password' => 'required',
            'phone' => 'required|digits:10',
            'address' => 'required',
            'gender' => 'required',
            'DoB' => 'required'
        ]);

        if (Hash::check($request->password, $data->Customer_Password)) {
            $customers = new Customers();

            $customers->Customer_Name = $request->name;
            $customers->Phone = $request->phone;
            $customers->Address = $request->address;
            $customers->Gender = $request->gender;
            $customers->Date_of_Birth = $request->DoB;

            Customers::where('Customer_ID', '=', $id)->update([
                'Customer_Name' => $customers->Customer_Name,
                'Phone' => $customers->Phone,
                'Address' => $customers->Address,
                'Gender' => $customers->Gender,
                'Date_of_Birth' => $customers->Date_of_Birth,
            ]);
            return redirect()->back()->with('success', 'Customer updated successfully!');
        } else {
            return redirect()->back()->with('fail', 'The password do not match!');
        }
    }

    public function search()
    {
        // Get search keyword and search methods from form
        $search = $_GET['search'];
        $searchMethod = $_GET['searchType'];

        // If search keyword is empty then return to default page
        if ($search === "") {
            $data = Customers::get();
            return view('Admin.Customer.list', compact('data'));
        } else {
            // If search method is not chosen then implement simple search
            if ($searchMethod == "none") {
                $name = Customers::where('Customer_Name', 'LIKE', '%' . $search . '%')->get();            //query search for likeliness in the admin_name column
                $username = Customers::where('Customer_Username', 'LIKE', '%' . $search . '%')->get();    //query search for likeliness in the admin_username column
                $data = $username->union($name);                                                          //combine results
                if ($data->count() !== 0) {
                    return view('Admin.Customer.list')                                          //
                        ->with('data', $data)                                                   // return successful search data
                        ->with('notify', 'Showing search results for "' . $search . '".');      //
                } else {
                    $data = Customers::get();                                                   //
                    return view('Admin.Customer.list')->with('data', $data)                     //return with empty search data.
                        ->with('fail', 'No result found for "' . $search . '".');               //
                }
                // Search by username
            } else if ($searchMethod == "username") {
                $username = Customers::where('Customer_Username', 'LIKE', '%' . $search . '%')->get();
                if ($username->count() !== 0) {
                    return view('Admin.Customer.list')
                        ->with('data', $username)
                        ->with('notify', 'Showing search results for "' . $search . '".');
                } else {
                    $data = Customers::get();
                    return view('Admin.Customer.list')->with('data', $data)
                        ->with('fail', 'No result found for "' . $search . '".');
                }
                // Search by name
            } else if ($searchMethod == "name") {
                $name = Customers::where('Customer_Name', 'LIKE', '%' . $search . '%')->get();
                if ($name->count() !== 0) {
                    return view('Admin.Customer.list')
                        ->with('data', $name)
                        ->with('notify', 'Showing search results for "' . $search . '".');
                } else {
                    $data = Customers::get();
                    return view('Admin.Customer.list')->with('data', $data)
                        ->with('fail', 'No result found for "' . $search . '".');
                }
                // Search by email
            } else if ($searchMethod == "email") {
                $email = Customers::where('Email', 'LIKE', '%' . $search . '%')->get();
                if ($email->count() !== 0) {
                    return view('Admin.Customer.list')
                        ->with('data', $email)
                        ->with('notify', 'Showing search results for "' . $search . '".');
                } else {
                    $data = Customers::get();
                    return view('Admin.Customer.list')->with('data', $data)
                        ->with('fail', 'No result found for "' . $search . '".');
                }
                // Search by phone
            } else if ($searchMethod == "phone") {
                $phone = Customers::where('Phone', 'LIKE', '%' . $search . '%')->get();
                if ($phone->count() !== 0) {
                    return view('Admin.Customer.list')
                        ->with('data', $phone)
                        ->with('notify', 'Showing search results for "' . $search . '".');
                } else {
                    $data = Customers::get();
                    return view('Admin.Customer.list')->with('data', $data)
                        ->with('fail', 'No result found for "' . $search . '".');
                }
                // Search by address
            } else if ($searchMethod == "address") {
                $address = Customers::where('Address', 'LIKE', '%' . $search . '%')->get();
                if ($address->count() !== 0) {
                    return view('Admin.Customer.list')
                        ->with('data', $address)
                        ->with('notify', 'Showing search results for "' . $search . '".');
                } else {
                    $data = Customers::get();
                    return view('Admin.Customer.list')->with('data', $data)
                        ->with('fail', 'No result found for "' . $search . '".');
                }
                // Search by gender
            } else if ($searchMethod == "gender") {
                $gender = Customers::where('Gender', '=', $search)->get();
                if ($gender->count() !== 0) {
                    return view('Admin.Customer.list')
                        ->with('data', $gender)
                        ->with('notify', 'Showing search results for "' . $search . '".');
                } else {
                    $data = Customers::get();
                    return view('Admin.Customer.list')->with('data', $data)
                        ->with('fail', 'No result found for "' . $search . '".');
                }
                // Search by date of birth
            } else {
                $dob = Customers::where('Date_of_Birth', 'LIKE', '%' . $search . '%')->get();
                if ($dob->count() !== 0) {
                    return view('Admin.Customer.list')
                        ->with('data', $dob)
                        ->with('notify', 'Showing search results for "' . $search . '".');
                } else {
                    $data = Customers::get();
                    return view('Admin.Customer.list')->with('data', $data)
                        ->with('fail', 'No result found for "' . $search . '".');
                }
            }
        }
    }

    //!customer navigation controllers from this point on

    public function homepage()
    {
        $categories = Categories::get();
        $categoriesF = Categories::inRandomOrder()->limit(6)->get(); //asking to get only 6 categories randomly for featured
        return view('Navigate.home', compact('categoriesF', 'categories'));
    }

    public function shop()
    {
        $categories = Categories::get(); //take database Categories into $categories
        $products = Products::where('Available', '>', 0)->get();
        return view('Navigate.shop', compact('categories'), compact('products'));
    }

    public function about()
    {
        $categories = Categories::get();
        $data = Products::get();
        return view('Navigate.about', compact('data', 'categories'));
    }

    public function contact()
    {
        $categories = Categories::get();
        return view('Navigate.contact', compact('categories'));
    }

    public function shopSingle($id)
    {
        $categories = Categories::get();
        $data = Products::join('Categories', 'Categories.Category_ID', '=', 'Products.Category_ID')
            ->where('Product_ID', '=', $id)->first();

        $CategoryRelateID = $data->Category_ID;
        $ProductRelate = Products::where('Category_ID', '=', $CategoryRelateID)
            ->Where('Product_ID', '!=', $id)
            ->limit(3)
            ->get(); //take a few data    
        if (count($ProductRelate) < 3) {  //add filler for nicer page
            $fillerCount = 3 - count($ProductRelate);
            $filler = Products::where('Product_ID', '!=', $id)
                ->Where('Category_ID', '!=', $data->Category_ID)
                ->inRandomOrder()
                ->limit($fillerCount)
                ->get();
            $new = $ProductRelate->toBase()->merge($filler); //toBase is not mentioned once anywhere in the merging of two query results, thus taking much more time that it should have, i do regret doing these additional QoL function at times.

            $ProductRelate = $new;
        }

        $image = Products::where('Product_ID', '=', $id)->first();
        return view('Navigate.shopSingle', compact('data', 'categories', 'image', 'CategoryRelateID', 'ProductRelate'));
    }

    public function cart()
    {
        $categories = Categories::get();
        $data = Products::get();
        return view('Navigate.cart', compact('data', 'categories'));
    }

    public function shopCategory($id)
    {
        $categories = Categories::get(); //take database Categories into $categories
        $products = Products::where('Category_ID', '=', $id)->get();
        return view('Navigate.shop', compact('categories', 'products'));
    }

    public function shopSearch()
    {
        $categories = Categories::get();
        $search = $_GET['search'];
        if ($search === "") {
            return redirect()->back();
        } else {
            $product = Products::join('Categories', 'Categories.Category_ID', '=', 'Products.Category_ID')
                ->where('Product_Name', 'LIKE', '%' . $search . '%')->where('Available', '>', 0)->get();
            //query search for likeliness in the product_name column
            $price = Products::join('Categories', 'Categories.Category_ID', '=', 'Products.Category_ID')
                ->where('Price', '=', $search)->get();
            //query search for likeliness in the price column
            $products = $price->union($product);
            if ($products->count() !== 0) {
                return view('Navigate.shop', compact('categories'), compact('products'));
            } else {
                return redirect()->back();
            }
        }
    }
}
