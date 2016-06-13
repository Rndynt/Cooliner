@extends('index')
@section('content')

        <!-- START CONTENT FRAME -->
        <div class="content-frame">

            <!-- START CONTENT FRAME TOP -->
            <div class="col-lg-12">
                <div class="page-title">
                    <h3><span class="sb-bistro-lunch"></span> List Menu {{ $nama_resto->resto_name }}</h3>
                </div>

            </div>

            <!-- START CONTENT FRAME RIGHT -->
            <!--<div class="content-frame-right">
                <div class="block push-up-10">
                    <form action="upload.php" class="dropzone dropzone-mini"></form>
                </div>
                <h4>Groups:</h4>
                <div class="list-group border-bottom push-down-20">
                    <a href="#" class="list-group-item active">All <span class="badge badge-primary">12</span></a>
                    <a href="#" class="list-group-item">Nature <span class="badge badge-success">7</span></a>
                    <a href="#" class="list-group-item">Music <span class="badge badge-danger">3</span></a>
                    <a href="#" class="list-group-item">Space <span class="badge badge-info">2</span></a>
                    <a href="#" class="list-group-item">Girls <span class="badge badge-warning">3</span></a>
                </div>
                <h4>Tags:</h4>
                <ul class="list-tags">
                    <li><a href="#"><span class="fa fa-tag"></span> amet</a></li>
                    <li><a href="#"><span class="fa fa-tag"></span> rutrum</a></li>
                    <li><a href="#"><span class="fa fa-tag"></span> nunc</a></li>
                    <li><a href="#"><span class="fa fa-tag"></span> tempor</a></li>
                    <li><a href="#"><span class="fa fa-tag"></span> eros</a></li>
                    <li><a href="#"><span class="fa fa-tag"></span> suspendisse</a></li>
                    <li><a href="#"><span class="fa fa-tag"></span> dolor</a></li>
                </ul>
            </div>-->
            <!-- END CONTENT FRAME RIGHT -->

            <!-- START CONTENT FRAME BODY -->
            <div class="col-lg-12">
                <div class="panel panel-default">
                <div class="pull-left push-up-10">
                    <button class="btn btn-primary" id="gallery-toggle-items">Toggle All</button>
                </div>
                <div class="pull-right push-up-10">
                    <div class="btn-group">
                        <button class="btn btn-primary"><span class="fa fa-pencil"></span> Edit</button>
                        <button class="btn btn-primary"><span class="fa fa-trash-o"></span> Delete</button>
                    </div>
                </div>

                <div class="gallery" id="links">

                    @foreach($menus as $list_menu)
                    <a class="gallery-item" href="{{ $list_menu->url }}" title="{{ $list_menu->name }}" data-gallery>
                        <div class="image">
                            <img src="{{ $list_menu->url }}" alt="{{ $list_menu->id }}" width="200px" height="200px"/>
                            <ul class="gallery-item-controls">
                                <li><label class="check"><input type="checkbox" class="icheckbox"/></label></li>
                                <li><span class="gallery-item-remove"><i class="fa fa-times"></i></span></li>
                            </ul>
                        </div>
                        <div class="meta">
                            <strong>{{ $list_menu->name }}</strong>
                            <span color="red"> Rp.{{ $list_menu->price }}</span>
                        </div>
                    </a>
                    @endforeach

                </div>

                <ul class="pagination pagination-sm pull-right push-down-20 push-up-20">
                    <li class="disabled"><a href="#">«</a></li>
                    <li class="active"><a href="#">1</a></li>
                    <li><a href="#">2</a></li>
                    <li><a href="#">3</a></li>
                    <li><a href="#">4</a></li>
                    <li><a href="#">»</a></li>
                </ul>
            </div>
            <!-- END CONTENT FRAME BODY -->
                </div>
        </div>
        <!-- END CONTENT FRAME -->

<!-- BLUEIMP GALLERY -->
<div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
    <div class="slides"></div>
    <h3 class="title"></h3>
    <a class="prev">‹</a>
    <a class="next">›</a>
    <a class="close">×</a>
    <a class="play-pause"></a>
    <ol class="indicator"></ol>
</div>
<!-- END BLUEIMP GALLERY -->

<script>
    document.getElementById('links').onclick = function (event) {
        event = event || window.event;
        var target = event.target || event.srcElement;
        var link = target.src ? target.parentNode : target;
        var options = {index: link, event: event,onclosed: function(){
            setTimeout(function(){
                $("body").css("overflow","");
            },200);
        }};
        var links = this.getElementsByTagName('a');
        blueimp.Gallery(links, options);
    };
</script>

<!-- END SCRIPTS -->
@stop

