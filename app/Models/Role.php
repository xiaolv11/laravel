<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //新增指定
    protected $guarded=[];
    //多对多的关系
    public function auth()
    {
        return $this->belongsToMany(Privilege::class,'role_auth','role_id','auth_id');

    }

    //根据id传递来查看数据
    public static function getRoleList(int $id)
    {
        $model=Role::find($id);
        return $model->auth()->get();
    }
}
