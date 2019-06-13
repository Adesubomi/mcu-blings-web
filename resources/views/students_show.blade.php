@extends('layouts.app')

@section('content')
    <students-show :student-id="'{{ request()->route('student_id') }}'"></students-show>
@endsection

@section('scripts')
    <script src="{{ asset('dist/js/students.js') }}"></script>
@endsection
