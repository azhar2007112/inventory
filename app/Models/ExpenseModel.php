<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExpenseModel extends Model
{
    use HasFactory;
    protected $table = 'expense';

    
    static public function getRecord()
    {
        return self::select('expense.*','users.name as created_by_name')
        ->join('users','users.id','=','expense.created_by')
        ->where('expense.is_delete','=',0)
    
        ->orderBy('expense.id','desc')
        ->get();
    }
    static public function getSingle($id){
        return self::find($id);
        }
    
        static public function getRecordActive()
    {
        return self::select('expense.*')
        ->join('users','users.id','=','expense.created_by')
        ->where('expense.is_delete','=',0)
      
    
        ->orderBy('expense.name','asc')
        ->get();
    }
    
    
}
