<?php

namespace App\Http\Controllers;

use App\Models\Products;
use App\Models\Categories;
use GrahamCampbell\ResultType\Success;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class ProductController extends Controller
{
    public function index()
    {
        $data = Products::join('Categories', 'Categories.Category_ID', '=', 'Products.Category_ID')->get();
        return view('Admin.Products.list', compact('data'));
    }

    public function add()
    {
        $data = Categories::get();
        return view('Admin.Products.add', compact('data'));
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|integer',
            'details' => 'required',
            'images' => 'required',
            'size' => 'required',
            'available' => 'required',
        ]);

        $product = new Products();
        $imgArr = [];
        $sizeArr = [];

        foreach ($request->images as $file) {
            $filename = Date('usiHd') . $file->getClientOriginalName(); //change the .temp name to its original name. Avoiding collision upto microsecond
            $resize = Image::make($file->getRealPath());
            $resize->resize(210, 210);
            $resize->save('img/products/' . $filename); //move to path with filename, took absolutely forever
            array_push($imgArr, $filename);
        }

        foreach ($request->size as $size) {
            array_push($sizeArr, $size);
        }

        $product->Product_Name = $request->name;
        $product->Category_ID = $request->category;
        $product->Price = $request->price;
        $product->Details = $request->details;
        $product->Images = implode("@@@", $imgArr);
        $product->Size = implode(" ", $sizeArr);
        $product->Available = $request->available;
        $product->save();

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function edit($id)
    {
        $data = Products::where('Product_ID', '=', $id)->first();
        $category = Categories::get();
        return view('Admin.Products.edit', compact('data', 'category'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'category' => 'required',
            'price' => 'required|integer',
            'details' => 'required',
            'size' => 'required',
            'available' => 'required',
        ]);

        $id = $request->id;

        $data = Products::where('Product_ID', '=', $id)->first();

        //image processing
        if (!empty($request->images)) {
            $oldImages = [];                                                  //
            $oldImages = explode("@@@", $data->Images);                       //
            foreach ($oldImages as $file) {                                   //
                $path = public_path('img/products/' . $file);                 //Remove old images
                if (File::exists($path) && $path !== 'img/products/') {       //
                    File::delete($path);                                      //
                }                                                             //
            }
            $imgArr = [];                                                     //
            foreach ($request->images as $file) {                             //
                $filename = Date('usiHd') . $file->getClientOriginalName();   //
                $resize = Image::make($file->getRealPath());                  //Add new
                $resize->resize(210, 210);                                    //
                $resize->save('img/products/' . $filename);                   //
                array_push($imgArr, $filename);                               //
            }
            $images = implode("@@@", $imgArr);
        } else {
            $images = $data->Images;    //uses old data if request for images is empty(user didn't add anything)
        }
        //

        //size processing
        $sizeArr = [];
        foreach ($request->size as $size) {
            array_push($sizeArr, $size);
        }
        $sizes = implode(" ", $sizeArr);
        //

        Products::where('Product_ID', '=', $id)->update([   //
            'Product_Name' => $request->name,               //
            'Category_ID' => $request->category,            //
            'Price' => $request->price,                     //
            'Details' => $request->details,                 //Updating information on database              
            'Images' => $images,                            //
            'Size' => $sizes,                               //
            'Available' => $request->available,             //
        ]);
        return redirect()->back()->with('success', 'Product updated successfully!');
    }

    public function delete($id)
    {
        $data = Products::where('Product_ID', '=', $id)->first();
        $imgArr = explode("@@@", $data->Images);
        foreach ($imgArr as $image) {
            $path = public_path('img/products/' . $image);
            File::delete($path);
        }
        Products::where('Product_ID', '=', $id)->delete();  //Delete images before deleting the stored names of the images in DB
        return redirect()->back()->with('success', 'Product deleted successfully');
    }

    public function search()
    {
        // Get search keyword and search methods from form
        $search = $_GET['search'];
        $searchMethod = $_GET['searchType'];

        // If search keyword is empty then return to default page
        if ($search === "") {
            $data = Products::join('Categories', 'Categories.Category_ID', '=', 'Products.Category_ID')->get();
            //return with message if search field is empty
            return view('Admin.Products.list', compact('data'));
        } else {
            // If search method is not chosen then implement simple search
            if ($searchMethod == "none") {
                $product = Products::join('Categories', 'Categories.Category_ID', '=', 'Products.Category_ID')
                    ->where('Product_Name', 'LIKE', '%' . $search . '%')->get();
                //query search for likeliness in the product name column
                $category = Products::join('Categories', 'Categories.Category_ID', '=', 'Products.Category_ID')
                    ->where('Category_Name', '=', $search)->get();
                //query search for likeliness in the category name column
                $data = $category->union($product);
                if ($data->count() !== 0) {
                    return view('Admin.Products.list')                                          //
                        ->with('data', $data)                                                   // return successful search data
                        ->with('notify', 'Showing search results for "' . $search . '".');      //
                } else {
                    $data = Products::join('Categories', 'Categories.Category_ID', '=', 'Products.Category_ID')->get();     //
                    return view('Admin.Products.list', compact('data'))                                                     //return with empty search data.
                        ->with('fail', 'No result found for "' . $search . '".');                                           //
                }
                // Search by product name
            } else if ($searchMethod == "product") {
                $product = Products::join('Categories', 'Categories.Category_ID', '=', 'Products.Category_ID')
                    ->where('Product_Name', 'LIKE', '%' . $search . '%')->get();
                if ($product->count() !== 0) {
                    return view('Admin.Customer.list')
                        ->with('data', $product)
                        ->with('notify', 'Showing search results for "' . $search . '".');
                } else {
                    $data = Products::join('Categories', 'Categories.Category_ID', '=', 'Products.Category_ID')->get();
                    return view('Admin.Products.list', compact('data'))
                        ->with('fail', 'No result found for "' . $search . '".');
                }
                // Search by category name
            } else if ($searchMethod == "category") {
                $category = Products::join('Categories', 'Categories.Category_ID', '=', 'Products.Category_ID')
                    ->where('Category_Name', 'LIKE', '%' . $search . '%')->get();
                if ($category->count() !== 0) {
                    return view('Admin.Customer.list')
                        ->with('data', $category)
                        ->with('notify', 'Showing search results for "' . $search . '".');
                } else {
                    $data = Products::join('Categories', 'Categories.Category_ID', '=', 'Products.Category_ID')->get();
                    return view('Admin.Products.list', compact('data'))
                        ->with('fail', 'No result found for "' . $search . '".');
                }
            }
        }
    }
}
