@extends('layouts.form')
@section('content')
    <students-create action="{{ route('students.store') }}"></students-create>
@endsection

@section('scripts')
    <script src="{{ asset('dist/js/students.js') }}"></script>
@endsection
