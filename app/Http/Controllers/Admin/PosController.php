<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PosController extends Controller
{
    public function list()
    {
        
    $data['header_title'] = 'Pos';
    return view('admin.pos.list', $data);
    }
    
}
