@extends('layouts.app')

@section('content')
    <students-list></students-list>
@endsection

@section('scripts')
    <script src="{{ asset('dist/js/students.js') }}"></script>
@endsection
