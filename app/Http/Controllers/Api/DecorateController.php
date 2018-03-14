<?php
/**
 * Created by PhpStorm.
 * User: hakusakaitekimac
 * Date: 2018/3/7
 * Time: 下午2:56
 */


namespace App\Http\Controllers\Api;
use App\Models\HouseDecorate;
use App\Models\Housing;
use App\Http\Requests\Api\DecorateRequest;

class DecorateController extends Controller{

    public  function get(){
        return HouseDecorate::select('id','_name as name')->orderBy("name","desc")->get();
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
    public function add(DecorateRequest $req){

        $new = HouseDecorate::create([
            '_name'=>$req->name,
        ]);

        $data = [
            'code'=>0,
            'id'=>$new->id,
            'name'=>$req->name
        ];
//        dd($new);
        return response()->json($data);

    }

    public function delete(){

    }
}