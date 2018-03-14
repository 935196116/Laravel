<?php
namespace App\Models;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Database\Eloquent\SoftDeletes;
/*
 *房源信息model
 *  */
class Houses extends Model
{
    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public $incrementing = false;
    //指定表名
    protected $table = 'v_house';
    //指定id
    protected $primaryKey = 'id';

    protected $fillable = [ 'id','title','region','housing','style','decorate','address','host_name','host_tel',
        'imgs','detail','location','price','area',
    ];
    
//    public $timestamps = false;
}

class HousesList extends Model
{

    use SoftDeletes;
    protected $dates = ['deleted_at'];
    public $incrementing = false;
    //指定表名
    protected $table = 'house_list';
    //指定id
    protected $primaryKey = 'id';

    protected $fillable = [ 'id','title','region','housing','style','decorate','address','host_name','host_tel',
        'imgs','detail','location','price','area','agent'
    ];

//    public $timestamps = false;
}