@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Fazer retirada</h1>
@stop

<ol class="breadcrumb">
    <li><a href="">Dasboard</a> </li>
    <li><a href="">Saldo</a> </li>
    <li><a href="">Retirada</a> </li>

</ol>

@section('content')
<div class="box">
        <div class="box-header">
            
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')
            <form method="post" action="{{ route('withdrawn.store') }}">
                {!! csrf_field() !!}

                <div class="form-group">
                    <input type="text" name="value"placeholder="Valor retirado" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Sacar</button>
                </div>
            </form>
        </div>
    </div>
@stop
