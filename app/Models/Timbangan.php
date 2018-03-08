<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 2/21/2018
 * Time: 3:19 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Timbangan extends Model
{
    protected $table = 't_timbangan';
    protected $primaryKey = 'id_timbangan';
    public $timestamps = false;
}