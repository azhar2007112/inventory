<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Auth;
use App\Models\ContactModel;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use RealRashid\SweetAlert\Facades\Alert;
class AboutController extends Controller
{
    public function AllContact()
{
    $data['getRecord']=ContactModel::getRecord();
    $data['header_title']='Contact';
    return view('admin.contact.list', $data);
}


  
    public function add()
    {
       
        $data['header_title']='Add New Contact';
        return view('admin.contact.add',$data);
    }

    public function insert(Request $request)
    {
    
       
        $contact = new ContactModel;
        $contact->name = trim($request->name);
        $contact->phone = trim($request->phone);
        $contact->email = trim($request->email);
        $contact->status =trim($request->status);
      
        $contact->description = trim($request->description);
  
        $contact->created_by=FacadesAuth::user()->id;
        $contact->save();
        Alert::success('Success', 'Contact successfully created');
        return redirect('admin/contact/list');
    }
    public function edit($id)
    {
       $data['getRecord']= ContactModel::getSingle($id);
        $data['header_title']='Edit Contact';
        return view('admin.contact.edit',$data);
    }


    public function update($id,Request $request)
    {
        $contact = ContactModel::getSingle($id);
        $contact->name = trim($request->name);
        $contact->phone = trim($request->phone);
        $contact->email = trim($request->email);
        $contact->status =trim($request->status);
      
        $contact->description = trim($request->description);
  
        $contact->created_by=FacadesAuth::user()->id;
        $contact->save();
        Alert::success('Success', 'Contact successfully updated');
        return redirect('admin/contact/list');
    
       
    }
    
    
    public function delete($id)
    {
      
        $contact = ContactModel::getSingle($id);
        $contact->is_delete = 1;
        $contact->save();
    
        Alert::success('Success', 'Contact successfully Deletted');
        return redirect('admin/contact/list');
    
    }

}
