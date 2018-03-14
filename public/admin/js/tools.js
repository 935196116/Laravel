/**
 * Created by hakusakaitekimac on 2018/3/10.
 */

;window.tools={
    //上传
    upload:function (formData,completeHandler,progressHandlingFunction,errorHandler,beforeSendHandler) {
        $.ajax({
            url: '/manage/img/upload',  //server script to process data
            type: 'POST',
            enctype: 'multipart/form-data',
            xhr: function() {  // custom xhr
                myXhr = $.ajaxSettings.xhr();
                if(myXhr.upload){ // check if upload property exists
                    if(typeof progressHandlingFunction == 'function')
                        myXhr.upload.addEventListener('progress',progressHandlingFunction, false); // for handling the progress of the upload
                }
                return myXhr;
            },
            //Ajax事件
            beforeSend: beforeSendHandler || function () {

            },
            success: completeHandler ||function () {

            },
            error: errorHandler || function () {

            },
            // Form数据
            data: formData,
            //Options to tell JQuery not to process data or worry about content-type
            cache: false,
            contentType: false,
            processData: false
        });


    }
    ,

    getOptionData:function(api_url,$element,successCallback,failedCallBack) {
        $.ajax({
            url:api_url,
            dataType:'json',
            beforeSend:function(){
                $element.html(" <option>加载中..</option> ");
            },

            success:function (data) {
                $element.html("");
                data.forEach(function (item) {

                    var op =  '<option value="'+item.id+'">'+item.name+'</option>';
                    $element.append($(op));
                    successCallback && successCallback();
                })
            },
            error:function (data) {
                failedCallBack && failedCallBack(data);
            }
        })
    }
};
