@extends('index')

@section('content')
    @foreach($daftarresto as $resto)
        <div>{{$resto->resto_name}} <a href="{{'pesan/'.$resto->id.'/profil' }}">detail</a></div>
    @endforeach
@endsection
