<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreEmployeeRequest;
use App\Http\Resources\EmployeeResource;
use App\Models\Employee;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class EmployeeController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return EmployeeResource::collection(Employee::all());
    }

    public function store(StoreEmployeeRequest $request): EmployeeResource
    {
        $employee = Employee::create($request->validated());
        return new EmployeeResource($employee);
    }

    public function update(
        Employee $employee,
        StoreEmployeeRequest $request
    ): EmployeeResource
    {
        $employee->update($request->validated());
        return new EmployeeResource($employee);
    }

    public function delete(Employee $employee): JsonResponse
    {
        $employee->delete();
        return response()->json();
    }
}
