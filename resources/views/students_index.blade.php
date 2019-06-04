@extends('layouts.app')

@section('content')
    <div class="border-bottom">
        <div class="row align-items-baseline">
            <div class="col">
                <h2 class="m-0 p-0">
                    Students
                </h2>
                <h5 class="text-muted">Manage list of all students in school</h5>
            </div>
            <div class="col-auto">
                <span class="text-muted">Filter by:</span>
            </div>
            <div class="col-auto">
                <div class="filters">
                    <select name="filter-students" id="" class="form-control form-control-sm">
                        @for ($i=1; $i<=6; $i++)
                        <option value="{{$i}}">{{$i}}00 Level</option>
                        @endfor
                    </select>
                </div>
            </div>
            <div class="col-auto">
                <a class="btn btn-sm btn-outline-primary" href="{{ route('students.create') }}">
                    <i class="ion-ios-personadd"></i>
                    New Student
                </a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-sm table-striped">
            <thead>
            <tr>
                <th>Matric No.</th>
                <th>Name</th>
                <th>Level</th>
            </tr>
            </thead>
            <tr>
                <td></td>
                <td></td>
                <td></td>
            </tr>
        </table>
    </div>
@endsection
