{!! Form::open(['url'=>'api/test', 'class'=>'col-md-12 well', 'align'=>'center']) !!}
    <input type="text" name="qty[2]">
    <input type="text" name="qty[5]">
    <input type="text" name="qty[1]">
    <input type="text" name="qty[4]">
{!! Form::submit('Pesan', ['class'=>'btn btn-danger form-control']) !!}
{!! Form::close() !!}
