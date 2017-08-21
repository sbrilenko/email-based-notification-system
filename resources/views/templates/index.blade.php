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

            <h2>Templates CRUD</h2>

        </div>

    </div>

</div>

@if ($message = Session::get('success'))

    <div class="alert alert-success">

        <p>{{ $message }}</p>

    </div>

@endif
<a class="btn btn-primary" href="{{ route('home') }}"> <i class="glyphicon glyphicon-arrow-left"></i></a>
<table class="table table-bordered">

    <tr>

        <th width="80px">No</th>

        <th>Name</th>

        <th>Subject</th>

        <th width="140px" class="text-center">Template</th>

    </tr>

@foreach ($templates as $templ)

<tr>

    <td>{{ ++$i }}</td>

    <td>{{ $templ->name }}</td>
    <td>{{ $templ->subject }}</td>

    <td>{{ $templ->template }}</td>

    <td>

        <a class="btn btn-primary btn-sm" href="{{ route('templates.edit',$templ->id) }}"><i class="glyphicon glyphicon-pencil"></i></a>
        {!! Form::close() !!}

    </td>

</tr>

@endforeach

</table>

{!! $templates->render() !!}
</div>
@endsection