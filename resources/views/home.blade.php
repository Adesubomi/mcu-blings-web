@extends('layouts.app')

@section('content')
    <div>
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
                <button class="btn btn-sm btn-outline-primary">
                    <i class="ion-ios-personadd"></i>
                    New Student
                </button>
            </div>
        </div>

        <div class="table-responsive">
            <table>
                <tr>
                    <td></td>
                </tr>
            </table>
        </div>
    </div>
@endsection
