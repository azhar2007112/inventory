<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Mail\RegisterMail;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function index()
    {

        return view('auth.login', [
            'title' => 'Login',
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->all();
    $this->validate($request,[
            'email' => 'required',
            'password' => 'required'
          //  'is_delete' => 'required'
        ]);


        // User::where('email', $credentials);

        if (auth::attempt(['email'=>$credentials["email"],'password'=>$credentials["password"],'is_delete'=> 0]) && auth()->user()->status == 'Active' ) {
            // $request->Session()->regenerate();
if(auth()->user()->role === 'admin' )
       {     Alert::success('Success', 'Login admin success !');
        return redirect()->route('home.admin'); 
       }

   else    if(auth()->user()->role === 'moderator'
   )
       {     Alert::success('Success', 'Login moderator success !');
        return redirect()->route('home.moderator'); 
       }

   else   
       {     Alert::success('Success', 'Login user success !');
            return redirect()->route('home');
       }

 } 
 
 else
  {
            Alert::error('Error', 'Please enter correct email/password!');
            return redirect('/login');
   }
    }

    public function register()
    {
        return view('auth.register', [
            'title' => 'Register',
        ]);
    }

    // public function process(Request $request)
    // {
    //     $validated = $request->validate([
    //         'name' => 'required',
    //         'email' => 'required|unique:users',
    //         'password' => 'required',
    //         'passwordConfirm' => 'required|same:password'
    //     ]);

    //     $validated['password'] = Hash::make($request['password']);

    //     $user = User::create($validated);

    //     Alert::success('Success', 'Register user has been successfully !');
    //     return redirect('/login');
    // }

   

    public function logout(Request $request)
    {
        Auth::logout();

        request()->session()->invalidate();
        request()->session()->regenerateToken();
        Alert::success('Success', 'Log out success !');
        return redirect('login');
    }

public function process(Request $request)
{
     $request->validate([
        'name' => 'required',
        'email' => 'required|unique:users',
        'password' => 'required',
        'passwordConfirm' => 'required|same:password'
    ]);

   $save=new User;
   $save->name=trim($request->name);
   $save->email=trim($request->email);
   $save->password=hash::make($request->password);
   $save->passwordConfirm=hash::make($request->passwordConfirm);
   $save->remember_token=Str::random(40);
   $save->save();
    Mail::to($save->email)->send(new RegisterMail($save));
    Alert::success('Success', 'Register user has been successfully !');
    return redirect('login')->with('success',"Your account register successfully and verify your email");
}





public function verify($token)
{
    $userc = User::where ('remember_token',$token)->first();
    if(!empty($userc))
    {
$userc->email_verified_at = date('Y-m-d H:i:s');
$userc->remember_token=Str::random(40);
$userc->save();
Alert::success('Success', 'Your account verified successfully');
return redirect('/')->with('success','Your account verified successfully');

    }
    else
    {
        return redirect()->back()->with('error','Error!');

    }
}

public function forgot_password(Request $request)
{
    $data['meta_title']="Forgot Password";
    return view('auth.forgot',$data);
}

public function auth_forgot_password(Request $request)
{
    $user = User::where ('email','=',$request->email)->first();
    if(!empty($user))
    {

$user->remember_token=Str::random(40);
$user->save();
Mail::to($user->email)->send(new ForgotPasswordMail($user));
Alert::success('Success', 'Please check your email and reset your password');
return redirect()->back();

    }
    else
    {
        Alert::error('Error', 'Email not Found !');
        return redirect()->back();

    }
}


public function reset($token)
{
    $user = User::where ('remember_token','=',$token)->first();
    if(!empty($user))
    {

$data['user']=$user;
 $data['meta_title']="Reset Password";
// $user->save();


return view('auth.reset',$data);

    }
    else
    {
        abort(404);

    }
}


public function auth_reset($token,Request $request)
{
    
    if($request->password == $request->passwordConfirm)
    {
        $user = User::where ('remember_token','=',$token)->first();
        $user->password=Hash::make($request->password);
        $user->remember_token=Str::random(40);
        $user->save();


Alert::success('Success', 'Password Successfully Reset');
return redirect('/login');

    }
    else
    {
        Alert::error('Error', 'Password and Confirm password does not match');
        return redirect()->back()->with('success','Password and Confirm password does not match');

    }
}


}



