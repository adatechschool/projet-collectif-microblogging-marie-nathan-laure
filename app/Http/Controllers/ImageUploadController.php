<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Postimage;
/*You've to use the database model name from your App\Models folder at the top of
 your controller page*/


class ImageUploadController extends Controller
{
    //Add image
    public function addImage(){
        return view('add_images');
    }
    
    //Store image
    public function storeImage(Request $request){
        $data= new Postimage();

        if($request->file('image')){
            $file= $request->file('image');
            $filename= date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('image'), $filename);
            $data['image']= $filename;
        }
        print_r($data);
        $data->save();
        return redirect()->route('images.view');
       
    }

    //View image
    public function viewImage(){
        $imageData= Postimage::all();
        return view('view_images', compact('imageData'));
    }
}