<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerModel extends Model
{
    use HasFactory;
    protected $table = 'customer';
    protected $fillable = ['name','email', 'phone','address', 'shopname', 'photo', 'account_holder','account_number','bank_name','bank_branch','city'];


  

    static public function getRecord()
{
    return self::select('customer.*','users.name as created_by_name')
    ->join('users','users.id','=','customer.created_by')
    ->where('customer.is_delete','=',0)

    ->orderBy('customer.id','desc')
    ->paginate(1);
}
static public function getSingle($id){
    return self::find($id);
    }
}
