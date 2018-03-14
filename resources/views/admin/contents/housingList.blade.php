
@extends('admin/index')
@section('title')
    小区管理
@stop
@section('head')
    <script src="/admin/js/tools.js"></script>
@stop
@section("modal")
    <!-- 模态输入-->
    <div class="am-modal am-modal-prompt" tabindex="-1" id="add-prompt">
        <div class="am-modal-dialog">
            <div class="am-modal-hd title">模态弹出</div>
            <div class="am-modal-bd">
                <div style="display: inline-block;float:none;width:auto;" class="am-u-sm-9">
                    <select id="region-select-add" data-am-selected="{searchBox: 0}" style="display: none;">
                        {{--@forelse($data as $housing)--}}
                            {{--<option value="{{$housing->parent_id}}">{{ $housing->pname}}</option>--}}
                        {{--@empty--}}
                            {{--<span></span>--}}
                        {{--@endforelse--}}

                    </select>
                    <script>
                        (function () {
                            tools.getOptionData('http://jyxb.com/api/region',$("#region-select-add"));
                            $("#region-select-add").on("change",function () {

                                var selected=$(this).children('option:selected');
                                var r =this;
                                r.pid = selected.val();
                                r.pname = selected.text();

                                tools.getOptionData('http://jyxb.com/api/region/housing/'+r.pid,$("#housing-select"));
                            })

                        })()

                    </script>
                </div>
                <input type="text" style="padding: 8px; display: inline-block;margin: 0 10px ; width: 40%;" class="am-modal-prompt-input">
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
                <div style="display: inline-block;float:none;width:auto;" class="am-u-sm-9">
                    <select id="region-select-update" data-am-selected="{searchBox: 0}" style="display: none;">
                        {{--@forelse($data as $housing)--}}
                        {{--<option value="{{$housing->parent_id}}">{{ $housing->pname}}</option>--}}
                        {{--@empty--}}
                        {{--<span></span>--}}
                        {{--@endforelse--}}

                    </select>
                    <script>
                        (function () {
                            tools.getOptionData('http://jyxb.com/api/region',$("#region-select-update"));
                            $("#region-select-update").on("change",function () {

                                var selected=$(this).children('option:selected');
                                var r =this;
                                r.pid = selected.val();
                                r.pname = selected.text();

                                tools.getOptionData('http://jyxb.com/api/region/housing/'+r.pid,$("#housing-select"));
                            })

                        })()

                    </script>
                </div>
                <input type="text" style="padding: 8px; display: inline-block;margin: 0 10px ; width: 40%;" class="am-modal-prompt-input">
            </div>
            <div class="am-modal-footer">
                <span class="am-modal-btn" data-am-modal-cancel>取消</span>
                <span class="am-modal-btn" data-am-modal-confirm>提交</span>
            </div>
        </div>
    </div>
@stop
@section('title')
    小区管理
