<?php

namespace App\Http\Controllers\Admin;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function list()
    { $data['getRecord']=User::getAdmin();
        $data['header_title']='Admin';
        return view('admin.list',$data);
    }

    public function add()
    {
       
        $data['header_title']='Add New Admin';
        return view('admin.add',$data);
    }

public function insert(Request $request)
{

    request()->validate([
        'email'=>'required|email|unique:users'
    ]);
    $user = new User;
    $user->name = $request->name;
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->status = $request->status;
    $user->role=2;
    $user->save();
    Alert::success('Success', 'admin successfully created');
    return redirect('admin/list');
}


public function edit($id)
{
   $data['getRecord']= User::getSingle($id);
    $data['header_title']='Edit Admin';
    return view('admin.edit',$data);
}
public function update($id,Request $request)
{
    request()->validate([
        'email'=>'required|email|unique:users,email,'.$id
    ]);
    $user = User::getSingle($id);
    $user->name = $request->name;
    $user->email = $request->email;
   
   if(!empty($request->password)){
    $user->password = Hash::make($request->password);}
    $user->status = $request->status;
    $user->role=2;
    $user->save();
    Alert::success('Success', 'admin successfully Updated');
    return redirect('admin/list');
}



public function delete($id)
{
  
    $user = User::getSingle($id);
    $user->is_delete = 1;
    $user->save();

    Alert::success('Success', 'admin successfully Deletted');
    return redirect('admin/list');

}
}
