<?php

namespace App\Http\Controllers;

use App\Models\EmployeeModel;
use App\Models\ProductImageModel;
use App\Models\ProductModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
   public function home()
   {

   $data['getEmp'] = EmployeeModel::all();
   $data['getProduct'] = ProductModel::all();
   $data['getProductImage'] = ProductImageModel::all();
    return view('home',$data);
   }
}
