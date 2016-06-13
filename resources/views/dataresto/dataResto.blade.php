@extends('index')
@section('content')

    <!-- Modal -->
    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">Tambah Data Resto</h4>
                </div>
                <div class="modal-body">
                    {!! Form::open(['url'=>'resto/tambah-data', 'class'=>'col-md-12 well', 'align'=>'center']) !!}

                    @include('dataresto.form')
                    {!! Form::submit('Tambah Data', ['class'=>'btn btn-danger form-control']) !!}
                    {!! Form::close() !!}

                    @include('errors.list')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

        </div>
    </div>

    <!-- PAGE TITLE -->
    <div class="page-title">
        <h2><span class="fa fa-arrow-circle-o-left"></span> Sortable Tables</h2>
    </div>
    <!-- END PAGE TITLE -->



<!-- PAGE CONTENT WRAPPER -->
<div class="page-content-wrap">

    <div class="row">
        <div class="col-md-12">
            <!-- START DEFAULT DATATABLE -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Default</h3>
                    <ul class="panel-controls">
                        <li><a href="#" class="panel" data-toggle="modal" data-toggle="tooltip" title="Tambah Data" data-target="#myModal"><label class="fa fa-plus"></label></a></li>
                        <li><a href="#" class="panel-collapse"><span class="fa fa-angle-down"></span></a></li>
                        <li><a href="#" class="panel-refresh"><span class="fa fa-refresh"></span></a></li>
                        <li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>
                    </ul>
                </div>
                <div class="panel-body">
                    <table class="table datatable">
                        <thead>
                        <tr>
                            <th>Nama</th>
                            <th>Lokasi</th>
                            <th>Alamat</th>
                            <th>Telepon</th>
                            <th>Suka</th>
                            <th>Terdaftar</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($datarestos as $data_resto)
                        <tr>
                            <td>{{ $data_resto->resto_name }}</td>
                            <td>System Architect</td>
                            <td>{{ $data_resto->address }}</td>
                            <td>{{ $data_resto->phone }}</td>
                            <td>{{ $data_resto->likes }}</td>
                            <td>{{ $data_resto->created_at }}</td>
                            <td>
                                <a href="resto/detail/{{ $data_resto->id }}" class="btn btn-primary fa fa-info" id="Detail" role="button"></a>
                                <a href="resto/{{$data_resto->id }}/edit" class="btn btn-primary fa fa-edit" role="button"></a>
                                <a href="{{'resto/delete/'}}{{ $data_resto->id }}" class="btn btn-primary fa fa-trash-o" data-token="{{ csrf_token() }}" role="button"></a>
                            </td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <!-- END DEFAULT DATATABLE -->
        </div>
    </div>

</div>
<!-- PAGE CONTENT WRAPPER -->

<!-- START PRELOADS -->
<audio id="audio-alert" src="audio/alert.mp3" preload="auto"></audio>
<audio id="audio-fail" src="audio/fail.mp3" preload="auto"></audio>
<!-- END PRELOADS -->

<!-- START SCRIPTS -->
<!-- START PLUGINS -->
<script type="text/javascript" src="js/plugins/jquery/jquery.min.js"></script>
<script type="text/javascript" src="js/plugins/jquery/jquery-ui.min.js"></script>
<script type="text/javascript" src="js/plugins/bootstrap/bootstrap.min.js"></script>
<!-- END PLUGINS -->

<!-- THIS PAGE PLUGINS -->
<script type='text/javascript' src='js/plugins/icheck/icheck.min.js'></script>
<script type="text/javascript" src="js/plugins/mcustomscrollbar/jquery.mCustomScrollbar.min.js"></script>

<script type="text/javascript" src="js/plugins/datatables/jquery.dataTables.min.js"></script>
<!-- END PAGE PLUGINS -->

<!-- START TEMPLATE -->
<script type="text/javascript" src="js/settings.js"></script>

<script type="text/javascript" src="js/plugins.js"></script>
<script type="text/javascript" src="js/actions.js"></script>
<!-- END TEMPLATE -->
<!-- END SCRIPTS -->
@stop