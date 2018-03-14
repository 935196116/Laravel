<?php
/**
 * Created by PhpStorm.
 * User: hakusakaitekimac
 * Date: 2018/3/2
 * Time: 下午1:40
 */
namespace  App\Http\Controllers;
use Illuminate\Support\Facades\DB;
class  UserController extends Controller{
    public function  info(){

        return "你好 宝贝";
    }
    public  function getAll()
    {
        $students = DB::select('select * from student');
        dd($students);
    }
    public function addUser($id,$name){
//        $flag = DB::insert('insert into student(id,name) values(?,?)',[
//            $id,
//            $name
//        ]);
        //查询构造器

        //插入
        $flag = DB::table('student')->insert(
            ['id'=>1001, 'name'=>"hhhh"],
            ['id'=>1003, 'name'=>"hhhh"]
        );


        var_dump($flag);

        //更新
        DB::table('student')->where('id',12)->update([
            'age'=>30
        ]);
        //自增3,自增1 第二个不加

        DB::table('student')->where('id',12)->increment('age',3);
        //自减少 第三个参数 同时更改name字段
        DB::table('student')->decrement('age',3,['name'=>'imooc']);

        //删除 返回删除的行数
        DB::table('student')->where('id','>=',15)->delete();

        //查询
        //获取 结果集中的第一条数据

        $student = DB::table('student')
            ->orderBy('id','desc')
            ->first();
        //获取结果集
        $student = DB::table('student')
            ->orderBy('id','desc')
            ->get();
        //复合查询条件
        $student = DB::table('student')
            ->whereRaw('id >= ? and age >= ?',[1001,18])
            ->get();

        //返回结果集中的指定字段
        $student = DB::table('student')
            ->whereRaw('id >= ? and age >= ?',[1001,18])
            ->lists('name');

        //返回结果集中的指定字段
        $student = DB::table('student')
            ->whereRaw('id >= ? and age >= ?',[1001,18])
            ->lists('name','id');
        //array[
        //  id=>name,
        //  id=>name
        //]

        //查询指定字段

        DB::table('student')
            ->select('id','name')
            ->get();
        //一次返回几万数据会慢,用这种方式
        DB::table('student')->chunk(1000,function ($data){
            dd($data);
            if($data->name == "xiabai")
                //停止查询
               return false;
        });
    }


}