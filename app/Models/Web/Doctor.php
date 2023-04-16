<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Web\Hospital;


class Doctor extends Model
{
    use HasFactory;

    protected $table = "doctor";
    protected $guarded = [''];
    public $timestamps = false;

    public function getHospital()
    {
        return $this->belongsTo(Hospital::class, "id");
    }
}
