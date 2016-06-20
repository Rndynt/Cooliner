<!--SCRIPTS ONLINE -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>


<!-- START PAGE SIDEBAR -->
<div class="page-sidebar">
    <!-- START X-NAVIGATION -->
    <ul class="x-navigation">
        <li class="xn-logo">
            <a href="{{'/'}}">Cooliner</a>
            <a href="#" class="x-navigation-control"></a>
        </li>
        <li class="xn-profile">
            <a href="#" class="profile-mini">
                <img src="{{URL::asset('template_assets//assets/images/blog/post_2.jpg')}}" alt="John Doe"/>
            </a>
            <div class="profile">
                <div class="profile-image">
                    <img src="{{URL::asset('template_assets/assets/images/blog/post_2.jpg')}}" alt="John Doe"/>
                </div>
                <div class="profile-data">
                    <div class="profile-data-name">{{ Auth::user()->name }}</div>
                    @if (Auth::user() && Auth::user()->hasRole('user'))
                        @if(Auth::user() && Auth::user()->restodata)
                                 <span>{{ Auth::user()->restodata->resto_name }}</span>
                            @else
                                <span>Anda Belum melengkapi informasi </span>
                        @endif
                    @endif

                    @if (Auth::user() && Auth::user()->hasRole('admin') or Auth::user()->hasRole('user'))
                        @if(Auth::user() && Auth::user()->status)
                        <div class="btn btn-success btn-rounded" color="red">{{ Auth::user()->status }}</div>
                        {{--<div class="profile-data-title">Web Developer/Designer</div>--}}
                        @else

                            @endif
                    @endif

                </div>
                <div class="profile-controls">
                    <a href="pages-profile.html" class="profile-control-left"><span class="fa fa-info"></span></a>
                    <a href="pages-messages.html" class="profile-control-right"><span class="fa fa-envelope"></span></a>
                </div>
            </div>
        </li>
        <li class="xn-title">Navigation</li>
        @if (Auth::user()->hasRole('admin'))
        <li class="active">
            <a href="{{ url('/dashboard') }}"><span class="fa fa-desktop"></span><span class="xn-text">Dashboard</span></a>
        </li>
            @elseif(Auth::user()->restodata)
            <li class="active">
                <a href="{{ url('/dashboard') }}"><span class="fa fa-desktop"></span><span class="xn-text">Dashboard</span></a>
            </li>
            @else

        @endif

        @if (Auth::user() && Auth::user()->hasRole('admin'))
            <li class="xn-openable">
                <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Manajemen Data</span></a>
                <ul>
                    <li><a href="{{url('resto')}}"><span class="fa fa-chevron-right"></span>Data Resto</a></li>
                    <li><a href="{{url('user')}}"><span class="fa fa-chevron-right"></span>Data User</a></li>
                    <li class="xn-openable">
                        <a href="#"><span class="fa fa-clock-o"></span> Timeline</a>
                        <ul>
                            <li><a href="pages-timeline.html"><span class="fa fa-align-center"></span> Default</a></li>
                            <li><a href="pages-timeline-simple.html"><span class="fa fa-align-justify"></span> Full Width</a></li>
                        </ul>
                    </li>
                </ul>
            </li>
        @endif

        @if(Auth::user() && Auth::user()->status)

            @else
            <li>
                <a href="{{ url('api/pesan')}}">
                    <span class="fa fa-chevron-right"></span>Pesan
                </a>
            </li>
        @endif

        @if (Auth::user() && Auth::user()->hasRole('user') && Auth::user()->restodata)
            <li class="xn-openable">
                <a href="#"><span class="fa fa-files-o"></span> <span class="xn-text">Kelola</span></a>
                <ul>
                    @if(Auth::user() && Auth::user()->restodata)
                    {{--<a href="resto/detail/{{ Auth::user()->restodata->id }}">df</a>--}}
                    <li>
                        <a href="{{ url('manage/profil/'.Auth::user()->restodata->id) }}">
                            <span class="fa fa-chevron-right"></span>Profil Restoran
                        </a>
                    </li>

                        <li class="xn-openable">
                            <a href="#"><span class="fa fa-chevron-right"></span> Menu</a>
                            <ul>
                                <li><a href="{{ url('manage/menu/'.Auth::user()->restodata->id) }}"><span class="fa fa-align-center"></span> List Menu</a></li>
                                <li><a href="{{ url('manage/'.Auth::user()->restodata->id.'/new-menu') }}"><span class="fa fa-align-justify"></span> Tambah Menu</a></li>
                            </ul>
                        </li>

                        <li>
                            <a href="{{ url('manage/pesanan/'.Auth::user()->restodata->id) }}">
                                <span class="fa fa-chevron-right"></span>Pesanan
                            </a>
                        </li>


                </ul>
            </li>


            <li>
                <a href="{{ url('api/pesan')}}">
                    <span class="glyphicon glyphicon-list-alt"></span><span class="xn-text">Report</span></a>
                </a>
            </li>
            @else

            @endif
        @endif
    </ul>
    <!-- END X-NAVIGATION -->
</div>
<!-- END PAGE SIDEBAR -->
