<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'admin_name',
        'bank_name',
        'rekening_number',
        'bank_personal_name'
    ];
}
