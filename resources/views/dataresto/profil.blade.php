@extends('index')
@section('content')


    {{--<table align="center">
        <tr>
            <td><img src="{{ $profil->profile_photo }}" alt="" align="center"></td>
        </tr>
        <tr>
            <td>Nama Resto : </td>
            <td><label>{{ $profil->resto_name }}</label></td>
        </tr>

        <tr>
            <td>Photo : </td>
            <td><label>{{ $profil->resto_photo }}</label></td>
        </tr>
        <tr>
            <td>Deskripsi : </td>
            <td><label>{{ $profil->description }}</label></td>
        </tr>
        <tr>
            <td>Alamat : </td>
            <td><label>{{ $profil->address }}</label></td>
        </tr>
        <tr>
            <td>No Telepon : </td>
            <td><label>{{ $profil->phone }}</label></td>
        </tr>
        <tr>
            <td>Suka : </td>
            <td><label>{{ $profil->likes }}</label></td>
        </tr>
        <tr>
            <td>Share : </td>
            <td><label>{{ $profil->share }}</label></td>
        </tr>
    </table>--}}


            <!-- PAGE CONTENT WRAPPER -->
            <div class="page-content-wrap">

                <div class="row">

                    <div class="col-lg-4">
                        <div class="panel panel-default">
                            <div class="panel-body profile"
                                 style="background: {{url('assets/images/gallery/music-4.jpg')}}" center center no-repeat;>
                                <div class="profile-image">
                                    <img src="{{ asset($profile->profile_photo)  }}" alt=""/>
                                </div>
                                <div class="profile-data">
                                    <div class="profile-data-name">{{ $profile->resto_name }}</div>
                                    <div class="profile-data-title" style="color: #FFF;">Cafe & Resto</div>
                                </div>
                                <div class="profile-controls">
                                    <a href="#" class="profile-control-left twitter"><span class="fa fa-twitter"></span></a>
                                    <a href="#" class="profile-control-right facebook"><span class="fa fa-facebook"></span></a>
                                </div>
                            </div>

                            <!--<div class="panel-body list-group border-bottom">
                                <a href="#" class="list-group-item active"><span class="fa fa-bar-chart-o"></span> Activity</a>
                                <a href="#" class="list-group-item"><span class="fa fa-coffee"></span> Groups <span class="badge badge-default">18</span></a>
                                <a href="#" class="list-group-item"><span class="fa fa-users"></span> Friends <span class="badge badge-danger">+7</span></a>
                                <a href="#" class="list-group-item"><span class="fa fa-folder"></span> Apps</a>
                                <a href="#" class="list-group-item"><span class="fa fa-cog"></span> Settings</a>
                            </div>-->
                            <div class="panel-body">
                                <div class="contact-info">
                                    <p><small>Nama Cafe/Resto</small><br/>{{ $profile->resto_name }}</p>
                                    <p><small>Email</small><br/>nadiaali@domain.com</p>
                                    <p><small>Alamat</small><br/>{{ $profile->address }}</p>
                                    <p><small>No.Telepon</small><br/>{{ $profile->phone }}</p>
                                    <p><small>Alamat</small><br/>{{ $profile->address }}</p>
                                </div>
                            </div>

                        </div>

                    </div>
                    <div class="col-lg-8">
                        <div class="panel panel-default">
                            <div class="panel-body">

                                <h4 class="text-title">Photos</h4>

                                <div class="gallery" id="links">

                                    @foreach($profil as $resto_photo)
                                        <a href="{{ asset($resto_photo->url)  }}" title="{{ $resto_photo->caption }}" class="gallery-item" data-gallery>
                                            <div class="image">
                                                <img src="{{ asset($resto_photo->url)  }}" alt="Music Image 1" height="140px"/>
                                            </div>
                                        </a>
                                    @endforeach


                                    {{--<div class="image">--}}
                                    {{--<img src="{{ $profil }}" alt="Music Image 1"/>--}}
                                    {{--</div>--}}
                                    {!! $mapRender !!}
                                </div>
                            </div>
                            </div>

                        </div>


                </div>

            </div>
            <!-- END PAGE CONTENT WRAPPER -->




@stop
