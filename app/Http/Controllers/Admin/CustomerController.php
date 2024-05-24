<?php

namespace App\Http\Controllers\Admin;
use App\Models\CustomerModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\File;
use RealRashid\SweetAlert\Facades\Alert;



class CustomerController extends Controller
{
    //
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'shopname' => 'required|max:255',
            'account_holder' => 'required|max:255',
            'account_number' => 'required|max:255',
            'bank_name' => 'required|max:255',
            'bank_branch' => 'required|max:255',
            'city' => 'required|max:255',
        ]);

        $employee = new CustomerModel();
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
        $employee->shopname = $request->shopname;
        $employee->account_holder = $request->account_holder;
        $employee->account_number = $request->account_number;
        $employee->bank_name = $request->bank_name;
        $employee->bank_branch = $request->bank_branch;
        $employee->city = $request->city;
        $employee->created_by=FacadesAuth::user()->id;
        // Uploading image
        if ($request->hasFile('photo')) {
            $image = $request->file('photo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/photos'); // public/uploads/photos
            $image->move($destinationPath, $imageName);
            $employee->photo = $imageName;
        }

        $employee->save();

        return redirect()->route('customer.list')->with('success', 'Customer successfully created');
    }

    public function edit($id)
    {
        $data['getRecord']= CustomerModel::getSingle($id);
        $data['header_title']='Edit customer Info';
        return view('admin.customer.edit',$data);

       
        
    }

    public function update(Request $request, $id)
    {
        $validateData = $request->validate([
            'name' => 'required|max:255',
            'address' => 'required|max:255',
            'phone' => 'required|max:255',
            'image.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
            'shopname' => 'required|max:255',
            'account_holder' => 'required|max:255',
            'account_number' => 'required|max:255',
            'bank_name' => 'required|max:255',
            'bank_branch' => 'required|max:255',
            'city' => 'required|max:255',

        ]);
    
        $employee = CustomerModel::find($id);
        $employee->name = $request->name;
        $employee->phone = $request->phone;
        $employee->address = $request->address;
      
        $employee->shopname = $request->shopname;
        $employee->account_holder = $request->account_holder;
        $employee->account_number = $request->account_number;
        $employee->bank_name = $request->bank_name;
        $employee->bank_branch = $request->bank_branch;
        $employee->city = $request->city;
        // Uploading image
        if ($request->hasFile('image')) {
            $images = $request->file('image');
            $imageNames = [];
    
            foreach($images as $image) {
                $imageName = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/photos'); // public/uploads/photos
                $image->move($destinationPath, $imageName);
                $employee->photo = $imageName;
            }
            
         
        }
    
        $employee->save();
    
        return redirect()->route('customer.list')->with('success', 'Customer successfully updated');
    }
    

    public function delete($id)
    {
        $employee = CustomerModel::find($id);
        $image_path = public_path().'/uploads/photos/'.$employee->photo;
        if(File::exists($image_path)) {
            File::delete($image_path);
        }
        $employee->delete();

        return redirect()->route('customer.list')->with('success', 'customer successfully deleted');
    }

    public function list()
    {
        $data['getRecord'] = CustomerModel::getRecord();
        $data['header_title'] = 'customer';
        return view('admin.customer.list', $data);
    }
    
    public function add()
    {
       
        $data['header_title']='Add New customer';
        return view('admin.customer.add',$data);
    }

}
