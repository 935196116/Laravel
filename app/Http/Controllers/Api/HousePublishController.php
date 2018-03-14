<?php
/**
 * Created by PhpStorm.
 * User: hakusakaitekimac
 * Date: 2018/3/7
 * Time: 下午2:56
 */


namespace App\Http\Controllers\Api;
use App\Handlers\ImageUploadHandler;
use App\Models\Houses;
use App\Models\HousesList;
use App\Http\Requests\Api\HouseRequest;

use \Illuminate\Http\Request;
use Auth;

class HousePublishController extends Controller{

    public function __construct()
    {
        $this->middleware('auth');
    }
    public  function getPrivate(Request $req){
        return Houses::where("id",$req->id)->orderBy("updated_at","desc")->first();
    }

    public function update(DecorateRequest $req)
    {
        $id=$req->id;

        $name=$req->name;

        $flag = HouseDecorate::where('id',$id)->update([
            '_name'=>$name
        ]);

        $code = $flag>0?0:-1;
        $data = [
            'code'=>$code,
            'id'=>$id,
            'name'=>$name
        ];
        return response()->json($data);
    }
    public function add(HouseRequest $req,ImageUploadHandler $saveHandler){
//        dd("132");

//        $house->setTable("house_list");




        $id = str_random(32);
        $new = HousesList::create([
            'id'=>$id,
            'title'=>$req->title,
            'region'=>$req->region,
            'housing'=>isset($req["housing"])?$req["housing"]:0,
            'style'=>$req->style,
            'decorate'=>$req->decorate,
            'address'=>$req->address,
            'host_name'=>$req->host_name,
            'host_tel'=>$req->host_tel,
            'price'=>$req->price,
            'vr_url'=>isset($req["vr_url"])?$req["vr_url"]:"",
            'detail'=>isset($req["detail"])?$req["detail"]:"",
            'imgs'=>isset($req["imgs"])?$req["imgs"]:"",
            'area'=>$req->area,
            'agent'=>Auth::id()
        ]);




        $imgs  = explode("|",$req["imgs"]);
        foreach ($imgs as $img)
        {
            if($img!="")
                $saveHandler->true_save($img,"houses");
        }

        $data = [
            'code'=>0,
            'id'=>$new->id,
        ];
//        dd($new);
        return response()->json($data);

    }
    public function uploadImg(Request $req, ImageUploadHandler $uploader)
    {

        $file = $req->img;


        $result = $uploader->save($file, 'tmp', "xiaobai", 818);
        $data = [
            'code' => 0,
            'path' => $result['path'],
            'name'=> $result['name'],
        ];
        return response()->json($data);
    }
    public function delete(){

    }
}