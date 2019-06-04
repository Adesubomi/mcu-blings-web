@extends('layouts.form')

@section('content')
    <div class="border-bottom">
        <div class="row align-items-baseline">
            <div class="col-auto">
                <a href="{{ route('students.index') }}" class="btn btn-outline-secondary">
                    <i class="ion-chevron-left"></i>
                </a>
            </div>
            <div class="col">
                <h2 class="m-0 p-0">
                    New Students
                </h2>
                <h5 class="text-muted">Create a new student record for {{ config('app.name') }}</h5>
            </div>
        </div>
    </div>

    <students-create action="{{ route('students.store') }}"></students-create>
@endsection

@section('scripts')
    <script src="{{ asset('dist/js/students_create.js') }}"></script>
@endsection
