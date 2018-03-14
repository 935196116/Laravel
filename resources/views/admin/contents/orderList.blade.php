
@extends('admin/index')
@section('title')
    订单管理
@stop
@section('content')
    <!-- 内容区域 -->


    <div class="row am-cf">
        <div class="am-u-sm-12 am-u-md-12  widget-margin-bottom-lg">

            <div class="widget am-cf widget-body-lg">

                <div class="widget-body  am-fr">
                    <div class="am-scrollable-horizontal ">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black  " id="example-r">
                            <thead>
                            <tr>
                                <th>订单编号</th>
                                <th>房源信息</th>
                                <th>业主姓名</th>
                                <th>业主电话</th>
                                <th>受理时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>

                            @for($i=0;$i < 10; $i++)
                                <tr class="gradeX">
                                    <td  class="am-text-middle"><a href="">{{date('Ymd').substr(implode(NULL, array_map('ord', str_split(substr(uniqid(), 7, 13), 1))), 0, 8)}}</a></td>
                                    <td  class="am-text-middle"><a href="">河南新区-劳动嘉园-7栋-401</a></td>
                                    <td  class="am-text-middle"><a href="">李玉刚</a></td>
                                    <td  class="am-text-middle"><a class="link-phone"  href="tel:13899998888">13899998888</a></td>
                                    <td  class="am-text-middle"><a href="">2017/09/26</a></td>
                                    <td  class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="javascript:;" class="tpl-table-black-operation-finish">
                                                <i class="am-icon-check-square-o"></i> 完成
                                            </a>
                                            <a href="javascript:;" class="tpl-table-black-operation-del">
                                                <i class="am-icon-rotate-left"></i> 失败
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endfor



                            <!-- more data -->
                            </tbody>
                        </table>


                        <ul class="am-pagination am-pagination-centered">
                            <li class="am-disabled"><a href="#">&laquo;</a></li>
                            <li class="am-active"><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">4</a></li>
                            <li><a href="#">5</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>


                    </div>
                </div>
            </div>

        </div>
    </div>
@stop