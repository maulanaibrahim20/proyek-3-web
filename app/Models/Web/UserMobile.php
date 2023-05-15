<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMobile extends Model
{
    use HasFactory;
    protected $table = "user_mobile";
    protected $guarded = [''];
}
