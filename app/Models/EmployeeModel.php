<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeModel extends Model
{
    use HasFactory;
    protected $table = 'employee';
    protected $fillable = ['name', 'address', 'phone', 'photo', 'salary'];

  

    static public function getRecord()
{
    return self::select('employee.*','users.name as created_by_name')
    ->join('users','users.id','=','employee.created_by')
    ->where('employee.is_delete','=',0)

    ->orderBy('employee.id','desc')
    ->paginate(1);
}
static public function getSingle($id){
    return self::find($id);
    }




   
}
