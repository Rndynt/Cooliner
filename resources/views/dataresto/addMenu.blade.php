@extends('index')
@section('content')

    <div class="page-content-wrap">

        <div class="row">
            <div class="col-md-12">

                <form class="form-horizontal" method="post" action="{{url('manage/'.$hide->id.'/post/new-menu')}}" files="true" enctype="multipart/form-data">
                    {!!csrf_field()!!}
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title"><strong>Two Column</strong> Layout</h3>
                            <ul class="panel-controls">
                                {{--<li><a href="#" class="panel-remove"><span class="fa fa-times"></span></a></li>--}}
                            </ul>
                        </div>
                        <div class="panel-body">
                            <p></p>
                        </div>
                        <div class="panel-body">

                            <div class="row">

                                <div class="col-md-6">
                                    <input type="hidden" name="resto_id" value="{{$hide->id}}">
                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Nama Menu</label>
                                        <div class="col-md-9">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-pencil"></span></span>
                                                {!! Form::text('name', null, ['class'=>'form-control']) !!}
                                            </div>
                                            <span class="help-block">Masukkan nama menu...</span>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">Harga</label>
                                        <div class="col-md-9 col-xs-12">
                                            <div class="input-group">
                                                <span class="input-group-addon"><span class="fa fa-unlock-alt"></span></span>
                                                {!! Form::text('price', null, ['class'=>'form-control']) !!}
                                            </div>
                                            <span class="help-block">Masukkan harga...</span>
                                        </div>
                                    </div>

                                   <!-- <div class="form-group">
                                        <label class="col-md-3 control-label">Textarea</label>
                                        <div class="col-md-9 col-xs-12">
                                            <textarea class="form-control" rows="5"></textarea>
                                            <span class="help-block">Default textarea field</span>
                                        </div>
                                    </div>-->

                                    <div class="form-group">
                                        <label class="col-md-3 control-label">File</label>
                                        <div class="col-md-9">
                                            <input type="file" class="fileinput btn-primary" name="url" id="filename" title="Browse file"/>

                                            <span class="help-block">Upload photo menu...</span>
                                        </div>
                                    </div>

                                </div>
                                <div class="col-md-6">

                                        <label class="col-md-3 control-label">Select</label>
                                        <div class="col-md-9">

                                            <select name="category_id" class="form-control select">
                                                @foreach($cate as $result)
                                                    <option value="{{$result->id}}">{{$result->category_name}}</option>
                                                @endforeach

                                                {{--<option value="2">{{$result->category_name}}</option>--}}
                                            </select>
                                            <span class="help-block">Pilih Kategori untuk menu...</span>
                                        </div>
                                    </div>

                                </div>

                            </div>

                        </div>
                        <div class="panel-footer">
                            <button class="btn btn-default">Clear Form</button>

                            <button class="btn btn-primary pull-right">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{URL::asset('template_assets/js/plugins/bootstrap/bootstrap.min.js')}}"></script>

@include('errors.list')
@endsection