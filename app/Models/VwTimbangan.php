<?php
/**
 * Created by PhpStorm.
 * User: dirg
 * Date: 3/6/2018
 * Time: 2:03 PM
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VwTimbangan extends Model
{
    protected $table = 'vw_t_timbangan';
    protected $primaryKey = 'no_spat';
    public $timestamps = false;
}