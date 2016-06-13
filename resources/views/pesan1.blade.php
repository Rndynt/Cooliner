@extends('index')

@section('content')
    <a href="{{ 'menu' }}">Menu</a>
    <di>{{$profile->resto_name}}</di>
    <di>{{$profile->address}}</di></BR>
    @foreach($profile->restoimage as $image)
    <di><img src="{{$image->url}}" width="50px" height="50px"> </di></BR></BR>
    @endforeach

    {!! $mapRender !!}
@endsection