<?php

namespace App\Http\Controllers\Api;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function store(Request $request)
    {
        try {

            $student = (new User())->createStudent($request);

            $payload = [ 'id' => $student->id ];
            return apiSuccess('New student added', $payload);
        }
        catch (\Exception $exception) {

            return apiFailure($exception, 'Unable to add student, please try again.');
        }
    }

    public function show()
    {

    }

    public function index()
    {
        try {

            $students = (new User)->getStudents();

            return apiSuccess('Students', $students);
        }
        catch (\Exception $exception) {

            return apiFailure($exception, 'Unable to load students, please try again');
        }
    }
}
