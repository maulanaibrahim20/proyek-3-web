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
        return $this->belongsTo("App\Models\Web\Hospital", "id_hospital", "id");
    }

    public function getSpesialis()
    {
        return $this->belongsTo("App\Models\Web\Spesialis", "id", "id");
    }
}
