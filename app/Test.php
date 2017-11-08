<?php
/**
 * Created by PhpStorm.
 * User: mylitboy
 * Date: 2017-10-31
 * Time: 15:52
 */

namespace App;


use Illuminate\Database\Eloquent\Model;

class Test extends Model
{
    protected $table = 'test';
    protected $primaryKey = 'id';
    protected $fillable = ['id', 'phone_no', 'phone_brand', 'phone_model', 'os_type',
        'os_ver', 'rom_system', 'rom_ver', 'router_brand', 'router_model', 'wifi_ssid', 'wifi_pwd'];

}