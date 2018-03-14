<?php
/**
 * Created by PhpStorm.
 * User: hakusakaitekimac
 * Date: 2018/3/2
 * Time: 下午8:04
 */

namespace App;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Model;

class Member extends Model{
    //指定表名
    protected $table = 'student';
    //指定id
    protected $primaryKey = 'id';

    //自动维护created_at  和 update_at

    public $timestamps = true;
//    public static function getMember(){
//        return 'member name is sean';
//    }
}