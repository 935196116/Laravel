
@extends('admin/index')

@section('title')
    房源管理
@stop
@section("head")
    <style>
        .am-slides{
            display: flex;
            align-items: center;
        }
    </style>
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
                                {{--<th>房源图片</th>--}}
                                <th class="title">标题</th>
                                <th>区域</th>
                                <th>面积</th>
                                <th>价格</th>
                                <th>户型</th>
                                <th>装修</th>
                                {{--<th>经纪人</th>--}}
                                <th>时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <script>
                                var URL_END = "house";
                                var token = "{{csrf_token()}}";
                                var url = '{{url("manage/op/")}}/'+URL_END+"/";
                            </script>
                            <script>
                                function getData(id) {
                                    var u = '{{url("uploads/images/houses/")}}'+"/";
                                    $.ajax({
                                        url:url+"get",
                                        type:'POST', //GET
                                        async:true,    //或false,是否异步
                                        data:{
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
                                            console.log(data);
                                            var img_name_array = data.imgs && data.imgs.split("|");
                                            var img_name_array = img_name_array && img_name_array.map(function (item) {
                                                if(item)
                                                   return {
                                                       src:u+item,
                                                       desc:""
                                                   }
                                                else
                                                    return {
                                                        src:"",
                                                        desc:""
                                                    }
                                            });
                                            var data = {
                                                title:data.title,
                                                house:{
                                                    region:data.region,
                                                    housing:data.housing,
                                                    area:data.area,
                                                    price:data.price,
                                                    address:data.address
                                                },
                                                host:{
                                                    name:data.host_name,
                                                    phone:data.host_tel,
                                                    desc:data.detail
                                                },
                                                imgs:img_name_array
//                                                imgs:[
//                                                    {
//                                                        src:"https://fshouse.fangdd.com/ddjj/Frm7_oZ76ybqAJy6ZhrtY1_N2Mtf.jpg-fdd800",
//                                                        desc:"客厅"
//                                                    },
//                                                    {
//                                                        src:"https://fshouse.fangdd.com/ddjj/Fj0qUIA-JlWuHswygoFurO7jfHAa.jpg-fdd800",
//                                                        desc:"卧室"
//                                                    },
//                                                    {
//                                                        src:"https://fshouse.fangdd.com/ddjj/Frbq631xbxxwsgCReyZwDAx23Y-Y.jpg-fdd800",
//                                                        desc:"厨房"
//                                                    },
//                                                    {
//                                                        src:"https://fshouse.fangdd.com/ddjj/Ft7m_PofdghNSroaLhV2Vt1a8_WY.jpg-fdd800",
//
//
//                                                    }
//
//                                                ]
                                            }
                                            showModalContent(data);

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
                                    });


                                }
                            </script>
                            @forelse($data as $house)
                                <tr class="gradeX">
                                    {{--<td>--}}
                                        {{--<img src="https://fshouse.fangdd.com/ddjj/Frm7_oZ76ybqAJy6ZhrtY1_N2Mtf.jpg-fdd800" class="tpl-table-line-img" alt="">--}}
                                    {{--</td>--}}
                                    <td  class="title am-text-middle"><a title="{{$house->title}}" href="javascript:getData('{{$house->id}}');">{{$house->title}}</a></td>

                                    <td  class="am-text-middle">{{$house->region."-".$house->housing}}</td>
                                    <td  class="am-text-middle">{{$house->area}}㎡</td>
                                    <td  class="am-text-middle">{{$house->price}}万</td>
                                    <td  class="am-text-middle">{{$house->style}}</td>
                                    <td  class="am-text-middle">{{$house->decorate}}</td>
                                    {{--<td  class="am-text-middle"><a href="">张鹏飞</a></td>--}}
                                    <td  class="am-text-middle">{{ date('Y-m-d',time($house->updated_at))}}</td>
                                    <td  class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="javascript:;">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="javascript:;" class="tpl-table-black-operation-del">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                            <a href="javascript:;" class="tpl-table-black-operation-lock">
                                                <i class="am-icon-lock"></i> 受理
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="10">暂无数据</td>
                                </tr>
                            @endforelse



                            <!-- more data -->
                            </tbody>
                        </table>


                        {{--<ul class="am-pagination am-pagination-centered">--}}
                            {{--<li class="am-disabled"><a href="#">&laquo;</a></li>--}}
                            {{--<li class="am-active"><a href="#">1</a></li>--}}
                            {{--<li><a href="#">2</a></li>--}}
                            {{--<li><a href="#">3</a></li>--}}
                            {{--<li><a href="#">4</a></li>--}}
                            {{--<li><a href="#">5</a></li>--}}
                            {{--<li><a href="#">&raquo;</a></li>--}}
                        {{--</ul>--}}
                        {{$data->links()}}


                    </div>
                </div>
            </div>

        </div>
    </div>
@stop

@section('modal')
    <div class="am-popup" id="my-popup" style="display: block;">
        <div class="am-popup-inner">
            <div class="am-popup-hd">
                <h4 class="am-popup-title"></h4>
                <span data-am-modal-close="" class="am-close">×</span>
            </div>
            <div class="am-popup-bd">
                <section class="am-panel am-panel-default">
                    <header class="am-panel-hd">
                        <h3 class="am-panel-title">房源信息</h3>
                    </header>
                    <div class="am-panel-bd" id="house_info">
                        <p>区域:河南</p>
                        <p>小区:天成国际</p>
                        <p>面积:100㎡</p>
                        <p>价格:40万元</p>
                        <p>详细地址:</p>
                    </div>
                </section>
                <section class="am-panel am-panel-default">

                    <header class="am-panel-hd">
                        <h3 class="am-panel-title"></h3>
                    </header>
                    <div class="am-panel-bd" id="host_info">
                        <p>姓名:</p>
                        <p>电话:</p>
                        <p>描述:</p>
                    </div>


                </section>
                <section class="am-panel am-panel-default">
                    <header class="am-panel-hd">
                        <h3 class="am-panel-title">房源图片</h3>
                    </header>
                    <div class="am-panel-bd">
                        <div data-am-widget="slider" class="am-slider am-slider-c3"  data-am-slider='{"controlNav":false}' >
                            <ul class="am-slides" id="slider-content">
                            </ul>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>

    <script>
        function getHostInfoStr(data) {
            var str="";
            str = "<p>姓名:"+data.name+"</p>"+
                    "<p>电话:"+data.phone+"</p>"+
                    "<p>描述:"+data.desc+"</p>";
            return str;

        }
        function getHouseInfoStr(data) {
            var str="";
            str =  " <p>区域:"+data.region+"</p>"+
                    "<p>小区:"+data.housing+"</p>"+
                    "<p>面积:"+data.area+"</p>"+
                    "<p>价格:"+data.price+"</p>"+
                    "<p>详细地址:"+data.address+"</p>";
            return str;

        }
        function getSliderStr(data) {
            console.log(data);
            var  slider = $('#slider-content');
//                var str = "";
            data.forEach(function (item,index) {
                if(item.src)
                {
                    var desc =item.desc?item.desc:"";
                    var li = $('<li> <img src="'+item.src+'"> <div class="am-slider-desc"><div class="am-slider-counter"><span class="am-active">'+(index+1)+'</span>/'+data.length+'</div>'+desc+'</div> </li>');
                    slider.append(li);
                }

            })
            $('.am-slider').flexslider();

        }

        function showModalContent(data) {
            var  title = $('#my-popup .am-popup-title');

            title.text(data.title);

            var host = $("#host_info");
            var house = $("#house_info");

            host.html(getHostInfoStr(data.host));
            house.html(getHouseInfoStr(data.house));



            $('#my-popup').modal({
                relatedTarget: this,
            });

            getSliderStr(data.imgs)
//        slider.html( getSliderStr(data.imgs));

        }
    </script>
    @stop