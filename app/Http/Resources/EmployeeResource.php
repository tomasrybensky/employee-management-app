<?php

namespace App\Http\Resources;

use App\Models\Employee;
use Illuminate\Http\Resources\Json\JsonResource;

class EmployeeResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            Employee::ID => $this->{Employee::ID},
            Employee::NAME => $this->{Employee::NAME},
            Employee::EMAIL => $this->{Employee::EMAIL},
            'department' => new DepartmentResource($this->department),
            'designation' => new DesignationResource($this->designation),
        ];
    }
}
