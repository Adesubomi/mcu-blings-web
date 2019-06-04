<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index()
    {
         return view('students_index');
    }

    public function create()
    {
        return view('students_create');
    }

    public function store()
    {

    }
}
