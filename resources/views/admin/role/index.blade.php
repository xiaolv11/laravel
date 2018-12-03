@extends('admin.layouts.admin')

@section('content')

	<nav class="breadcrumb">
		<i class="Hui-iconfont">&#xe67f;</i> 首页
		<span class="c-gray en">&gt;</span> 管理员管理
		<span class="c-gray en">&gt;</span> 角色列表
		<a class="btn btn-success radius r btn-refresh" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新"><i class="Hui-iconfont">&#xe68f;</i>
		</a>
	</nav>
	@extends('admin.layouts.success')
	@extends('admin.layouts.errormsg')
	<div class="page-container">
		<div class="text-c"> 日期范围：
			<input type="text" onfocus="WdatePicker({ maxDate:'#F{$dp.$D(\'datemax\')||\'%y-%M-%d\'}' })" id="datemin" class="input-text Wdate" style="width:120px;">
			-
			<input type="text" onfocus="WdatePicker({ minDate:'#F{$dp.$D(\'datemin\')}',maxDate:'%y-%M-%d' })" id="datemax" class="input-text Wdate" style="width:120px;">
			<input type="text" class="input-text" style="width:250px" placeholder="权限名称" id="search">
			<button type="button" class="btn btn-success radius" id="searchBtn"><i class="Hui-iconfont">&#xe665;</i> 搜用户</button>
		</div>
		<div class="cl pd-5 bg-1 bk-gray mt-20">
            <span class="l">
                <a href="javascript:;" onclick="datadel()" class="btn btn-danger radius">
                    <i class="Hui-iconfont">&#xe6e2;</i> 批量删除
                </a>
                <a href="{{ route("admin.role.add") }}" onclick="{{ route("admin.role.add") }}" class="btn btn-primary radius">
                    <i class="Hui-iconfont">&#xe600;</i> 添加角色
                </a>
            </span>
		</div>
		<div class="mt-20">
			<table class="table table-border table-bordered table-hover table-bg table-sort">
				<thead>
				<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="100">角色名称</th>
					<th width="130">加入时间</th>
					<th width="100">操作</th>
				</tr>
				@forelse($roles as $v)
					<tr class="text-c">
					<th width="25"><input type="checkbox" name="" value=""></th>
					<th width="100">{{ $v->role_name }}</th>
					<th width="100">{{ $v->created_at }}</th>
					<th><a href="{{ route('admin.role.edit',['id'=>$v->id]) }}">编辑</a>
						<a href="{{ route('admin.role.delete',['id'=>$v->id]) }}">删除</a>
					</th>
					</tr>
				@empty
					<th>暂无数据</th>
				@endforelse
				</thead>

			</table>
			{{ $roles->links() }}
		</div>
	</div>

@endsection

@section('js')


@endsection