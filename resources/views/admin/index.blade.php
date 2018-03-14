<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>小帮后台 - @yield('title')</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="csrf-token" content="{{ csrf_token() }}" />
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/admin/i/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="/admin/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <script src="/admin/js/echarts.min.js"></script>
    <link rel="stylesheet" href="/admin/css/amazeui.min.css" />
    <link rel="stylesheet" href="/admin/css/amazeui.datatables.min.css" />
    <link rel="stylesheet" href="/admin/css/app.css">
    <script src="/admin/js/jquery.min.js"></script>

    <style>
        .row-content td a{
            color: #fff;
        }
        .row-content th{
            min-width: 80px;
        }
        .row-content .title{
            max-width: 200px;

            overflow: hidden;
            white-space: nowrap;
            text-overflow: ellipsis;
        }
        .am-gallery-item a{
            position: relative;


        }
        .am-gallery-item>svg{
            position: absolute;
            color: #fff;
            /*background-color: rgba(0,0,0,0.6);*/
             top: 0;
            right: 0;
            text-align: center;
            z-index: 10000;
            cursor: pointer;
            width: 18px;
            height: 18px;

        }
        .sidebar-nav-link .level-2{
            border-left:none !important;
        }
        .card-add{
            background-color: #00a23f ;
            color: #fff;
            border-radius: 3px;
            padding: 30px 20px;
            font-size: 3.6rem;
            cursor: pointer;
            font-weight: bold;
            box-shadow: -1px 0px 4px #333;
        }
        .card-add:hover{
            background-color:#00b067;
        }
        .theme-black .tpl-table-black-operation a.tpl-table-black-operation-lock{
            border: 1px solid #0f9ae0;
            color: #0f9ae0;
        }
        .theme-black .tpl-table-black-operation a.tpl-table-black-operation-lock:hover{
            color: #fff;
            background-color: #0f9ae0;
        }
        .theme-black .tpl-table-black-operation a.tpl-table-black-operation-finish{
            border: 1px solid #00b067;
            color: #00b067;
        }
        .theme-black .tpl-table-black-operation a.tpl-table-black-operation-finish:hover{
            color: #fff;
            background-color: #00b067;
        }
        .link-phone{
            text-decoration: underline;
        }
        .am-popup{
            z-index: 1201;
        }

    </style>
    @section('head')
    @show
</head>

<body data-type="index">
<script src="/admin/js/theme.js"></script>

{{--模态载入--}}
<div class="am-modal am-modal-loading am-modal-no-btn" tabindex="-1" id="my-modal-loading">
    <div class="am-modal-dialog">
        <div class="am-modal-hd"></div>
        <div class="am-modal-bd">
            <span class="am-icon-spinner am-icon-spin"></span>
        </div>
    </div>
</div>
<div class="am-modal am-modal-no-btn" tabindex="-1" id="mes-modal">
    <div class="am-modal-dialog">
        <div class="am-modal-hd title">Modal 标题
            <a href="javascript: void(0)" class="am-close am-close-spin" data-am-modal-close>&times;</a>
        </div>
        <div class="am-modal-bd nr">
            Modal 内容。
        </div>
    </div>
</div>
<script>
    function mesModal(title,nr,closeCallback) {
        var $modal = $('#mes-modal');

        $modal.find('.title').text(title);
        $modal.find('.nr').text(nr);

            var $target =$modal;
            if (($target).hasClass('js-modal-open')) {
                $modal.modal();
            } else if (($target).hasClass('js-modal-close')) {
                $modal.modal('close');

            } else {
                $modal.modal('toggle');
            }
        closeCallback && closeCallback();

    }
</script>
{{--模态内容--}}
@section('modal')

@show

<div class="am-g tpl-g">

    {{--头部区域--}}
    @include('admin.commonBlade.header',[
        'name'=>$name
    ]);
    <!-- 风格切换 -->
    {{--<div class="tpl-skiner">--}}
        {{--<div class="tpl-skiner-toggle am-icon-cog">--}}
        {{--</div>--}}
        {{--<div class="tpl-skiner-content">--}}
            {{--<div class="tpl-skiner-content-title">--}}
                {{--选择主题--}}
            {{--</div>--}}
            {{--<div class="tpl-skiner-content-bar">--}}
                {{--<span class="skiner-color skiner-white" data-color="theme-white"></span>--}}
                {{--<span class="skiner-color skiner-black" data-color="theme-black"></span>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}

    {{--侧边栏--}}
    @include('admin.commonBlade.side');

    {{--内容区域--}}



    <!-- 内容区域 -->
        <div class="tpl-content-wrapper">

            <div class="container-fluid am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-9">
                        <div class="page-header-heading"><span class="am-icon-home page-header-heading-icon"></span> 小帮 - @yield('title') <small>Made By Volankey</small></div>
                        <p class="page-header-description"></p>
                    </div>

                </div>

            </div>

            <div class="row-content am-cf">
                @section('content')
                    内容区域
                @show
            </div>
        </div>




    {{--@include('admin.commonBlade.content');--}}

</div>
<script src="/admin/js/amazeui.min.js"></script>
<script src="/admin/js/amazeui.datatables.min.js"></script>
<script src="/admin/js/dataTables.responsive.min.js"></script>
<script src="/admin/js/app.js"></script>

</body>

</html>