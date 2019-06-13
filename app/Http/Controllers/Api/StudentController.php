<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\StudentStoreRequest;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function store(StudentStoreRequest $request)
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

    public function show(Request $request, User $user)
    {
        $studentId = $request->route('student_id');

        try {

            return apiSuccess('Student information', $user->getStudentInfo($studentId));
        }
        catch (\Exception $exception) {

            return apiFailure($exception, 'Student information not found');
        }
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
