
@extends('admin/index')

@section('title')
    房源发布
@stop
@section('head')
    <style>
        .am-gallery-item{
            border: 1px solid #888;
            width:100px;
            height: 60px;

        }
        .am-gallery-item:after{
            content: "" attr(progress) "%";
            display: flex;
            justify-content: center;
            align-items: center;
            width: 100%;
            height: 100%;


        }
        .am-gallery-item img{
            position: absolute;
            top: 50%;
            left: 50%;
            margin-left: -50px;
        }
        .img-list li div{
            overflow: hidden;
        }
    </style>
    <script src="/admin/js/tools.js"></script>
    <script>
        var URL_END = "house";
        var token = "{{csrf_token()}}";
        var url = '{{url("manage/op/")}}/'+URL_END+"/";
    </script>
@stop
@section('content')
    <!-- 内容区域 -->

    <div class="row">

        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-fl">房源录入</div>
                    <div class="widget-function am-fr">
                        <a href="javascript:;" class="am-icon-cog"></a>
                    </div>
                </div>
                <div class="widget-body am-fr">

                    {{--谨慎在这里添加表单数据 属性中含有submit的元素 ajax 解析的时候 用是否含有submit区分是否为发送的数据 --}}
                    <form class="am-form tpl-form-line-form">

                        <input type="hidden" name="_token" value="{{csrf_token()}}" submit>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">标题 <span class="tpl-form-line-small-title">Title</span></label>
                            <div class="am-u-sm-9">
                                <input submit name="title" type="text" class="tpl-form-input" id="user-name" placeholder="请输入标题文字">
                                <small>请填写标题文字10-20字左右。</small>
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-phone" class="am-u-sm-3 am-form-label">区域 <span class="tpl-form-line-small-title">Region</span></label>
                            <div class="am-u-sm-9">
                                <select submit name="region" id="region-select" data-am-selected="{searchBox: 0}" style="display: none;">
                                    <option>加载中..</option>
                                </select>

                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-phone" class="am-u-sm-3 am-form-label">小区 <span class="tpl-form-line-small-title">Housing</span></label>
                            <div class="am-u-sm-9">
                                <select submit name="housing" id="housing-select" data-am-selected="{searchBox: 0}" style="display: none;">
                                    <option>加载中..</option>
                                </select>

                            </div>
                        </div>
                        <script>

                            (function () {
                                tools.getOptionData('http://jyxb.com/api/region',$("#region-select"));
                                $("#region-select").on("change",function () {

                                    var selected=$(this).children('option:selected');
                                    var r =this;
                                    r.pid = selected.val();
                                    r.pname = selected.text();
//
                                    tools.getOptionData('http://jyxb.com/api/region/housing/'+r.pid,$("#housing-select"));
                                })
//

                            })()

                        </script>
                        <div class="am-form-group">
                            <label for="user-phone" class="am-u-sm-3 am-form-label">户型 <span class="tpl-form-line-small-title">Housing</span></label>
                            <div class="am-u-sm-9">
                                <select submit name="style" id="style-select" data-am-selected="{searchBox: 0}" style="display: none;">
                                    <option>加载中..</option>
                                    {{--<option value="b">一室一厅</option>--}}
                                    {{--<option value="o">两室一厅</option>--}}
                                    {{--<option value="o">其它</option>--}}
                                </select>

                                <script>
                                    (function () {
                                        tools.getOptionData('http://jyxb.com/api/style',$("#style-select"));

                                    })()

                                </script>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-phone" class="am-u-sm-3 am-form-label">装修 <span class="tpl-form-line-small-title">Decoration</span></label>
                            <div class="am-u-sm-9">
                                <select submit name="decorate" id="deco-select" data-am-selected="{searchBox: 0}" style="display: none;">
                                    <option>加载中..</option>
                                </select>

                                <script>
                                    (function () {
                                        tools.getOptionData('http://jyxb.com/api/deco',$("#deco-select"));

                                    })()

                                </script>
                            </div>
                        </div>


                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">详细地址 <span class="tpl-form-line-small-title">Address</span></label>
                            <div class="am-u-sm-9">
                                <input submit name="address" type="text" placeholder="请输入详细地址(例如: 地址/栋/房间号 )">
                            </div>
                        </div>


                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">业主姓名 <span class="tpl-form-line-small-title">Name</span></label>
                            <div class="am-u-sm-9">
                                <input submit name="host_name" type="text" placeholder="请输入业主姓名">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">业主电话 <span class="tpl-form-line-small-title">Phone</span></label>
                            <div class="am-u-sm-9">
                                <input submit name="host_tel" type="text" placeholder="请输入业主联系电话">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">面积 <span class="tpl-form-line-small-title">Area</span></label>
                            <div class="am-u-sm-9">
                                <input submit name="area" type="text" placeholder="请输入面积(单位:㎡)">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label class="am-u-sm-3 am-form-label">价格 <span class="tpl-form-line-small-title">Price</span></label>
                            <div class="am-u-sm-9">
                                <input submit name="price" type="text" placeholder="请输入价格,添0是面议(单位:万元)">
                            </div>
                        </div>

                        <div class="am-form-group">
                            <label for="user-weibo" class="am-u-sm-3 am-form-label">房源图片 <span class="tpl-form-line-small-title">Images</span></label>
                            <div class="am-u-sm-9">
                                <div class="am-form-group am-form-file">

                                    {{--图片列表--}}
                                    <ul data-am-widget="gallery" class="am-gallery am-avg-sm-2
  am-avg-md-3 am-avg-lg-4 am-gallery-overlay img-list" data-am-gallery="{ pureview: true }" >
                                        {{--<li>--}}
                                            {{--<div progress="10" class="am-gallery-item">--}}
                                                {{--<a href="http://s.amazeui.org/media/i/demos/bing-1.jpg" class="">--}}
                                                    {{--<img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"  alt="远方 有一个地方 那里种有我们的梦想"/>--}}

                                                {{--</a>--}}
                                                {{--<svg class="icon" width="18px" height="18px" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M981.671173 312.397934c-25.782498-60.159162-62.737412-116.021241-109.145908-162.429738S770.254689 65.74537 709.23611 39.962872c-125.474824-53.28383-272.435063-53.28383-397.909886 0-60.159162 25.782498-116.021241 62.737412-162.429738 109.145908S65.533075 252.238773 39.750578 312.397934C13.96808 375.135346 0.217414 442.169841 0.217414 512.642003s13.750665 137.506656 39.533163 200.244068c25.782498 60.159162 62.737412 116.021241 109.145908 162.429738 46.408496 46.408496 102.270576 83.36341 162.429738 109.145908 62.737412 25.782498 130.631324 39.533163 200.244068 39.533163s134.928406-13.750665 200.244068-39.533163c60.159162-25.782498 116.021241-62.737412 162.429738-109.145908 46.408496-46.408496 83.36341-102.270576 109.145908-162.429738 25.782498-62.737412 39.533163-130.631324 39.533163-200.244068S1007.453671 375.135346 981.671173 312.397934zM936.981509 693.978905c-23.204248 55.862079-55.862079 104.848826-99.692326 148.679072-42.111413 42.111413-92.816993 76.488078-148.679072 99.692326-114.302407 48.986746-246.652565 48.986746-362.673806 0-55.862079-23.204248-104.848826-58.440329-148.679072-99.692326-42.111413-42.111413-76.488078-92.816993-99.692326-148.679072-23.204248-58.440329-36.954914-118.599491-36.954914-181.336902 0-62.737412 12.031833-122.896574 36.954914-181.336902 23.204248-55.862079 55.862079-104.848826 99.692326-148.679072 42.111413-42.111413 92.816993-76.488078 148.679072-99.692326C383.517218 58.870038 444.535797 45.119371 507.273209 45.119371s122.896574 12.031833 181.336902 36.954914c55.862079 23.204248 104.848826 55.862079 148.679072 99.692326 42.111413 42.111413 76.488078 92.816993 99.692326 148.679072 23.204248 58.440329 36.954914 118.599491 36.954914 181.336902C974.79584 575.379414 962.764007 635.538576 936.981509 693.978905zM753.925773 300.366102 718.689693 268.567688 509.851459 479.984172 293.278475 263.411188 260.620644 296.069019 477.193628 512.642003 264.917727 724.058487 297.575558 756.716317 509.851459 545.299834 725.565025 761.0134 758.222856 728.355569 541.649873 512.642003Z" fill="#ffffff" /></svg>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<div class="am-gallery-item">--}}
                                                {{--<a href="http://s.amazeui.org/media/i/demos/bing-1.jpg" class="">--}}
                                                    {{--<img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"  alt="远方 有一个地方 那里种有我们的梦想"/>--}}

                                                {{--</a>--}}
                                                {{--<svg class="icon" width="18px" height="18px" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M981.671173 312.397934c-25.782498-60.159162-62.737412-116.021241-109.145908-162.429738S770.254689 65.74537 709.23611 39.962872c-125.474824-53.28383-272.435063-53.28383-397.909886 0-60.159162 25.782498-116.021241 62.737412-162.429738 109.145908S65.533075 252.238773 39.750578 312.397934C13.96808 375.135346 0.217414 442.169841 0.217414 512.642003s13.750665 137.506656 39.533163 200.244068c25.782498 60.159162 62.737412 116.021241 109.145908 162.429738 46.408496 46.408496 102.270576 83.36341 162.429738 109.145908 62.737412 25.782498 130.631324 39.533163 200.244068 39.533163s134.928406-13.750665 200.244068-39.533163c60.159162-25.782498 116.021241-62.737412 162.429738-109.145908 46.408496-46.408496 83.36341-102.270576 109.145908-162.429738 25.782498-62.737412 39.533163-130.631324 39.533163-200.244068S1007.453671 375.135346 981.671173 312.397934zM936.981509 693.978905c-23.204248 55.862079-55.862079 104.848826-99.692326 148.679072-42.111413 42.111413-92.816993 76.488078-148.679072 99.692326-114.302407 48.986746-246.652565 48.986746-362.673806 0-55.862079-23.204248-104.848826-58.440329-148.679072-99.692326-42.111413-42.111413-76.488078-92.816993-99.692326-148.679072-23.204248-58.440329-36.954914-118.599491-36.954914-181.336902 0-62.737412 12.031833-122.896574 36.954914-181.336902 23.204248-55.862079 55.862079-104.848826 99.692326-148.679072 42.111413-42.111413 92.816993-76.488078 148.679072-99.692326C383.517218 58.870038 444.535797 45.119371 507.273209 45.119371s122.896574 12.031833 181.336902 36.954914c55.862079 23.204248 104.848826 55.862079 148.679072 99.692326 42.111413 42.111413 76.488078 92.816993 99.692326 148.679072 23.204248 58.440329 36.954914 118.599491 36.954914 181.336902C974.79584 575.379414 962.764007 635.538576 936.981509 693.978905zM753.925773 300.366102 718.689693 268.567688 509.851459 479.984172 293.278475 263.411188 260.620644 296.069019 477.193628 512.642003 264.917727 724.058487 297.575558 756.716317 509.851459 545.299834 725.565025 761.0134 758.222856 728.355569 541.649873 512.642003Z" fill="#ffffff" /></svg>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}
                                        {{--<li>--}}
                                            {{--<div class="am-gallery-item">--}}
                                                {{--<a href="http://s.amazeui.org/media/i/demos/bing-1.jpg" class="">--}}
                                                    {{--<img src="http://s.amazeui.org/media/i/demos/bing-1.jpg"  alt="远方 有一个地方 那里种有我们的梦想"/>--}}

                                                {{--</a>--}}
                                                {{--<svg class="icon" width="18px" height="18px" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M981.671173 312.397934c-25.782498-60.159162-62.737412-116.021241-109.145908-162.429738S770.254689 65.74537 709.23611 39.962872c-125.474824-53.28383-272.435063-53.28383-397.909886 0-60.159162 25.782498-116.021241 62.737412-162.429738 109.145908S65.533075 252.238773 39.750578 312.397934C13.96808 375.135346 0.217414 442.169841 0.217414 512.642003s13.750665 137.506656 39.533163 200.244068c25.782498 60.159162 62.737412 116.021241 109.145908 162.429738 46.408496 46.408496 102.270576 83.36341 162.429738 109.145908 62.737412 25.782498 130.631324 39.533163 200.244068 39.533163s134.928406-13.750665 200.244068-39.533163c60.159162-25.782498 116.021241-62.737412 162.429738-109.145908 46.408496-46.408496 83.36341-102.270576 109.145908-162.429738 25.782498-62.737412 39.533163-130.631324 39.533163-200.244068S1007.453671 375.135346 981.671173 312.397934zM936.981509 693.978905c-23.204248 55.862079-55.862079 104.848826-99.692326 148.679072-42.111413 42.111413-92.816993 76.488078-148.679072 99.692326-114.302407 48.986746-246.652565 48.986746-362.673806 0-55.862079-23.204248-104.848826-58.440329-148.679072-99.692326-42.111413-42.111413-76.488078-92.816993-99.692326-148.679072-23.204248-58.440329-36.954914-118.599491-36.954914-181.336902 0-62.737412 12.031833-122.896574 36.954914-181.336902 23.204248-55.862079 55.862079-104.848826 99.692326-148.679072 42.111413-42.111413 92.816993-76.488078 148.679072-99.692326C383.517218 58.870038 444.535797 45.119371 507.273209 45.119371s122.896574 12.031833 181.336902 36.954914c55.862079 23.204248 104.848826 55.862079 148.679072 99.692326 42.111413 42.111413 76.488078 92.816993 99.692326 148.679072 23.204248 58.440329 36.954914 118.599491 36.954914 181.336902C974.79584 575.379414 962.764007 635.538576 936.981509 693.978905zM753.925773 300.366102 718.689693 268.567688 509.851459 479.984172 293.278475 263.411188 260.620644 296.069019 477.193628 512.642003 264.917727 724.058487 297.575558 756.716317 509.851459 545.299834 725.565025 761.0134 758.222856 728.355569 541.649873 512.642003Z" fill="#ffffff" /></svg>--}}
                                            {{--</div>--}}
                                        {{--</li>--}}


                                    </ul>
                                    {{--图片列表结束--}}

                                    {{--<input id="doc-form-file" type="file" multiple="">--}}
                                    <button type="button" style="margin-left: 10px;" class="am-btn am-btn-danger am-btn-sm" id="upload" >
                                        <i class="am-icon-cloud-upload"></i> 添加图片

                                        <input type="file" name="imgs" style="display: none" id="file" multiple>



                                    </button>


                                    <script>
                                        (function () {
                                            $(file).on("change",uploadImage)

                                            function handleUploadClick() {
                                                $this = $(this);


                                                file.click();

//                                                console.log()

                                            }
                                            function uploadImage(){

                                                var files = $("#file").get(0).files;
                                                var imgList = $(".img-list");
                                                files = Array.prototype.slice.apply(files);


                                                files.forEach(function (file,index) {
                                                    var imgName = file.name;
                                                    var idx = imgName.lastIndexOf(".");
                                                    if (idx != -1){
                                                        ext = imgName.substr(idx+1).toUpperCase();
                                                        ext = ext.toLowerCase( );
                                                        // alert("ext="+ext);
                                                        if (ext != 'jpg' && ext != 'png' && ext != 'jpeg' && ext != 'gif'){
//                                                        document.all.submit_upload.disabled=true;
                                                            alert("只能上传.jpg  .png  .jpeg  .gif类型的文件!");
                                                            return;
                                                        }
                                                        //如果符合条件
                                                        //生成formData对象
                                                        var formData = new FormData();
                                                        //file要append进去
                                                        formData.append("img",file);
                                                        var li = $('  <li idx="'+index+'"> ' +
                                                                '<div progress="0" class="am-gallery-item"> ' +
//                                                            '<a href="http://s.amazeui.org/media/i/demos/bing-1.jpg" class=""> ' +
//                                                            '<img src=""  alt=""/> ' +
//                                                            '</a> ' +
                                                                '<svg class="icon delete-img" width="18px" height="18px" viewBox="0 0 1024 1024" version="1.1" xmlns="http://www.w3.org/2000/svg"><path d="M981.671173 312.397934c-25.782498-60.159162-62.737412-116.021241-109.145908-162.429738S770.254689 65.74537 709.23611 39.962872c-125.474824-53.28383-272.435063-53.28383-397.909886 0-60.159162 25.782498-116.021241 62.737412-162.429738 109.145908S65.533075 252.238773 39.750578 312.397934C13.96808 375.135346 0.217414 442.169841 0.217414 512.642003s13.750665 137.506656 39.533163 200.244068c25.782498 60.159162 62.737412 116.021241 109.145908 162.429738 46.408496 46.408496 102.270576 83.36341 162.429738 109.145908 62.737412 25.782498 130.631324 39.533163 200.244068 39.533163s134.928406-13.750665 200.244068-39.533163c60.159162-25.782498 116.021241-62.737412 162.429738-109.145908 46.408496-46.408496 83.36341-102.270576 109.145908-162.429738 25.782498-62.737412 39.533163-130.631324 39.533163-200.244068S1007.453671 375.135346 981.671173 312.397934zM936.981509 693.978905c-23.204248 55.862079-55.862079 104.848826-99.692326 148.679072-42.111413 42.111413-92.816993 76.488078-148.679072 99.692326-114.302407 48.986746-246.652565 48.986746-362.673806 0-55.862079-23.204248-104.848826-58.440329-148.679072-99.692326-42.111413-42.111413-76.488078-92.816993-99.692326-148.679072-23.204248-58.440329-36.954914-118.599491-36.954914-181.336902 0-62.737412 12.031833-122.896574 36.954914-181.336902 23.204248-55.862079 55.862079-104.848826 99.692326-148.679072 42.111413-42.111413 92.816993-76.488078 148.679072-99.692326C383.517218 58.870038 444.535797 45.119371 507.273209 45.119371s122.896574 12.031833 181.336902 36.954914c55.862079 23.204248 104.848826 55.862079 148.679072 99.692326 42.111413 42.111413 76.488078 92.816993 99.692326 148.679072 23.204248 58.440329 36.954914 118.599491 36.954914 181.336902C974.79584 575.379414 962.764007 635.538576 936.981509 693.978905zM753.925773 300.366102 718.689693 268.567688 509.851459 479.984172 293.278475 263.411188 260.620644 296.069019 477.193628 512.642003 264.917727 724.058487 297.575558 756.716317 509.851459 545.299834 725.565025 761.0134 758.222856 728.355569 541.649873 512.642003Z" fill="#ffffff" /></svg> ' +
                                                                '</div> ' +
                                                                '</li>');

                                                        imgList.append(li);
                                                        upload(formData,li);
                                                    } else {
//                                                    document.all.submit_upload.disabled=true;
                                                        alert("只能上传.jpg  .png  .jpeg  .gif类型的文件!");
                                                        return;
                                                    }
                                                });




                                                function upload(formData,li) {

                                                    var onprogress = progressHandlingFunction(li);

                                                    var success = uploadSuccess(li);
                                                    var error  = uploadError(li);
                                                    //do:上传
                                                    tools.upload(formData,success,onprogress,error);



                                                }


                                            }
                                            function uploadError(li) {
                                                var el =li;
                                                return function (data) {
                                                    el.children("div").attr("progress","上传失败,格式不对");
                                                    el.find("svg").on("click",function () {
                                                        el.remove();
                                                    })
                                                }
                                            }
                                            function uploadSuccess(li) {
                                                var el =li;
                                                console.log(el.attr('idx'));
                                                return function (data) {
                                                    var img = '<img width="100" images='+data.name+' src="'+data.path+'"  alt=""/>';
                                                    var img = $(img);
                                                    img.on("load",function () {
                                                        el.children("div").append(img);
                                                        img.css("margin-top",-(img.height()/2) + "px");
                                                        el.find("svg").on("click",function () {
                                                            el.remove();
                                                            //删除画廊元素
                                                            $("li[data-src='"+img[0].currentSrc+"']").remove();
                                                        })

                                                    });


                                                }



                                            }
                                            function progressHandlingFunction(li){
                                                var el =li;
                                                return function (evt) {
                                                    var percent = evt.loaded / evt.total*100;
                                                    el.children("div").attr("progress",percent);

//                                                    console.log(percent);
                                                }

                                            }
                                            $('#upload').on("click",handleUploadClick);
                                        })()


                                    </script>



                                </div>

                            </div>
                        </div>



                        {{--<div class="am-form-group">--}}
                            {{--<label for="user-intro" class="am-u-sm-3 am-form-label">隐藏文章</label>--}}
                            {{--<div class="am-u-sm-9">--}}
                                {{--<div class="tpl-switch">--}}
                                    {{--<input type="checkbox" class="ios-switch bigswitch tpl-switch-btn" checked="">--}}
                                    {{--<div class="tpl-switch-btn-view">--}}
                                        {{--<div>--}}
                                        {{--</div>--}}
                                    {{--</div>--}}
                                {{--</div>--}}

                            {{--</div>--}}
                        {{--</div>--}}

                        <div class="am-form-group">
                            <label for="user-intro" class="am-u-sm-3 am-form-label">详细信息 <span class="tpl-form-line-small-title">Detail</span></label>
                            <div class="am-u-sm-9">
                                <textarea submit name="detail" class="" rows="10" id="user-intro" placeholder="请输入详细信息"></textarea>
                            </div>
                        </div>

                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                                <button type="button" id="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script>
        $("#submit").on("click",add);
        function add() {
            var data = {};
            var submits = $("[submit]");
            submits =  Array.prototype.slice.apply(submits);
            submits.forEach(function (item) {
                item = $(item);
                data[item.attr("name")]=item.val();
            });
            var  images = $("img[images]");
            images =  Array.prototype.slice.apply(images);
            var imgs ="";
            images.forEach(function (item) {

                imgs+=item.getAttribute("images") +"|";
            });
            data.imgs = imgs;


//             data.title = $("input[name='title']").val();
//             data.region = $("select[name='region']").val();
//             data.housing = $("select[name='housing']").val();
//             data.style = $("select[name='style']").val();
//             data.decorate = $("select[name='decorate']").val();
//
//             data.address = $("input[name='address']").val();
//             data.host_name = $("input[name='host_name']").val();
//             data.host_tel = $("input[name='host_tel']").val();
//             data.price = $("input[name='price']").val();
//             data.vr_url =   $("input[name='vr_url']").val();
//             data.detail =   $("textarea[name='detail']").val();
//             data._token = token;
            console.log(data);

            $.ajax({
                url:url+"add",
                type:'POST', //GET
                async:true,    //或false,是否异步
                data:data,
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
                        mesModal("提示","新增"+" 成功",function () {
//                            $("#table").children("[data-id='"+data.id+"']").attr("data-name",data.name).find(".nm").text(data.name);
                        });
                    }
                    else{
                        mesModal("提示","添加失败,该条目可能已经不存在!",function () {
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


    </script>
@stop