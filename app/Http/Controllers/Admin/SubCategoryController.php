<?php

namespace App\Http\Controllers\Admin;
use App\Models\SubCategoryModel;
use App\Models\CategoryModel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class SubCategoryController extends Controller
{
    //
    public function list()
    { 
        $data['getRecord']=SubCategoryModel::getRecord();
        $data['header_title']='Sub Category';
        return view('admin.subcategory.list',$data);
    }
    public function add()
    {
        $data['getCategory']=CategoryModel::getRecord();
        $data['header_title']='Add New Sub Category';
        return view('admin.subcategory.add',$data);
    }


    public function insert(Request $request)
    {
    
        request()->validate([
            'slug'=>'required|unique:sub_category'
        ]);
        $usercs = new SubCategoryModel;
        $usercs->category_id = trim($request->category_id);
        $usercs->name = trim($request->name);
        $usercs->slug = trim($request->slug);
        $usercs->status =trim($request->status);
        $usercs->meta_title =trim($request->meta_title);
        $usercs->meta_description = trim($request->meta_description);
        $usercs->meta_keywords = trim($request->meta_keywords);
        $usercs->created_by=Auth::user()->id;
        $usercs->save();
        Alert::success('Success', 'Sub Category successfully created');
        return redirect('admin/subcategory/list');
    }
    public function edit($id)
{
    $data['getCategory']=CategoryModel::getRecord();
   $data['getRecord']= SubCategoryModel::getSingle($id);
    $data['header_title']='Edit Sub Category';
    return view('admin.subcategory.edit',$data);
}
public function update($id,Request $request)
    {
    
        request()->validate([
            'slug'=>'required|unique:sub_category,slug,'.$id
        ]);
        $usercs =  SubCategoryModel::getSingle($id);
        $usercs->category_id = trim($request->category_id);
        $usercs->name = trim($request->name);
        $usercs->slug = trim($request->slug);
        $usercs->status =trim($request->status);
        $usercs->meta_title =trim($request->meta_title);
        $usercs->meta_description = trim($request->meta_description);
        $usercs->meta_keywords = trim($request->meta_keywords);
       
        $usercs->save();
        Alert::success('Success', 'Sub Category successfully updated');
        return redirect('admin/subcategory/list');
    }
    public function delete($id)
{
  
    $userc = SubCategoryModel::getSingle($id);
    $userc->is_delete = 1;
    $userc->save();

    Alert::success('Success', 'Sub category successfully Deleted');
    return redirect('admin/subcategory/list');

}
public function get_sub_category(Request $request)
{
   
    $category_id = $request->id;
    $get_sub_category=SubCategoryModel::getRecordSubCategory($category_id);
    $html='';
    $html.='<option value="">Select</option>';
    foreach($get_sub_category as $value)
    {
        $html .= '<option value="'.$value->id.'">'.$value->name.'</option>';
    }
    $json['html']=$html;
    echo json_encode($json);
   
}
}
