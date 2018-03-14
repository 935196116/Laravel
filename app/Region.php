<?php
namespace App;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //指定表名
    protected $table = 'region_list';
    //指定id
    protected $primaryKey = 'id';

    protected $fillable = ['parent_id'];

    public $timestamps = false;
}