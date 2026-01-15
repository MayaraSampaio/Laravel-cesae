@extends('layouts.fe_master')

@section('content')
@auth
<h5> Olá {{ Auth::user()->name }} </h5>
@endauth

@endsection
