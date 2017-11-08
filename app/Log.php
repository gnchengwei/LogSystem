<?php
/**
 * Created by PhpStorm.
 * User: mylitboy
 * Date: 2017-10-31
 * Time: 15:53
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'log';
    protected $primaryKey = 'id';
    protected $fillable = ['test_id', 'state', 'err_code', 'err_msg', 'test_time', 'success_no', 'dev_mac', 'dev_ip'];
}