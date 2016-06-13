@extends('index')

@section('content')

    {!! Form::model($resto, ['method' => 'PATCH', 'action' => ['RestoController@update_data', $resto->id]]) !!}

    <div class="col-sm-7">
        @include('dataresto.form')
        {!! Form::submit('Update Data', ['class'=>'btn btn-danger form-control']) !!}
    </div>
    {{--@include('dataresto.form', ['submitButtonText'=>'Update Data'])--}}
    {!! Form::close() !!}

    @include('errors.list')
@stop