<section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
        <div class="pull-left image">
            <img src="/AdminLTE/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
            <p>{{ Auth::user()->real_name ?? '管理员' }}</p>
        </div>
    </div>
    <!-- /.search form -->
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
        <li class="header">MAIN NAVIGATION</li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>求实BBS</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('manager/detail/1') }}"><i class="fa fa-circle-o"></i>信息控制</a></li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-circle-o"></i> 日志控制
                        <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('manager/showLog/1/ios') }}"><i class="fa fa-circle-o"></i> IOS</a></li>
                        <li><a href="{{ url('manager/showLog/1/android') }}"><i class="fa fa-circle-o"></i> Android</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-circle-o"></i> 发布新版
                        <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('manager/add/1/ios') }}"><i class="fa fa-circle-o"></i> IOS</a></li>
                        <li><a href="{{ url('manager/add/1/android') }}"><i class="fa fa-circle-o"></i> Android</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>微北洋</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('manager/detail/2') }}"><i class="fa fa-circle-o"></i>信息控制</a></li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-circle-o"></i> 日志控制
                        <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('manager/showLog/2/ios') }}"><i class="fa fa-circle-o"></i> IOS</a></li>
                        <li><a href="{{ url('manager/showLog/2/android') }}"><i class="fa fa-circle-o"></i> Android</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-circle-o"></i> 发布新版
                        <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('manager/add/2/ios') }}"><i class="fa fa-circle-o"></i> IOS</a></li>
                        <li><a href="{{ url('manager/add/2/android') }}"><i class="fa fa-circle-o"></i> Android</a></li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="treeview">
            <a href="#">
                <i class="fa fa-dashboard"></i> <span>问津</span>
                <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
            </a>
            <ul class="treeview-menu">
                <li><a href="{{ url('manager/detail/3') }}"><i class="fa fa-circle-o"></i>信息控制</a></li>
                <li class="treeview">
                    <a href="#"><i class="fa fa-circle-o"></i> 日志控制
                        <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('manager/showLog/3/ios') }}"><i class="fa fa-circle-o"></i> IOS</a></li>
                        <li><a href="{{ url('manager/showLog/3/android') }}"><i class="fa fa-circle-o"></i> Android</a></li>
                    </ul>
                </li>

                <li class="treeview">
                    <a href="#"><i class="fa fa-circle-o"></i> 发布新版
                        <span class="pull-right-container">
                  <i class="fa fa-angle-left pull-right"></i>
                </span>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="{{ url('manager/add/3/ios') }}"><i class="fa fa-circle-o"></i> IOS</a></li>
                        <li><a href="{{ url('manager/add/3/android') }}"><i class="fa fa-circle-o"></i> Android</a></li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
</section>