@stop
@section('content')
    <!-- 内容区域 -->

    <div class="row am-cf">
        <div class="am-u-sm-12 am-u-md-12 widget-margin-bottom-lg ">
            <div class="card-add" id="add">
               ＋ 添加新的小区
            </div>


        </div>


    </div>
    <div class="row am-cf">
        <div class="am-u-sm-12 am-u-md-12  widget-margin-bottom-lg">

            <div class="widget am-cf widget-body-lg">

                <div class="widget-body  am-fr">
                    <div class="am-scrollable-horizontal ">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black  " id="example-r">
                            <thead>
                            <tr>
                                <th>区域</th>
                                <th>小区名</th>
                                <th>热度</th>
                                <th>更新时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody id="table">




                            @forelse($data as $housing)
                                <tr data-id="{{$housing->id}}" data-pid="{{$housing->parent_id}}" data-pname="{{$housing->pname}}" data-name="{{$housing->name}}" class="gradeX">
                                    <td  class="am-text-middle pnm">{{$housing->pname}}</td>
                                    <td  class="am-text-middle"><span class="nm" href="" data-id="{{$housing->id}}">{{$housing->name}}</span></td>
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


                    </div>
                </div>
            </div>

        </div>
    </div>



    <script>
        var URL_END = "housing";
        var token = '{{csrf_token()}}';
        function add(parentId,name,pname) {
            $.ajax({
                url:'{{url("manage/op/")}}/'+URL_END+"/add",
                type:'POST', //GET
                async:true,    //或false,是否异步
                data:{
                    parentId:parentId,
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
                        mesModal("提示","添加"+"小区"+data.name+"成功",function () {
                            var tr = $('<tr data-pname="'+pname+'" data-pid="'+data.pid+'" data-name="'+data.name+'" data-id="'+data.id+'" class="gradeX">'+
                                   ' <td  class="am-text-middle pnm">'+pname+'</td>' +
                                    '<td  class="am-text-middle"><span href="" class="nm" data-id="'+data.id+'">'+data.name+'</span>' +
                                    '</td> <td  class="am-text-middle">null</td> ' +
                                    '<td  class="am-text-middle">null</td> ' +
                                    '<td  class="am-text-middle"><div class="tpl-table-black-operation">' +
                                    ' <a class="edit" href="javascript:;"><i class="am-icon-pencil"></i> 编辑 </a>' +
                                    ' <a href="javascript:;" class="tpl-table-black-operation-del delete"><i class="am-icon-trash"></i> 删除 </a></div> </td> </tr>');
                            $("#table").prepend(tr);
                            tr.find(".edit").on("click",handleEditClick);
//                            $("#table").children("[data-id='"+data.id+"']").find(".nm").text(data.name);
                        });
                    }
                    else{
                        mesModal("提示","提交失败"+data.message,function () {
                        });
                    }
                },
                error:function(xhr,textStatus){
                    console.log('错误')
                    console.log(JSON.stringify( xhr.responseJSON))
                    console.log(textStatus)
                    mesModal("提示","提交失败"+JSON.stringify( xhr.responseJSON));
                },
                complete:function(){
                    console.log('结束')
                }
            })
        }

        function update(id,parentId,name,pname) {
            $.ajax({
                url:'op/'+URL_END+"/update",
                type:'POST', //GET
                async:true,    //或false,是否异步
                data:{
                    id:id,
                    parentId:parentId,
                    name:name,
                    pname:pname,
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
                        mesModal("提示","修改"+"为[ "+pname+" : "+data.name+" ]成功",function () {
//                            var tr = $('<tr data-pid="'+data.pid+'" data-name="'+data.name+'" data-id="'+data.id+'" class="gradeX">'+
//                                    ' <td  class="am-text-middle">'+pname+'</td>' +
//                                    '<td  class="am-text-middle"><span href="" class="nm" data-id="'+data.id+'">'+data.name+'</span>' +
//                                    '</td> <td  class="am-text-middle">null</td> ' +
//                                    '<td  class="am-text-middle">null</td> ' +
//                                    '<td  class="am-text-middle"><div class="tpl-table-black-operation">' +
//                                    ' <a class="edit" href="javascript:;"><i class="am-icon-pencil"></i> 编辑 </a>' +
//                                    ' <a href="javascript:;" class="tpl-table-black-operation-del delete"><i class="am-icon-trash"></i> 删除 </a></div> </td> </tr>');
//                            $("#table").prepend(tr);
//                            tr.find(".edit").on("click",handleEditClick);
                            $("#table").children("[data-id='"+data.id+"']").attr("data-name",data.name).find(".nm").text(data.name).end().find(".pnm").text(pname);
                        });
                    }
                    else{
                        mesModal("提示","提交失败"+data.mes,function () {
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
            var regionSelect = document.getElementById("region-select-update");

            $this = $(this);

            var tr = $this.parents("tr");
            var id = tr.attr("data-id")-0;
            var name = tr.attr("data-name");
            var pid = tr.attr("data-pid")-0;
            var pname = tr.attr("data-pname");
            regionSelect.chooseId = id;
            regionSelect.name = name;
            regionSelect.pid = pid;
            regionSelect.pname = pname;
//            regionSelect.handleConfirm = update;

//            $(regionSelect).children("[value='"+pid+"']").attr("selected",true);

            $(regionSelect).next().find("li[data-value='"+pid+"']").trigger("click");
            $('#update-prompt').find(".title").text("修改["+pname+"]-["+name+"]小区")
                    .end().find(".am-modal-prompt-input").val(name)
                    .end().modal({
                relatedTarget: regionSelect,
                onConfirm: function(e) {
//                        alert('你输入的是：' + e.data || '');
                    var id = this.relatedTarget.chooseId;
                    var name = e.data;
                    var pid = this.relatedTarget.pid;
                    var pname = this.relatedTarget.pname;
                    update(id,pid,name,pname);

                },
                onCancel: function(e) {

                }
            });
        }

        $(".edit").on("click",handleEditClick);


        //增加小区
        $('#add').on('click', function() {

            var regionSelect = document.getElementById("region-select-add");
//            regionSelect.handleConfirm = add;

            this.name = $('#add-prompt .am-modal-prompt-input').val();
            $('#add-prompt').find(".title").text("增加新的小区").end().modal({
                relatedTarget: document.getElementById("region-select-add"),
                onConfirm: function(e) {

                    var pname = this.relatedTarget.pname;
                    var name = e.data;
                    var pid = this.relatedTarget.pid;
                    add(pid,name,pname);

                },
                onCancel: function(e) {

                }
            });

        });


    </script>
@stop