<?php
/**
 * Created by IntelliJ IDEA.
 * User: Superman
 * Date: 8/17/2017
 * Time: 11:14
 */
?>

@extends('layouts.app')



@section('content')
<div class="container">
<div class="row">

    <div class="col-lg-12 margin-tb">

        <div class="pull-left">

            <h2>Edit Template</h2>

        </div>

        <div class="pull-right">

            <br/>

            <a class="btn btn-primary" href="{{ route('templates.index') }}"> <i class="glyphicon glyphicon-arrow-left"></i></a>

        </div>

    </div>

</div>

{!! Form::model($templates, ['method' => 'PATCH','route' => ['templates.update', $templates->id]]) !!}

@include('templates.form')

{!! Form::close() !!}
</div>
@endsection
