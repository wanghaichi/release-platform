@extends('layouts.app')

@section('css')

@endsection

@section('main')
    <section class="content-header">
        <h1>
            日志更改
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
                                <input type="text" class="form-control" disabled="" value="{{ $log['production']['name'] }}">
                            </div>
                            <div class="form-group">
                                <label>平台</label>
                                <input type="text" class="form-control" disabled="" value="{{ $log['type'] }}">
                            </div>
                            <div class="form-group">
                                <label>Version</label>
                                <input id="version" name="version" type="text" class="form-control" value="{{ $log['version'] }}" >
                            </div>
                            @if($log['type'] == "Android")
                                <div class="form-group">
                                    <label>VersionCode</label>
                                    <input id="versionCode" name="versionCode" type="text" class="form-control" value="{{ $log['versionCode'] }}" >
                                </div>
                            @else
                                <input id="versionCode" name="versionCode" type="hidden" class="form-control" value="{{ $log['versionCode'] ?? "" }}" >
                            @endif

                            <div class="form-group">
                                <label>描述</label>
                                <input id="content" name="content" type="text" class="form-control" value="{{ $log['content'] }}" >
                                <input id="logId" name="logId" type="hidden" value="{{ $log['id'] }}">
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
                form.append('version', $('#version').val());
                form.append('versionCode', $('#versionCode').val());
                form.append('content', $('#content').val());
                form.append('logId', $('#logId').val());
                $.ajax({
                    url: '/manager/editLog',
                    type: 'POST',
                    data: form,
                    cache: false,
                    dataType: 'json',
                    processData: false,
                    contentType: false,
                    success: function(data){
                        if(data.success){
                            alert('添加成功');
                            window.location.href = "/manager/showLog/{{ $log['pid'] }}/{{ $log['type'] }}";
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
