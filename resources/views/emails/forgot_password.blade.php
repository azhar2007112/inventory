@component('mail::message')
   <p>Hello{{$user->name}}</p> 
<p>We understand it happens. </p>

@component('mail::button',['url'=>url('reset/'.$user->remember_token)])
Reset Your Password
    
@endcomponent
<p>IN case you have issues please contact out contact us.</p>
Thanks, <br/>
{{config('app.name')}}
@endcomponent
