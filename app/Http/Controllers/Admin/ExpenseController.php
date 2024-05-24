<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ExpenseModel;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use RealRashid\SweetAlert\Facades\Alert;



class ExpenseController extends Controller
{
    public function list()
    { 
        $data['getRecord']=ExpenseModel::getRecord();
        $data['header_title']='Expense';
        return view('admin.expense.list',$data);
    }

    public function add()
    {
       
        $data['header_title']='Add New Expense';
        return view('admin.expense.add',$data);
    }

    public function insert(Request $request)
    {
    
      
        $brand = new ExpenseModel;
        $brand->detail = trim($request->detail);
        $brand->amount = trim($request->amount);
        $brand->date =trim($request->date);
       
       
        $brand->created_by=FacadesAuth::user()->id;
        $brand->save();
      
        return redirect('admin/expense/list');
    }
    public function edit($id)
    {
       $data['getRecord']= ExpenseModel::getSingle($id);
        $data['header_title']='Edit expense';
        return view('admin.expense.edit',$data);
    }
    
    public function update($id,Request $request)
    {
    
       
        $brand = ExpenseModel::getSingle($id);
        $brand->detail = trim($request->detail);
        $brand->amount = trim($request->amount);
        $brand->date =trim($request->date);
       
       
        $brand->save();
     
        return redirect('admin/expense/list');
    }
    
    
    public function delete($id)
    {
      
        $brand = ExpenseModel::getSingle($id);
        $brand->is_delete = 1;
        $brand->save();
    
        return redirect('admin/expense/list');
    
    }


    public function search(Request $request)
    {
        $startDate = $request->start_date;
        $endDate = $request->end_date;
    
        $query = ExpenseModel::query();
    
        if ($startDate && $endDate) {
            $query->whereDate('date', '>=', $startDate)
                  ->whereDate('date', '<=', $endDate);
        }
    
        $data['getRecord'] = $query->get();
        $data['total'] = $query->sum('amount');
        $data['searchPerformed'] = true;  
        return view('admin.expense.list', $data);
    }
    
    



}
