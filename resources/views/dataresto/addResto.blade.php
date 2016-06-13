@extends('index')

@section('content')
    {{--<div class="container">--}}
        <h2>Tambah Data Resto</h2>
        <hr/>

        {!! Form::open(['url'=>'resto/tambah-data', 'class'=>'col-md-4 well', 'align'=>'center']) !!}

        @include('dataresto.form')
        {!! Form::submit('Tambah Data', ['class'=>'btn btn-danger form-control']) !!}
        {!! Form::close() !!}

        @include('errors.list')
    {{--</div>--}}
@stop