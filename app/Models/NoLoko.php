<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 3/6/2018
 * Time: 2:11 PM
 */

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class NoLoko extends Model
{
    protected $table = 'm_no_loko';
    protected $primaryKey = 'id_loko';
    public $timestamps = false;
}