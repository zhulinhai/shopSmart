<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'admin';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function articles()
    {
        return $this->hasMany('App\Article');
    }

    // 判断是否有某个权限
    public function hasPermission($permission)
    {
        $permission_db = $this->permissions;
        if(in_array($permission, $permission_db)) {
            return true;
        }

        return false;
    }

    // permission 是一个二维数组
    public function getPermissionsAttribute($value)
    {
        if (empty($value)) {
            return [];
        }
        $data = json_decode($value, true);
        $ret = [];
        foreach ($data as $key => $value) {
            $ret[] = $key;
            foreach ($value as $value2) {
                $ret[] = "{$key}.{$value2}";
            }
        }
        return array_unique($ret);
    }

    // 全局设置permission
    public function setPermissionsAttribute($value)
    {
        $ret = [];
        foreach ($value as $item) {
            $keys = explode('.', $item);
            if (count($keys) != 2) {
                continue;
            }
            $ret[$keys[0]][] = $keys[1];
        }

        $this->attributes['permissions'] = json_encode($ret);
    }
}
