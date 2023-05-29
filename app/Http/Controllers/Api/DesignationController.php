<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\DesignationResource;
use App\Models\Designation;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;

class DesignationController extends Controller
{
    public function index(): AnonymousResourceCollection
    {
        return DesignationResource::collection(Designation::all());
    }
}
