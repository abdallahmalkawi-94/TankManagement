<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SystemDevice extends Model
{
    use HasFactory;
    protected $fillable = ['mac_address', 'name', 'location' , 'parent_id' , 'value' , 'is_relay' , 'relay_command'];

    public static function getParentId ($macAddress) {
        return self::select('id')->where('mac_address', $macAddress)->first()->id;
    }

    public static function getSystemDevicesByParentId($parentId) {
        return SystemDevice::where('parent_id', $parentId)->orderBy('id')->get();
    }
}
