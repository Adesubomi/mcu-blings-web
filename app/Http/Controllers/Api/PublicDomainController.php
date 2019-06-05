<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PublicDomainController extends Controller
{
    public function collegesPlus()
    {
        return apiSuccess('List of Colleges', [
            'colleges' => config('app.colleges'),
            'last_matric_number' => (new User())->getLastMatricNumber(),
        ]);
    }
}
