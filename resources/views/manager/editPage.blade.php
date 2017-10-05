@extends('layouts.app')

@section('css')

@endsection

@section('main')
    <section class="content-header">
        <h1>
            内容修改
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
                                <label>标题</label>
                                <input id="title" name="title" type="text" class="form-control" disabled="" value="{{ $app['name'] }}">
                            </div>
                            <div class="form-group">
                                <label>标语</label>
                                <input id="slogan" name="slogan" type="text" class="form-control" value="{{ $app['slogan'] }}">
                            </div>
                            <div class="form-group">
                                <label>描述</label>
                                <input id="desc" name="desc" type="text" class="form-control" value="{{ $app['description'] }}">
                            </div>
                            <div class="form-group">
                                <label>展示图</label>(不更换请不要重复选择)
                                <input id="inputFile" name="file" type="file" class="form-control">
                                <input id="appId" type="hidden" value="{{ $app['id'] }}">
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
                var file = $('#inputFile')[0].files[0];
                if(file){
                    console.log(file);
                    var data = new FormData();
                    data.append('upload', file);
                    data.append("usage", 'appPic');
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
                            var path = data.file;
                            var file_id = data.info.id;
                            console.log(file_id);
                            var form = new FormData();
                            form.append('title', $('#title').val());
                            form.append('slogan', $('#slogan').val());
                            form.append('desc', $('#desc').val());
                            form.append('appId', $('#appId').val());
                            form.append('pic', file_id);
                            $.ajax({
                                url: '/manager/edit',
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
                    });
                }
                else{
                    var form = new FormData();
                    form.append('title', $('#title').val());
                    form.append('slogan', $('#slogan').val());
                    form.append('desc', $('#desc').val());
                    form.append('appId', $('#appId').val());
                    $.ajax({
                        url: '/manager/edit',
                        type: 'POST',
                        data: form,
                        cache: false,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(data){
                            if(data.success){
                                alert('添加成功');
                                window.location.href = '/manager/detail';
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
            });
        })
    </script>
@endsection
