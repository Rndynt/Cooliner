@extends('index')

@section('content')

    {!! Form::open(['url'=>'api/pesan/booking', 'class'=>'col-md-12 well', 'align'=>'center']) !!}
    {{--<div>{{ $restoo->id }}</div>--}}
    <input id="" name="resto_id" type="hidden" value="{{ $restoo->id }}">
    <input name="user_id" type="hidden" value="{{ Auth::user()->id }}">
    @foreach($menus as $menu)
        <di>{!! Form::label( $menu->name, $menu->name, ':' ) !!}</di> <br><br>
        <div>{!! Form::text('qty['.$menu->id.']' , null, ['class'=>'col-sm-2']) !!}</div>
    @endforeach

    {!! Form::submit('Pesan', ['class'=>'btn btn-danger form-control']) !!}
    {!! Form::close() !!}





    {{--{!! Form::open(['url'=>'api/test', 'class'=>'col-md-12 well', 'align'=>'center']) !!}--}}
    {{--<input type="text" name="qty[2]">--}}
    {{--<input type="text" name="qty[5]">--}}
    {{--<input type="text" name="qty[1]">--}}
    {{--<input type="text" name="qty[4]">--}}
    {{--{!! Form::submit('Pesan', ['class'=>'btn btn-danger form-control']) !!}--}}
    {{--{!! Form::close() !!}--}}
@endsection
