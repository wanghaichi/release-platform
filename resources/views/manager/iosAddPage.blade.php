@extends('layouts.app')

@section('css')

@endsection

@section('main')
    <section class="content-header">
        <h1>
            新版本发布
        </h1>
    </section>
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <div class="box box-primary">
                    <div class="box-body">
                        <form role="form">
                            <!-- text input -->
                            <div class="form-group">
                                <label>产品</label>
                                <input id="title" name="title" type="text" class="form-control" disabled="" value="{{ $app['name'] }}">
                            </div>
                            <div class="form-group">
                                <label>平台</label>
                                <input id="type" name="type" type="text" class="form-control" disabled="" value="ios">
                            </div>
                            <div class="form-group">
                                <label>Version</label>
                                <input id="version" name="version" type="text" class="form-control" placeholder="1.1.0">
                            </div>
                            <div class="form-group">
                                <label>更新说明</label>
                                <input id="content" name="content" type="text" class="form-control" placeholder="some word...">
                            </div>
                            <div class="form-group">
                                <label>Apple Store 链接</label>
                                <input id="link" name="link" type="text" class="form-control" placeholder="some word...">
                                <input id="appId" name="appId" type="hidden" class="form-control" value="{{ $app['id'] }}">
                            </div>
                        </form>
                    </div>
                    <div class="box-footer">
                        <button id="submitButton" type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main row -->
    </section>
@endsection

@section('func')
    <script>
        $(function(){
            $('#submitButton').click(function(){
                var form = new FormData();
                form.append('appId', $('#appId').val());
                form.append('version', $('#version').val());
                form.append('content', $('#content').val());
                form.append('link', $('#link').val());
                form.append('type', $('#type').val());
                $.ajax({
                    url: '/manager/add',
                    type: 'POST',
                    data: form,
                    cache: false,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(data){
                        if(data.success){
                            alert('添加成功');
                            window.location.href = '/manager/detail/{{ $app['id'] }}';
                        }
                        else{
                            alert(data.message);
                        }
                    },
                    error: function(){
                        alert(data.statusText);
                    }
                });
            });
        })
    </script>
@endsection
