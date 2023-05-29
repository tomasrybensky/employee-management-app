<?php

namespace App\Http\Resources;

use App\Models\Department;
use Illuminate\Http\Resources\Json\JsonResource;

class DepartmentResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            Department::ID => $this->{Department::ID},
            Department::NAME => $this->{Department::NAME},
        ];
    }
}
