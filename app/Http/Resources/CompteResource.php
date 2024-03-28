<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CompteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
        "id"=> $this->id,
        "Banque"=>$this->Banque,
        "Compte"=> $this->Compte,
        "Ville"=> $this->Ville,
        "nomsocietes"=>$this->nomsocietes
        ];
    }
}
