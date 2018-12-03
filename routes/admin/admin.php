<?php
/**
 * Created by PhpStorm.
 * User: headway
 * Date: 2018/11/23
 * Time: 15:08
 */
//后台路由文件
Route::group(['prefix'=>'admin','namespace'=>'Admin'],function(){
    //登录页面路由
    Route::get('login',"PublicController@login")->name('admin.public.login');
    //登录处理页面
    Route::post('loginsave',"PublicController@loginsave")->name('admin.public.loginsave');
    //后台首页
    Route::group(['middleware'=>'checklogin'],function(){
        Route::get('index',"IndexController@index")->name('admin.index.index');
        Route::get('welcome',"IndexController@welcome")->name('admin.index.welcome');
        Route::get('change',"IndexController@change")->name('admin.index.change');
        //角色管理
        Route::get('role/index',"RoleController@index")->name('admin.role.index');
        Route::get('role/show/{id}',"RoleController@show")->name('admin.role.show')->where('id','\d+');
        Route::get('role/add',"RoleController@add")->name('admin.role.addindex');
        Route::post('role/add',"RoleController@add")->name('admin.role.add');
        Route::get("role/edit","RoleController@edit")->name('admin.role.edit');
        Route::put('role/save','RoleController@save')->name('admin.role.save');
        Route::get('role/delete',"RoleController@delete")->name('admin.role.delete');
    });

});