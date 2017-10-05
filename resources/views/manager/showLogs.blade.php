@extends('layouts.app')

@section('css')

@endsection

@section('main')
    <section class="content">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-md-12">
                <!-- The time line -->
                <ul class="timeline">
                    @foreach($logs as $v)
                    <li>
                        @if($v['type'] == "android")
                            <i class="fa fa-android bg-blue"></i>
                        @else
                            <i class="fa fa-apple bg-blue"></i>
                        @endif
                        <div class="timeline-item">
                            <span class="time"><i class="fa fa-clock-o"></i> {{ $v['time'] }}</span>

                            <h3 class="timeline-header"><a href="#">{{ $v['production']['name'] }}</a>&nbsp;{{ $v['version'] }} <small>{{ $v['versionCode'] }}</small></h3>

                            <div class="timeline-body">
                                {{ $v['content'] }}
                            </div>
                            <div class="timeline-footer">
                                <a href="{{ url('manager/editLog/'. $v['id']) }}" class="btn btn-primary btn-xs">修改</a>
                                <button class="btn btn-danger btn-xs" onclick="deleteLog({{ $v['id'] }})">删除</button>
                            </div>
                        </div>
                    </li>
                    @endforeach
                    <li>
                        <i class="fa fa-clock-o bg-gray"></i>
                    </li>
                </ul>
            </div>
            <!-- /.col -->
        </div>
        <!-- Main row -->
    </section>
@endsection

@section('func')
    <script>
        function deleteLog(id){
            $.ajax({
                url: '/manager/deleteLog/' + id,
                type: 'delete',
                cache: false,
                dataType: 'json',
                processData: false,
                contentType: false,
                success: function(data){
                    if(data.success){
                        alert('删除成功');
                        window.location.reload();
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
    </script>
@endsection
