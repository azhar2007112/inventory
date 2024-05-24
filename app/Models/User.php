<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $primaryKey = 'id_user';

    protected $table = 'users';

    protected $guarded = ['id_user'];

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];


    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

 protected function role(): Attribute {
    return new Attribute(
        get: fn($value) => match($value) {
            0 => "user",
            1 => "moderator",
            2 => "admin",
            default => "unknown", // Handle unexpected values gracefully
        },
    );
}

public function sendEmailVerificationNotification()
{
    $this->notify(new \App\Notifications\VerifyEmail);
}

protected function status(): Attribute {
    return new Attribute(
        get: fn($value) => match($value) {
            0 => "Active",
            1 => "Inactive",
           
            default => "unknown", // Handle unexpected values gracefully
        },
    );
}
static public function getSingle($id){
return User::find($id);
}

static public function getAdmin()
{
    return User::select('users.*')
    ->where('role','=',2)
    ->where('is_delete','=',0)

    ->orderBy('id','desc')
    ->get();
}

static function checkEmail($email)
{
    return User::select('users.*')
    ->where('email','=',$email)
   
    ->first();
}


}
