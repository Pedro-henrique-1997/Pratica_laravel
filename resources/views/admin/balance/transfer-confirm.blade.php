@extends('adminlte::page')

@section('title', 'AdminLTE')

@section('content_header')
    <h1 class="m-0 text-dark">Confirmar Transferencia</h1>
@stop

<ol class="breadcrumb">
    <li><a href="">Dasboard</a> </li>
    <li><a href="">Saldo</a> </li>
    <li><a href="">Transferir</a> </li>
    <li><a href="">Confirmar</a> </li>


</ol>

@section('content')
<div class="box">
        <div class="box-header">
            <h3>Confirmar Transferência de saldo</h3>
        </div>
        <div class="box-body">
            @include('admin.includes.alerts')

            <p><strong>Recebedor: </strong>{{ $sender->name}}</p>

            <form method="post" action="{{ route('transfer.store') }}">
                {!! csrf_field() !!}

                <input type="hidden" name="sender_id" value="{{$sender->id}}">

                <div class="form-group">
                    <input type="text" name="balance" placeholder="valor:" class="form-control">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-success">Transferir</button>
                </div>
            </form>
        </div>
    </div>
@stop
