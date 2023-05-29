<?php

namespace App\Http\Resources;

use App\Models\Designation;
use Illuminate\Http\Resources\Json\JsonResource;

class DesignationResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            Designation::ID => $this->{Designation::ID},
            Designation::NAME => $this->{Designation::NAME},
        ];
    }
}
