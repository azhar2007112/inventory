<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SalaryModel;
use RealRashid\SweetAlert\Facades\Alert;



use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SalaryController extends Controller
{
    public function list()
    { 
        $data=DB::table('salaries')
        ->join('employee','salaries.emp_id','employee.id')
        ->select('salaries.*','employee.name','employee.salary','employee.image')
        ->orderBy('id','asc')
        ->get();
       $dat['header_title']='Salary List';
        return view('admin.salary.list',compact('data'),$dat);
    }
    public function add()
    {
       
        $data['header_title']='Pay Salary';
        return view('admin.salary.add',$data);
    }

    public function insert(Request $request)
{


    $month=$request->month;
    $emp_id=$request->emp_id;


    $salary=DB::table('salaries')
    ->where('month',$month)
    ->where('emp_id',$emp_id)
    ->first();



    if($salary == NULL)
    {
   
        $salary = new SalaryModel;
        $salary->emp_id = trim($request->emp_id);
    $salary->month = trim($request->month);
    $salary->advanced_salary =trim($request->advanced_salary);
    $salary->year =trim($request->year);
   
    $salary->save();
   
   if($salary)
   {
    Alert::success('Success', 'salary paid');
    return redirect('admin/salary/list');
   }
   else{
    Alert::error('error', 'error');
    return redirect('admin/salary/add');
   }
   
    }
    else{
        Alert::error('error', 'salary already paid in this month');
        return redirect('admin/salary/add');
       }

    
}

}
