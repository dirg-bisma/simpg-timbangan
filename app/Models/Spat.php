<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 2/21/2018
 * Time: 3:37 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Spat extends Model
{
    protected $table = 't_spta';
    protected $primaryKey = 'id';
    public $timestamps = false;
}