
@extends('admin/index')
@section('title')
    区域管理
@stop
@section("modal")
    <!-- 模态输入-->
    <div class="am-modal am-modal-prompt" tabindex="-1" id="add-prompt">
        <div class="am-modal-dialog">
            <div class="am-modal-hd title">模态弹出</div>
            <div class="am-modal-bd">
                <input type="text" class="am-modal-prompt-input">
            </div>
            <div class="am-modal-footer">
                <span class="am-modal-btn" data-am-modal-cancel>取消</span>
                <span class="am-modal-btn" data-am-modal-confirm>提交</span>
            </div>
        </div>
    </div>

    <div class="am-modal am-modal-prompt" tabindex="-1" id="update-prompt">
        <div class="am-modal-dialog">
            <div class="am-modal-hd title">模态弹出</div>
            <div class="am-modal-bd">
                <input type="text" class="am-modal-prompt-input">
            </div>
            <div class="am-modal-footer">
                <span class="am-modal-btn" data-am-modal-cancel>取消</span>
                <span class="am-modal-btn" data-am-modal-confirm>提交</span>
            </div>
        </div>
    </div>
@stop

@section('content')


    <div class="row am-cf" >
        <div class="am-u-sm-12 am-u-md-12 widget-margin-bottom-lg ">
            <div class="card-add" id="add">
               ＋ 添加新的区域
            </div>


        </div>


    </div>
    {{--模态输入框js代码--}}
    <script>

        var URL_END = "region";
        var token = '{{csrf_token()}}';

        $(function() {
            function postRegion(name) {
                $.ajax({
                    url:'{{url("manage/op/")}}/'+URL_END+'/add',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        name:name,
                        _token:token
                    },
                    timeout:5000,    //超时时间
                    dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                    beforeSend:function(xhr){
                        console.log(xhr)
                        console.log('发送前')

                    },
                    success:function(data,textStatus,jqXHR){
                        console.log(data)
                        if(data.code == 0)
                        {
                            mesModal("提示","提交"+" 区域 "+data.name+" 成功",function () {

                                var tr = $('<tr data-name="'+data.name+'" data-id="'+data.id+'" class="gradeX"> <td  class="am-text-middle"><a href="" class="nm" data-id="'+data.id+'">'+data.name+'</a></td> <td  class="am-text-middle"><a href="">null</a></td> <td  class="am-text-middle"><a href="">null</a></td> <td  class="am-text-middle"><div class="tpl-table-black-operation"> <a class="edit" href="javascript:;"><i class="am-icon-pencil"></i> 编辑 </a> <a href="javascript:;" class="tpl-table-black-operation-del delete"><i class="am-icon-trash"></i> 删除 </a></div> </td> </tr>');
                                $("#table").prepend(tr);
                                tr.find(".edit").on("click",handleEditClick);

                            });
                        }
                        else {
                            mesModal("提示","提交"+" 区域 "+data.name+" 失败",function () {

                            });
                        }
                    },
                    error:function(xhr,textStatus){
                        console.log('错误')
                        console.log(xhr)
                        console.log(textStatus)
                        mesModal("提示","提交失败"+JSON.stringify( xhr.responseJSON.errors));
                    },
                    complete:function(){
                        console.log('结束')
                    }
                })
            }



            $('#add').on('click', function() {
                $('#add-prompt').find(".title").text("增加新的区域").end().modal({
                    relatedTarget: this,
                    onConfirm: function(e) {
//                        alert('你输入的是：' + e.data || '');
                        postRegion(e.data);

                    },
                    onCancel: function(e) {

                    }
                });

            });
        });
    </script>

    <div class="row am-cf">
        <div class="am-u-sm-12 am-u-md-12  widget-margin-bottom-lg">

            <div class="widget am-cf widget-body-lg">

                <div class="widget-body  am-fr">
                    <div class="am-scrollable-horizontal ">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black  " id="example-r">
                            <thead>
                            <tr>
                                <th>区域名</th>
                                <th>热度</th>
                                <th>更新时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody id="table">

                            @forelse($data as $region)
                                <tr data-id="{{$region->id}}" data-name="{{$region->_name}}" class="gradeX">
                                    <td  class="am-text-middle"><span class="nm" href="" data-id="{{$region->id}}">{{$region->_name}}</span></td>
                                    <td  class="am-text-middle">null</td>
                                    <td  class="am-text-middle">null</td>
                                    <td  class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="javascript:;" class="edit">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="javascript:;" class="tpl-table-black-operation-del delete">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <p>暂无数据</p>
                            @endforelse





                            <!-- more data -->
                            </tbody>
                        </table>

                        {{--分页--}}
                        {{$data->links()}}

                        {{--<ul class="am-pagination am-pagination-centered">--}}
                            {{--<li class="am-disabled"><a href="#">&laquo;</a></li>--}}
                            {{--<li class="am-active"><a href="#">1</a></li>--}}
                            {{--<li><a href="#">2</a></li>--}}
                            {{--<li><a href="#">3</a></li>--}}
                            {{--<li><a href="#">4</a></li>--}}
                            {{--<li><a href="#">5</a></li>--}}
                            {{--<li><a href="#">&raquo;</a></li>--}}
                        {{--</ul>--}}


                    </div>
                </div>
            </div>

        </div>
    </div>
    <script>

            function updateRegion(id,name) {
                $.ajax({
                    url:'{{url("manage/op/")}}/'+URL_END+'/update',
                    type:'POST', //GET
                    async:true,    //或false,是否异步
                    data:{
                        name:name,
                        id:id,
                        _token:token
                    },
                    timeout:5000,    //超时时间
                    dataType:'json',    //返回的数据格式：json/xml/html/script/jsonp/text
                    beforeSend:function(xhr){
                        console.log(xhr)
                        console.log('发送前')

                    },
                    success:function(data,textStatus,jqXHR){
                        console.log(data)
                        if(data.code == 0)
                        {
                            mesModal("提示","修改"+" 区域为"+data.name+" 成功",function () {

                                $("#table").children("[data-id='"+data.id+"']").attr("data-name",data.name).find(".nm").text(data.name);
                            });
                        }
                        else{
                            mesModal("提示","修改失败"+data.message,function () {
                            });
                        }
                    },
                    error:function(xhr,textStatus){
                        console.log('错误')
                        console.log(xhr)
                        console.log(textStatus)
                        mesModal("提示","提交失败"+JSON.stringify( xhr.responseJSON.errors));
                    },
                    complete:function(){
                        console.log('结束')
                    }
                })
            }
            function handleEditClick() {
                $this = $(this);

                var tr = $this.parents("tr");
                var id = tr.attr("data-id");
                var name = tr.attr("data-name");

                this.chooseId = id;
                this.name = name;

                $('#update-prompt').find(".title").text("修改区域"+name)
                        .end().find(".am-modal-prompt-input").val(name)
                        .end().modal({
                    relatedTarget: this,
                    onConfirm: function(e) {
//                        alert('你输入的是：' + e.data || '');

                        updateRegion(this.relatedTarget.chooseId,e.data);

                    },
                    onCancel: function(e) {

                    }
                });
            }
            $(".edit").on("click",handleEditClick)


    </script>
@stop