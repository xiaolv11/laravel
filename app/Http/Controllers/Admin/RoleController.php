<?php

namespace App\Http\Controllers\Admin;

use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use think\Db;

class RoleController extends Controller
{
    //角色管理列表
    public function index(Request $request)
    {
        if($request->isMethod('get')){
            $roles=\DB::table('Roles')->paginate(3);
            return view('admin.role.index',compact(['roles']));
        }else{
            return redirect()->route('admin.index.change')->withErrors('请求方式非法');
        }

    }
    //查看权限
    public function show(int $id)
    {
        $role_mes=Role::getRoleList($id);
       print_r($role_mes);
    }

    //添加页面
    public function add(Request $request)
    {
        if($request->isMethod('get')){
            return view('admin.role.add');
        }elseif($request->isMethod('post')){
            $name=$request->except(['_token']);
           $validate=\Validator::make($name,[
               'role_name'=>'required'
           ]);
           if($validate->fails()){
               return redirect()->route('admin.role.add')->withErrors('角色名不能为空');
           }else{
                $names=$name['role_name'];
                $names_mes=Role::where(['role_name'=>$names])->first();
                if($names_mes){
                   return redirect()->route('admin.role.add')->withErrors("角色名不允许重复");
                }else{
                    $add_mes=Role::create($name);
                    if($add_mes){
                        return redirect()->route('admin.role.index')->with('success',"添加成功");
                    }else{
                        return redirect()->route('admin.role.add')->withErrors("添加失败");
                    }
                }

           }
        }

    }

    public function delete()
    {
        $id=\request()->only(['id']);
        $id=$id['id'];
        if(!$id){
            return redirect()->route('admin.role.index')->withErrors("参数传递失败");
        }
        $del_role=Role::where(['id'=>$id])->delete();
        if($del_role){
            return redirect()->route('admin.role.index')->with('success',"删除成功");
        }else{
            return redirect()->route('admin.role.index')->withErrors("删除失败");
        }
    }

    public function edit()
    {
        $id=\request()->only(['id']);
        if(empty($id)){
            return redirect()->route('admin.role.index')->withErrors("参数传递出现错误");
        }
        $role_mes=Role::where(['id'=>$id])->first()->toArray();
        //print_r($role_mes);die;
        if($role_mes){
            return view('admin.role.edit',compact(['role_mes']));
        }else{
            return redirect()->route('admin.role.index')->withErrors("角色不存在，请联系管理员");
        }
    }

    public function save()
    {
        $mess=\request()->except(['_token']);
        if(empty($mess)){
          return redirect()->route('admin.role.edit')->withErrors('传输错误');
        }
        $id=$mess['id'];
        $save_mes=Role::where(['id'=>$id])->update(['role_name'=>$mess['role_name']]);
        if($save_mes){
            return redirect()->route('admin.role.index')->with('success',"修改成功");
        }else{
            return redirect()->route('admin.role.index')->withErrors("修改失败，请重试");
        }
    }
}

