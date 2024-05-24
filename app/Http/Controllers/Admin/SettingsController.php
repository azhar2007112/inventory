<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\SettingsModel;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;


class SettingsController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'company_name' => 'max:255',
            'company_address' => 'max:255',
            'company_email' => 'email|max:255',
            'company_phone' => 'max:255',
            'company_mobile' => 'max:255',
            'company_city' => 'max:255',
            'company_country' => 'max:255',
            'company_zipcode' => 'max:255',
            'company_logo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
           
        ]);

        $setting = new SettingsModel(); // Assuming you have a SettingsModel
    $setting->company_name = $request->company_name;
    $setting->company_address = $request->company_address;
    $setting->company_email = $request->company_email;
    $setting->company_phone = $request->company_phone;
    $setting->company_mobile = $request->company_mobile;
    $setting->company_city = $request->company_city;
    $setting->company_country = $request->company_country;
    $setting->company_zipcode = $request->company_zipcode;

        // Uploading image
        if ($request->hasFile('company_logo')) {
            $image = $request->file('company_logo');
            $imageName = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/uploads/logos'); // public/uploads/photos
            $image->move($destinationPath, $imageName);
            $setting->company_logo = $imageName;
        }

        $setting->save();

        return redirect()->route('settings.list');
    }

   
    

  
    public function list()
    {
        $data['getRecord'] = SettingsModel::getRecord();
    $data['header_title'] = 'Settings';
    return view('admin.settings.list', $data);
    }
    
    public function add()
    {
       
        $data['header_title'] = 'Update Settings'; // Since typically there would be only one setting record
        return view('admin.settings.add', $data); 
    }
}
