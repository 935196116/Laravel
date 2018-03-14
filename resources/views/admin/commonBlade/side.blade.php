<!-- 侧边导航栏 -->
<div class="left-sidebar">
    <!-- 用户信息 -->
    <div class="tpl-sidebar-user-panel">
        <div class="tpl-user-panel-slide-toggleable">
            <div class="tpl-user-panel-profile-picture">
                <img src="/admin/img/user04.png" alt="">
            </div>
            <span class="user-panel-logged-in-text">
              <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
                {{ Auth::user()->name }}
          </span>
            <a href="javascript:;" class="tpl-user-panel-action-link"> <span class="am-icon-pencil"></span> 账号设置</a>
        </div>
    </div>

    <!-- 菜单 -->
    <ul class="sidebar-nav">
        <li class="sidebar-nav-heading">房源 <span class="sidebar-nav-heading-info"> </span></li>
        <li class="sidebar-nav-link">
            <a href="houseList.html">
                <i class="am-icon-home sidebar-nav-link-logo"></i> 房源查看
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="housePublish.html">
                <i class="am-icon-send sidebar-nav-link-logo"></i> 房源发布
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="regionList.html">
                <i class="am-icon-institution sidebar-nav-link-logo"></i> 区域管理
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="housingList.html">
                <i class="am-icon-building sidebar-nav-link-logo"></i> 小区管理
            </a>
        </li>

        <li class="sidebar-nav-link">
            <a href="styleList.html">
                <i class="am-icon-flag sidebar-nav-link-logo"></i> 户型管理
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="decorationList.html">
                <i class="am-icon-reorder sidebar-nav-link-logo"></i> 装修管理
            </a>
        </li>
        <li class="sidebar-nav-link">
            <a href="orderList.html">
                <i class="am-icon-reorder sidebar-nav-link-logo"></i> 进行中的订单
            </a>
        </li>

        <script>
            var p = window.location.pathname.lastIndexOf('.');
            if(p>=0)
             var path = window.location.pathname.substring(window.location.pathname.lastIndexOf('/')+1,p);
            else
                var path = window.location.pathname.substring(window.location.pathname.lastIndexOf('/')+1);
            $("a[href='"+path+".html']").addClass("active");
        </script>
        {{--<li class="sidebar-nav-heading">Page<span class="sidebar-nav-heading-info"> 常用页面</span></li>--}}

        {{--<li class="sidebar-nav-link">--}}
            {{--<a href="sign-up.html">--}}
                {{--<i class="am-icon-clone sidebar-nav-link-logo"></i> 注册--}}
                {{--<span class="am-badge am-badge-secondary sidebar-nav-link-logo-ico am-round am-fr am-margin-right-sm">6</span>--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="sidebar-nav-link">--}}
            {{--<a href="login.html">--}}
                {{--<i class="am-icon-key sidebar-nav-link-logo"></i> 登录--}}
            {{--</a>--}}
        {{--</li>--}}
        {{--<li class="sidebar-nav-link">--}}
            {{--<a href="404.html">--}}
                {{--<i class="am-icon-tv sidebar-nav-link-logo"></i> 404错误--}}
            {{--</a>--}}
        {{--</li>--}}

    </ul>
</div>