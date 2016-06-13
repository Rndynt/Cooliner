@extends('index')
@section('content')

    
    <table align="center">
        <tr>
            <td><img src="{{ $detail->profile_photo }}" alt="" align="center"></td>
        </tr>
        <tr>
            <td>Nama Resto : </td>
            <td><label>{{ $detail->resto_name }}</label></td>
        </tr>

        <tr>
            <td>Photo : </td>
            <td><label>{{ $detail->resto_photo }}</label></td>
        </tr>
        <tr>
            <td>Deskripsi : </td>
            <td><label>{{ $detail->description }}</label></td>
        </tr>
        <tr>
            <td>Alamat : </td>
            <td><label>{{ $detail->address }}</label></td>
        </tr>
        <tr>
            <td>No Telepon : </td>
            <td><label>{{ $detail->phone }}</label></td>
        </tr>
        <tr>
            <td>Suka : </td>
            <td><label>{{ $detail->likes }}</label></td>
        </tr>
        <tr>
            <td>Share : </td>
            <td><label>{{ $detail->share }}</label></td>
        </tr>
        <table>


@stop
