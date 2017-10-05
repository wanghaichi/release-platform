@extends('layouts.app')

@section('css')

@endsection

@section('main')
    <section class="content-header">
        <h1>
            {{ $app['name'] }}
            <small>{{ $app['slogan'] }}</small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="{{ url('manager/edit/'.$app['id']) }}"><button type="button" class="btn btn-block btn-primary btn-xs">修改</button></a></li>
        </ol>
    </section>
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-4">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <i class="fa fa-text-width"></i>

                        <h3 class="box-title">Description</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <p>
                            {{ $app['description'] }}
                        </p>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- ./col -->
            <div class="col-md-8">
                <div class="box box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">展示图</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="2" class="active"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img src="{{ env('APP_URL').'/storage/'.$app['pic']['path'] }}" alt="Third slide">
                                    <div class="carousel-caption">
                                        {{ $app['name'] }}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- Main row -->
    </section>
@endsection

@section('func')

@endsection
