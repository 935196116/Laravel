<?php
namespace App\Models;

use Faker\Provider\Base;
use Illuminate\Database\Eloquent\Model;

class HouseStyle extends Model
{

    //指定表名
    protected $table = 'house_style';
    //指定id
    protected $primaryKey = 'id';

    protected $fillable = ['_name'];
    
    public $timestamps = false;
}