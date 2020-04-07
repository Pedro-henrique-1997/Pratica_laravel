@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
    <h1 class="m-0 text-dark">Saldo</h1>

<ol class="breadcrumb">
    <li><a href="">Dasboard</a> </li>
    <li><a href="">Saldo</a> </li>

</ol>
@stop



@section('content')
    <div class="box">
        <div class="box-header">
            <a href="{{ route('balance.deposit') }}" class="btn btn-primary"><i class="fas fa-arrow-alt-circle-up"></i>Recarregar</a>

            @if($amount > 0)
            <a href="{{ route('balance.withdrawn')}}" class="btn btn-danger"><i class="fab fa-amazon-pay"></i>Sacar</a>
            @endif

            
            <a href="{{ route('balance.transfer')}}" class="btn btn-info">  <i class="fas fa-snowboarding fa-rotate-90"></i>Transferir</a>
            


        </div>
        <div class="box-body">
         @include('admin.includes.alerts')
            <div class="small-box bg-green">
            <div class="inner">
              <h3>{{ number_format($amount, 2, ',', '' )}}</h3>

              
            </div>
            <div class="icon">
              <i class="ion ion-cash"></i>
            </div>
            <a href="#" class="small-box-footer">Historico <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
    </div>
@stop
