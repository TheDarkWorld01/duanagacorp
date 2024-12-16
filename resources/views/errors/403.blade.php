@extends('layouts.app')

@section('content')
<div class="container text-center">
    <h1>403 - Forbidden</h1>
    <p>Sorry, you do not have permission to access this page.</p>
    <a href="{{ url('/home') }}" class="btn btn-primary">Return to Home</a>
</div>
@endsection
