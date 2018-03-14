<?php
/**
 * Created by PhpStorm.
 * User: hakusakaitekimac
 * Date: 2018/3/7
 * Time: 下午2:56
 */


namespace App\Http\Controllers\Api;
use App\Models\Region;
use App\Models\Housing;
use App\Http\Requests\Api\RegionRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Session\TokenMismatchException;
class RegionController extends Controller{

    public  function get(){
        return Region::where('parent_id',0)->select('id','_name as name')->orderBy("name","desc")->get();
    }
    public function getList(){
        return response()->json(Region::where('parent_id',0)->orderBy("_name as name","desc")->get());
    }
    public function update(RegionRequest $req)
    {
        $id=$req->id;

        $name=$req->name;

        $flag = Region::where('id',$id)->update([
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
    public function add(RegionRequest $req){


        $new = Region::create([
            '_name'=>$req->name,
            'parent_id'=>0,
        ]);
        DB::table("region_list")->insert([
            "_name"=>"其它",
            "parent_id"=>$new->id,
            "id"=>-1
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