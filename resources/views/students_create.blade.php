@extends('layouts.form')
@section('content')
    <students-create></students-create>
@endsection

@section('scripts')
    <script src="{{ asset('dist/js/students.js') }}"></script>
@endsection
