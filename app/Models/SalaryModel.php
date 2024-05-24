<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SalaryModel extends Model
{
    use HasFactory;
    protected $table = 'salaries';

static public function getRecord()
{
    return self::select('salaries.*','users.name as created_by_name')
    
    ->where('salaries.is_delete','=',0)

    ->orderBy('salaries.id','asc')
    ->get();
}

static public function getRecordActive()
{
    return self::select('salaries.*')
   
    ->where('salaries.is_delete','=',0)
    ->where('salaries.status','=',0)
    ->orderBy('salaries.name','asc')
    ->get();
}


static public function getRecordMenu()
{
    return self::select('salaries.*')
  
    ->where('salaries.is_delete','=',0)
    ->where('salaries.status','=',0)
    
    ->get();
}



static public function getSingle($id){
    return self::find($id);
    }

   
}
