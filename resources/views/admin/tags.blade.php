@extends('layouts.app')

@section('menu')
    @include('layouts.menus',['index' => 7])
@endsection

@section('content')
    <div class="panel panel-info">
        <div class="panel-heading">
            <div class="panel-title"><a><i class="glyphicon glyphicon-tags"></i> 标签管理</a><a href="{{ url('/tags/new') }}" class="pull-right" style="color: #CA2623"><i class="glyphicon glyphicon-plus"></i> 添加标签</a></div>
        </div>
        <div class="panel-body">
            <div class="row">
                <form method="POST" action="{{ url('/tags/new') }}" class="form-horizontal" enctype="multipart/form-data" role="form">
                    {!! csrf_field() !!}
                    <fieldset>
                        {{--<!-- Text input-->--}}
                        <div class="form-group col-lg-10 col-lg-offset-1">
                            <div class="col-lg-12">

                            </div>

                        </div>
                    </fieldset>
                </form>
            </div>
        </div>
    </div>
@endsection
