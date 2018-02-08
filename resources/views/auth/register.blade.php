@extends('layouts.master')
@section('pageTitle', 'Register')

@section('content')
<paw-planner-register plans="{{ $plans->toJson() }}"></paw-planner-register>
@stop