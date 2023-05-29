<?php

namespace App\Http\Requests\Api;

use App\Models\Employee;
use Illuminate\Foundation\Http\FormRequest;

class StoreEmployeeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            Employee::EMAIL => 'required|email|max:255',
            Employee::NAME => 'required|string|max:255',
            Employee::DEPARTMENT_ID => 'required|exists:departments,id',
            Employee::DESIGNATION_ID => 'required|exists:designations,id',
        ];
    }
}
