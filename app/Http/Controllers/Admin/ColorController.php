<?php

namespace App\Http\Controllers\Admin;
use RealRashid\SweetAlert\Facades\Alert;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ColorModel;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class ColorController extends Controller
{
    public function list()
    { 
        $data['getRecord']=ColorModel::getRecord();
        $data['header_title']='Color';
        return view('admin.color.list',$data);
    }

    public function add()
    {
       
        $data['header_title']='Add New Color';
        return view('admin.color.add',$data);
    }

    public function insert(Request $request)
    {
    
      
        $color = new ColorModel;
        $color->name = trim($request->name);
        $color->code = trim($request->code);
        $color->status =trim($request->status);
      
        $color->created_by=FacadesAuth::user()->id;
        $color->save();
        Alert::success('Success', 'Color successfully created');
        return redirect('admin/color/list');
    }
    public function edit($id)
    {
       $data['getRecord']= ColorModel::getSingle($id);
        $data['header_title']='Edit color';
        return view('admin.color.edit',$data);
    }
    
    public function update($id,Request $request)
    {
    
        request()->validate([
            'slug'=>'required|unique:color,slug,'.$id
        ]);
        $color = ColorModel::getSingle($id);
        $color->name = trim($request->name);
        $color->slug = trim($request->slug);
        $color->status =trim($request->status);
        $color->meta_title =trim($request->meta_title);
        $color->meta_description = trim($request->meta_description);
        $color->meta_keywords = trim($request->meta_keywords);
       
        $color->save();
        Alert::success('Success', 'Color successfully updated');
        return redirect('admin/color/list');
    }
    
    
    public function delete($id)
    {
      
        $color = ColorModel::getSingle($id);
        $color->is_delete = 1;
        $color->save();
    
        Alert::success('Success', 'Color successfully Deletted');
        return redirect('admin/color/list');
    
    }
}
