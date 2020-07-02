<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class BolloController extends Controller
{

    public function AddCategory(){
        return view('post/addcategory');
    }

    public function StoreCategory(Request $request){

        $validatedData = $request->validate([
            'name' => ['required', 'unique:categories', 'max:255','min:4'],
            'slug' => ['required', 'unique:categories', 'max:255','min:4'],
        ]);
       
        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->insert($data);
        if($category){
            $notification=array(
                'messege'=>'Successfully Category Inserted',
                'alart-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification=array(
                'messege'=>'Something Went Wrong',
                'alart-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }
    }

    public function AllCategory(){
        $category=DB::table('categories')->get();
        return view('post/all_category',compact('category'));
    }

    public function ViewCategory($id){
        $category=DB::table('categories')->where('id',$id)->first();
        return view('post/categoryview',compact('category'));
    }

    public function DeleteCategory($id){
        $category=DB::table('categories')->where('id',$id)->delete();
        $notification=array(
            'messege'=>'Successfully Category Deleted',
            'alart-type'=>'success'
        );
        return Redirect()->back()->with($notification);

    }

    public function EditCategory($id){
        $category=DB::table('categories')->where('id',$id)->first();
        return view('post/editcategory',compact('category'));
    }

    public function UpdateCategory(Request $request,$id){
        $validatedData = $request->validate([
            'name' => ['required', 'max:255','min:4'],
            'slug' => ['required', 'max:255','min:4'],
        ]);
       
        $data=array();
        $data['name']=$request->name;
        $data['slug']=$request->slug;
        $category=DB::table('categories')->where('id',$id)->update($data);
        if($category){
            $notification=array(
                'messege'=>'Successfully Category Updated',
                'alart-type'=>'success'
            );
            return Redirect()->back()->with($notification);
        }else{
            $notification=array(
                'messege'=>'Something to updated',
                'alart-type'=>'success'
            );
            return Redirect()->route('all.category')->with($notification);
        } 
    }
}
