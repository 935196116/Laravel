<?php
/**
 * Created by PhpStorm.
 * User: hakusakaitekimac
 * Date: 2018/3/2
 * Time: 下午1:40
 */
namespace  App\Http\Controllers;

use App\Member;
use App\Models\Houses;
use App\Models\Region;
use App\Models\HouseStyle;
use App\Models\HouseDecorate;

use Illuminate\Support\Facades\DB;

class  ManageController extends Controller{
    private function _getViewName($content)
    {
        $pos = strrpos($content,".");
        if($pos!=false)
            $viewName = substr($content,0,$pos);
        else
            $viewName = $content;

        return $viewName;
    }
    private  function _getData($viewName){
        switch ($viewName)
        {
            //获取区域数据
            case 'regionList':
                return  Region::where('parent_id',0)->select('id','_name')->orderBy("_name","desc")->paginate(10);
            case 'housingList':
                return  DB::table('v_housing')->where('parent_id','>',0)
                    ->orderBy("pname","desc")
                    ->paginate(10);
            case 'styleList':
                return HouseStyle::select('id','_name')->orderBy("_name","desc")->paginate(10);
            case 'decorationList':
                return HouseDecorate::select('id','_name')->orderBy("_name","desc")->paginate(10);
            case 'houseList':
               return Houses::select(
                'id',
                'title',
                'region',
                'housing',
                'area',
                'price',
                'style',
                'decorate',
                'updated_at'
            )->orderBy("updated_at","desc")->paginate(10);

            default:
                 return Houses::select(
                'id',
                'title',
                'region',
                'housing',
                'area',
                'price',
                'style',
                'decorate',
                'updated_at'
            )->orderBy("updated_at","desc")->paginate(10);
        }
    }
    public function  manage($content=""){

        $viewName = $this->_getViewName($content);
        if($viewName!="")
            return view('admin/contents/'.$viewName,[
                'name'=>'小白',
                'data'=>$this->_getData($viewName)
            ]);
        else
            return redirect()->action('ManageController@manage',['id'=>'houseList.html']);
    }

    public function orm1(){
        // all()
//       $student =  Member::all();

        //find()
//        $student =  Member::find(1);

        //findOrFail
//        $student =  Member::findOrFail( 1);

        //查询 基本上和查询构造器差不多
        $student = Member::whereRaw("id > ?",[1])->get();
        dd($student);

    }
    public function orm2(){
        //新增
//        $student = new Member();
//        $student->name="volankey";
//        $student->id = 88;
//        $student->save();
//        dd($student);

        //还有 create 方法

        // firstOrCreate 没有则创建并返回新的 , 存在则返回存在的
        Member::firstOrCreate([
            'name'=>'xiaobai',
            'id'=>3
        ]);



    }
    public function orm3(){
        //更新
        //返回影响的行数
        Member::where('id',1)->update([
            'name'=>"bbb"
            ]);
        //删除
        Member::destroy([1019,1017]);
        Member::where('id',1)->delete();
    }
}