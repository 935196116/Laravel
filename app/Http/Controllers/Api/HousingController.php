<?php
/**
 * Created by PhpStorm.
 * User: hakusakaitekimac
 * Date: 2018/3/7
 * Time: 下午2:56
 */


namespace App\Http\Controllers\Api;
use App\Models\Housing;
use App\Http\Requests\Api\HousingRequest;
use Illuminate\Support\Facades\DB;
use Illuminate\Session\TokenMismatchException;
class HousingController extends Controller{

    public function get(){
        return Housing::where('parent_id','!=',0)->select('id','_name as name','parent_id')->orderBy("name","desc")->get();
    }
    public function getList(){
        return response()->json($this->get());
    }
    public function getByRegion($pid){
//        $pid = $req->parentId;
        return response()->json(Housing::where('parent_id',$pid)->select('id','_name as name','parent_id')->orderBy("name","desc")->get());
    }
    public function update(HousingRequest $req)
    {
        $id=$req->id;

        $item = Housing::where('id',$id)->get();

        if('其它' == $item[0]->_name)
        {
            $data = [
                'code'=>-1,
                'mes'=>"无法修改其它的类别"
            ];
            return response()->json($data);
        }

        $name=$req->name;
        $parentId=$req->parentId;
        $parentNm=$req->pname;

//        echo $id.$name.$parentId;

        $flag=Housing::where('id',$id)->update([
            '_name'=>$name,
            'parent_id'=>$parentId
        ]);


        $code = $flag>0?0:-1;
        $data = [
            'code'=>$code,
            'id'=>$id,
            'name'=>$name,
            'parentId'=>$parentId
        ];
        return response()->json($data);
    }
    public function add(HousingRequest $req){

        $new = Housing::create([
            'parent_id'=>$req->parentId,
            '_name'=>$req->name,
        ]);
        $data = [
            'code'=>0,
            'id'=>$new->id,
            'name'=>$req->name,
            'pid'=>$req->parentId
        ];
//        dd($new);
        return response()->json($data);

    }


    public function delete(){

    }
}