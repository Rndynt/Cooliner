@extends('index')

@section('content')

        <style>
            /* MODAL */
            .modal-content-my {
                width: 50.5%;
                -moz-border-radius: 0px;
                -webkit-border-radius: 0px;
                border-radius: 0px;
                -moz-box-shadow: none;
                -webkit-box-shadow: none;
                box-shadow: none;
                border-width: 5px;

            }
            .modal-header {
                padding: 10px 10px 10px 15px;
                line-height: 30px;
                -moz-border-radius: 5px 5px 0px 0px;
                -webkit-border-radius: 5px 5px 0px 0px;
                border-radius: 5px 5px 0px 0px;
                background: #F5F5F5;
                border-color: #d5d5d5;
            }
            .modal-header .close {
                margin-top: 5px;
                margin-right: 5px;
            }
            .modal-title {
                line-height: 30px;
            }
            .modal-body {
                padding: 15px;
                background-color: #f5f5f5;
            }
            .modal-footer {
                background: #F5F5F5;
                border-color: #D5D5D5;
                padding: 10px 15px;
                -moz-border-radius: 0px 0px 5px 5px;
                -webkit-border-radius: 0px 0px 5px 5px;
                border-radius: 0px 0px 5px 5px;
            }
            /* EOF MODAL */
        </style>
<!-- START RESPONSIVE TABLES -->
<div class="row">
    <div class="col-md-12">
    @if(count($pesanan) >= 1 )
        <div class="panel panel-default">

    <div class="panel-heading">
        <h3 class="panel-title">Tabel Pesanan</h3>
    </div>


    <!-- Modal -->
    <div id="lihatPesanan" class="modal fade" role="dialog">
        <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">List pesanan</h4>
            </div>

            <div class="panel-body">
                <ul class="list-group border-bottom">
                @foreach($pesanan as $lihat)
                    @foreach($lihat->bookingdetail as $quantities)

                    @endforeach

                    @foreach($lihat->restomenu as $detail)
                        <li class="list-group-item">{{$detail->name}}<span class="badge">{{$quantities->qty}}</span></li>
                    @endforeach
                @endforeach
                </ul>
            </div>
            <!-- END LIST GROUP WITH BADGES -->


            <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>

    </div>
    </div>




    <div class="panel-body panel-body-table">
        <div class="table-responsive">
        <table class="table table-bordered table-striped table-actions">
        <thead>
            <tr>
                <th width="5">ID Booking</th>
                <th width="100">Pengorder</th>
                <th width="150">Waktu Order</th>
                <th width="2">Status</th>
                <th width="150">Aksi</th>
             </tr>
        </thead>

    <tbody class="table-responsive">
        @foreach($pesanan as $list)
        <tr id="trow_1">
            <td>{{ $list->id }}</td>
            <td>{{ $list->user->name }}</td>
            <td>{{ $list->created_at }}</td>

            @if ($list->status == 1)
            <td><span class="label label-primary">Menunggu</span></td>

            @elseif($list->status == 2)
            <td><span class="label label-danger">Batal</span></td>

            @elseif($list->status == 3)
            <td><span class="label label-success">Diterima</span></td>

            @elseif($list->status == 0)
            <td><span class="label label-success">belum konfirmasi</span></td>

            @else
            <td><span class="label label-default">Belum dikonfirmasi</span></td>
            @endif

        <td>
            <button class="btn btn-default btn-rounded btn-sm">
                <span class="fa fa-pencil" data-toggle="modal" data-toggle="tooltip" title="Ubah" data-target="#lihatPesanan">
                Lihat Detail
                </span>
            </button>

            <button class="btn btn-default btn-rounded btn-sm">
                <span class="fa fa-pencil" data-toggle="modal" data-toggle="tooltip" title="Ubah" data-target="#editStatus"></span>
            </button>

            <!-- Modal -->
            <div id="editStatus" class="modal fade" role="dialog">
            <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content-my">
                <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            <h4 class="modal-title">Ubah Status Pesanan</h4>
            </div>
                <div class="modal-body">

                @foreach($pesanan as $psnn)
                {{--{{$psnn->booking}}--}}
                @endforeach

                {!! Form::model($pesanan, array('url' => array('manage/pesanan/update/'.$psnn->resto_id), 'method' => 'post'))!!}
                {!! csrf_field() !!}
                <div class="form-group">

                {!! Form::label('status','Ubah Status : ') !!}
                {{--{!! Form::text('status', null, ['class'=>'form-control']) !!}--}}
                 {!! Form::select('status', ['1' => 'Menunggu', '2' => 'Batal', '3' =>'Diterima'], ['class'=>'form-control']) !!}

                </div>

                {!! Form::submit('Update', ['class'=>'btn btn-sm btn-danger form-control']) !!}
                {!! Form::close() !!}

                @include('errors.list')
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>

            </div>
            </div>
        </td>
        @endforeach
         </tr>

    </tbody>
    </table>
    </div>

    </div>

    </div>
    @else
            <div class="panel panel-default">

                <div class="panel-heading">
                    <h3 class="panel-title">Tabel Pesanan</h3>
                </div>


                <!-- Modal -->
                <div id="lihatPesanan" class="modal fade" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">List pesanan</h4>
                            </div>

                            <div class="panel-body">
                                <ul class="list-group border-bottom">
                                    @foreach($pesanan as $lihat)
                                        @foreach($lihat->bookingdetail as $quantities)

                                        @endforeach

                                        @foreach($lihat->restomenu as $detail)
                                            <li class="list-group-item">{{$detail->name}}<span class="badge">{{$quantities->qty}}</span></li>
                                        @endforeach
                                    @endforeach
                                </ul>
                            </div>
                            <!-- END LIST GROUP WITH BADGES -->


                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>

                    </div>
                </div>




                <div class="panel-body panel-body-table">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-actions">
                            <thead>
                            <tr>
                                <th width="5">ID Booking</th>
                                <th width="100">Pengorder</th>
                                <th width="150">Waktu Order</th>
                                <th width="2">Status</th>
                                <th width="150">Aksi</th>
                            </tr>
                            </thead>

                            <tbody>

                                <tr id="trow_1">
                                    <td align="center" colspan="5"><span class="fa fa-bullhorn"></span> Data pesanan tidak dimiliki...</td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
    @endif
    </div>
</div>
<!-- END RESPONSIVE TABLES -->
{{--<a href="resto/detail/{{ $list->id }}" class="btn btn-primary fa fa-info" id="Detail" role="button"></a>--}}
{{--<a href="resto/{{$list->id }}/edit" class="btn btn-primary fa fa-edit" role="button"></a>--}}
{{--<a href="{{'resto/delete/'}}{{ $list->id }}" class="btn btn-primary fa fa-trash-o" data-token="{{ csrf_token() }}" role="button"></a>--}}

@stop