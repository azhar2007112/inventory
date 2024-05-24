<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;  // Add this line at the top of your file
use Illuminate\Support\Facades\File;
use App\Models\EmployeeModel;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use RealRashid\SweetAlert\Facades\Alert;

class EmployeeController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'salary' => 'required|max:255',
        ]);

        $employee = new EmployeeModel();
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->salary = $request->salary;
        $employee->created_by=FacadesAuth::user()->id;
        // Uploading image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/photos'); // public/uploads/photos
            $image->move($destinationPath, $imageName);
            $employee->image = $imageName;
        }

        $employee->save();

        return redirect()->route('employee.list')->with('success', 'Employee successfully created');
    }

    public function edit($id)
    {
        $data['getRecord']= EmployeeModel::getSingle($id);
        $data['header_title']='Edit Employee Info';
        return view('admin.employee.edit',$data);

       
        
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'salary' => 'required|max:255',
        ]);
    
        $employee = EmployeeModel::find($id);
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->salary = $request->salary;
    
        // Uploading image
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $imageNames = [];
    
            foreach($images as $image) {
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/photos'); // public/uploads/photos
                $image->move($destinationPath, $imageName);
                $employee->image = $imageName;
            }
            
         
        }
    
        $employee->save();
    
        return redirect()->route('employee.list')->with('success', 'Employee successfully updated');
    }
    

    public function delete($id)
    {
        $employee = EmployeeModel::find($id);
        $image_path = public_path().'/uploads/photos/'.$employee->photo;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $employee->delete();

        return redirect()->route('employee.list')->with('success', 'Employee successfully deleted');
    }

    public function list()
    {
        $data['getRecord'] = EmployeeModel::getRecord();
        $data['header_title'] = 'Employee';
        return view('admin.employee.list', $data);
    }
    
    public function add()
    {
       
        $data['header_title']='Add New Employee';
        return view('admin.employee.add',$data);
    }

}
