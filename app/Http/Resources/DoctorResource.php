<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class DoctorResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "id_hospital" => $this->getHospital->name,
            "name" => $this->name,
            "spesialis" => $this->poli,
            "lulusan" => $this->lulusan,
            "no_str" => $this->no_str,
            "image" => $this->image,
        ];
    }
}
