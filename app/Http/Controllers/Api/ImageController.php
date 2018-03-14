<?php
/**
 * Created by PhpStorm.
 * User: hakusakaitekimac
 * Date: 2018/3/14
 * Time: 下午5:52
 */

/**
 * Created by PhpStorm.
 * User: hakusakaitekimac
 * Date: 2018/3/7
 * Time: 下午2:56
 */


namespace App\Http\Controllers\Api;
use App\Models\HouseStyle;
use App\Models\Housing;
use App\Http\Requests\Api\StyleRequest;

class ImageController extends Controller{

    public  function get($req){
        $size = $req->params;
    }


}