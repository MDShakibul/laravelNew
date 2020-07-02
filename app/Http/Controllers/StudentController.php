<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Student;

class StudentController extends Controller
{
   
    public function index()
    {
        $student=Student::all();
        return view('student/index',compact('student'));
    }

  
    public function create()
    {
        return view('student/create');
    }

   
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => ['required', 'max:25','min:4'],
            'phone' => ['required', 'unique:students', 'max:12','min:9'],
            'email' => ['required', 'unique:students'],
        ]);

        $student = new Student;
        $student->name= $request->name;
        $student->email= $request->email;
        $student->phone= $request->phone;

        $student->save();
        $notification=array(
            'messege'=>'Successfully Done',
            'alart-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    }

    
    public function show($id)
    {
        $student = Student::findorfail($id);
        return view('student/viewstudent',compact('student'));
    }

 
    public function edit($id)
    {
        $student=Student::findorfail($id);
        return view('student/editstudent',compact('student'));
    }

    
    public function update(Request $request, $id)
    {
        $student=Student::findorfail($id);
        $student->name= $request->name;
        $student->email= $request->email;
        $student->phone= $request->phone;

        $student->save();
        $notification=array(
            'messege'=>'Successfully Done',
            'alart-type'=>'success'
        );
        return Redirect()->to('student')->with($notification);
    }


    public function destroy($id)
    {
        $student = Student::findorfail($id);
        $student->delete();
        $notification=array(
            'messege'=>'Successfully Deleted',
            'alart-type'=>'success'
        );
        return Redirect()->back()->with($notification);
    
    }
}
