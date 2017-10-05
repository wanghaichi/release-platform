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
                        <form role="form" enctype="multipart/form-data">
                            <!-- text input -->
                            <div class="form-group">
                                <label>产品</label>
                                <input id="title" name="title" type="text" class="form-control" disabled="" value="{{ $app['name'] }}">
                            </div>
                            <div class="form-group">
                                <label>平台</label>
                                <input id="type" name="type" type="text" class="form-control" disabled="" value="android">
                            </div>
                            <div class="form-group">
                                <label>更新说明</label>
                                <input id="content" name="content" type="text" class="form-control" placeholder="some word...">
                            </div>
                            <div class="form-group">
                                <label>上传APK文件</label>
                                <input id="inputFile" name="file" type="file" class="form-control">
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
            $('#submitButton').click(function() {
                var file = $('#inputFile')[0].files[0];
                if (file) {
                    console.log(file);
                    var data = new FormData();
                    data.append('upload', file);
                    data.append("usage", 'androidAPK');
                    $.ajax({
                        url: '/manager/file',
                        type: 'POST',
                        data: data,
                        cache: false,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        error: function (data) {
                            alert(data.statusText);
                        }
                    }).done(function(data){
                        if(data.success){
                            var form = new FormData();
                            form.append('appId', $('#appId').val());
                            form.append('version', data.apkInfo.version);
                            form.append('versionCode', data.apkInfo.versionCode);
                            form.append('content', $('#content').val());
                            form.append('link', data.info.path);
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
                                        window.location.href = '/manager/detail/1';
                                    }
                                    else{
                                        alert(data.message);
                                    }
                                },
                                error: function(){
                                    alert(data.statusText);
                                }
                            });
                        }
                        else{
                            alert(data.message);
                        }
                    })
                }
                else{
                    alert("未监测到文件");
                }
            })
        })
    </script>
@endsection
