<?php

namespace App\Http\Controllers\Admin;
use App\Models\CategoryModel;
use App\Http\Controllers\Controller;
use RealRashid\SweetAlert\Facades\Alert;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class CategoryController extends Controller
{
    //
    public function list()
    { 
        $data['getRecord']=CategoryModel::getRecord();
        $data['header_title']='Category';
        return view('admin.category.list',$data);
    }
    public function add()
    {
       
        $data['header_title']='Add New Category';
        return view('admin.category.add',$data);
    }

    public function insert(Request $request)
{

    request()->validate([
        'slug'=>'required|unique:category'
    ]);
    $userc = new CategoryModel;
    $userc->name = trim($request->name);
    $userc->slug = trim($request->slug);
    $userc->status =trim($request->status);
    $userc->meta_title =trim($request->meta_title);
    $userc->meta_description = trim($request->meta_description);
    $userc->meta_keywords = trim($request->meta_keywords);
    $userc->created_by=FacadesAuth::user()->id;
    $userc->save();
    Alert::success('Success', 'Category successfully created');
    return redirect('admin/category/list');
}
public function edit($id)
{
   $data['getRecord']= CategoryModel::getSingle($id);
    $data['header_title']='Edit Category';
    return view('admin.category.edit',$data);
}

public function update($id,Request $request)
{

    request()->validate([
        'slug'=>'required|unique:category,slug,'.$id
    ]);
    $userc = CategoryModel::getSingle($id);
    $userc->name = trim($request->name);
    $userc->slug = trim($request->slug);
    $userc->status =trim($request->status);
    $userc->meta_title =trim($request->meta_title);
    $userc->meta_description = trim($request->meta_description);
    $userc->meta_keywords = trim($request->meta_keywords);
   
    $userc->save();
    Alert::success('Success', 'Category successfully updated');
    return redirect('admin/category/list');
}


public function delete($id)
{
  
    $userc = CategoryModel::getSingle($id);
    $userc->is_delete = 1;
    $userc->save();

    Alert::success('Success', 'category successfully Deletted');
    return redirect('admin/category/list');

}

}
