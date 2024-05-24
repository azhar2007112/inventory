<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $data['header_title']="Dashboard";
        return $data;
    }

    public function userHome(Request $request)
    {
    
        $responseIndex = $this->index($request);
    
    return view('dashboard.dashboard', $responseIndex,["msg"=>"I am a user role"]);
    
    }
    
    
    public function moderatorHome(Request $request)
    {
    
        $responseIndex = $this->index($request);
    
    return view('dashboard.dashboard',$responseIndex,["msg"=>"I am a Moderator role"]);
    
    }
    
    
    
    
    public function adminHome(Request $request)
    {
    
        $responseIndex = $this->index($request);
    
    return view('dashboard.dashboard',$responseIndex,["msg"=>"I am a Admin role"]);
    
    }
    
}
