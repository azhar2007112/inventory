<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeImageModel extends Model
{
    use HasFactory;
    protected $table = 'employee_image';
    protected $fillable = ['employee_id', 'image_name', 'image_extension', 'order_by'];

    public function employee()
    {
        return $this->belongsTo(EmployeeModel::class);
    }
}
