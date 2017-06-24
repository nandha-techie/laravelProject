<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use Redirect;
use Image;
use App\ImageUpload;

class BfController extends Controller
{
    public function getTest(){
    	return view('admin.dashbord');
    }

    public function getLogout(){
    	Auth::logout();
    	return view('auth.login');
    }
    public function getOrder(){
        $productList = ImageUpload::paginate(5);
    	return view('admin.order.index', compact('productList'));
    }
    public function getAdd(){
        return view('admin.order.add');
    }
    public function postAdd(Request $request){
        $rules = [ 'image'       => 'required',
                   'price'       => 'required',
                   'categories'  => 'required',
                  ];         
        $data = $request->all();
        $validator = Validator::make($data, $rules);
        if ($validator->fails()) {
            return Redirect::back()->withInput()->withErrors($validator);
        }
        // $image = $request->file('image');
        $image_file = $request->file('image');
        $timestamp = time();
        $image = $image_file->getClientOriginalName();
        $image_file_name = pathinfo($image, PATHINFO_FILENAME);
        $image_extension = pathinfo($image, PATHINFO_EXTENSION);
        $fname = $image_file_name . '_' . $timestamp . "." . $image_extension;
        $img_path = "uploads/image/";
        $image_file->move("uploads/image", $fname);
        ImageUpload::create(['price' => $data['price'], 'categories' => $data['categories'], 
                'big_img' => $img_path . $fname,
            ]);
        return Redirect('admin/bf/order')->with('message', 'successfully inserted');
    }

    public function getEdit($id){
        $product = ImageUpload::find($id);
        return view('admin.order.edit', compact('product'));
    }

    public function postEdit(Request $request){
        $data = $request->all();
        $product = ImageUpload::find($data['id']);
        if($request->hasFile('updateImage')){
            $image_file = $request->file('updateImage');
            $timestamp = time();
            $image = $image_file->getClientOriginalName();
            $image_file_name = pathinfo($image, PATHINFO_FILENAME);
            $image_extension = pathinfo($image, PATHINFO_EXTENSION);
            $fname = $image_file_name . '_' . $timestamp . "." . $image_extension;
            $img_path = "uploads/image/";
            $image_file->move("uploads/image", $fname);
            $product->update(['price' => $data['price'], 'categories' => $data['categories'], 
                    'big_img' => $img_path . $fname,
                ]);
        }else {   
            $product->update(['price' => $data['price'], 'categories' => $data['categories'], ]);
        }
        $productList = ImageUpload::all();
        return view('admin.order.index', compact('productList'));
    }

    public function getDelete($id){
        $product = ImageUpload::find($id);
        $product->delete();
        $product = ImageUpload::all();
        return view('admin.order.index', compact('productList'));
    }
}
