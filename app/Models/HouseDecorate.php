<?php
namespace App\Models;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Model;

class HouseDecorate extends Model
{

    //指定表名
    protected $table = 'decorate_list';
    //指定id
    protected $primaryKey = 'id';

    protected $fillable = ['_name'];
    
    public $timestamps = false;
}