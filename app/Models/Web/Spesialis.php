<?php

namespace App\Models\Web;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spesialis extends Model
{
    use HasFactory;
    protected $table = "spesialis";
    protected $guarded = [''];

    public function getDoctor()
    {
        return $this->hasMany(Doctor::class, "id_spesialis", "id");
    }
}
