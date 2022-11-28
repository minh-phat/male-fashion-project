<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use App\Models\Products;
use Illuminate\Http\Request;
use Dflydev\DotAccessData\Data;
use Exception;
use Illuminate\Database\DBAL\TimestampType;
use Illuminate\Support\Facades\File;
use Intervention\Image\ImageManagerStatic as Image;

class CategoryController extends Controller
{
    public function index()
    {
        $data = Categories::get();
        return view('Admin.Category.list', compact('data'));
    }

    public function add()
    {
        return view('Admin.Category.add');
    }

    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,Category_Name|max:50',
            'image' => 'required'
        ]);

        $category = new Categories();

        $filename = Date('usiHd') . $request->image->getClientOriginalName(); //move uploaded image to category folder then save the name
        $resize = Image::make($request->image->getRealPath());
        $resize->resize(210, 210);
        $resize->save('img/categories/' . $filename);   //save resized image

        $category->Category_Name = $request->name;
        $category->Category_Image = $filename;
        $category->save();

        return redirect()->back()->with('success', 'Category added successfully!');
    }

    public function edit($id)
    {
        $data = Categories::where('Category_ID', '=', $id)->first();
        return view('Admin.Category.edit', compact('data'));
    }

    public function update(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:categories,Category_Name|max:50'
        ]);
        $id = $request->id;
        $data = Categories::where('Category_ID', '=', $id)->first();
        
        if(!empty($request->image)){
            $file = $data->Category_Image;
            $path = public_path('img/categories/' . $file);
            if (File::exists($path) && $path !== 'img/categories/') {
                File::delete($path);
            }

            $filename = Date('usiHd') . $request->image->getClientOriginalName(); //move uploaded image to category folder then save the name
            $request->image->move(public_path('\img\categories'), $filename);
        }else{
            $filename = $data->Category_Image;
        }
        
        Categories::where('Category_ID', '=', $id)->update([
            'Category_Name' => $request->name,
            'Category_Image' => $filename
        ]);
        return redirect()->back()->with('success', 'Category updated successfully!');
    }

    public function delete($id)
    {
        $check = Products::where('Category_ID', '=', $id)->first();
        if (!$check) {
            $data = Categories::where('Category_ID', '=', $id)->first();
            $path = public_path('img/categories/' . $data->Category_Image);
            File::delete($path);
            Categories::where('Category_ID', '=', $id)->delete();
            return redirect()->back()->with('success', 'Category deleted successfully');
        } else {
            return redirect()->back()->with('fail', 'Cannot delete category, maybe try and delete all related products first.');
        }
    }

    public function search()
    {
        $search = $_GET['search'];
        if ($search === "") {                                           //
            $data = Categories::get();                                  //return with message if search field is empty
            return view('Admin.Category.list', compact('data'));        //
        } else {
            $name = Categories::where('Category_Name', 'LIKE', '%' . $search . '%')->get();            //query search for likeliness in the category_name column
            $data = $name;
            if ($data->count() !== 0) {
                return view('Admin.Category.list')                                          //
                    ->with('data', $data)                                                   // return successful search data
                    ->with('notify', 'Showing search results for "' . $search . '".');      //
            } else {
                $data = Categories::get();                                                  //
                return view('Admin.Category.list')->with('data', $data)                     //return with empty search data.
                    ->with('fail', 'No result found for "' . $search . '".');               //
            }
        }
    }
}
