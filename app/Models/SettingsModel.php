<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingsModel extends Model
{
    use HasFactory;
    protected $table = 'settings';
    protected $fillable = [
        'company_name', 'company_address', 'company_email', 'company_phone',
        'company_mobile', 'company_city', 'company_country', 'company_zipcode', 'company_logo'
    ];

  

    static public function getRecord()
{
    return self::select('settings.*','users.name as created_by_name')
   
 

    ->orderBy('settings.id','desc')
    ->paginate(3);
}
static public function getSingle($id){
    return self::find($id);
    }

}
