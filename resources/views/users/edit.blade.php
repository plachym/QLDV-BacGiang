@extends('layouts.app')
@section('left-bar')
<span>QUẢN TRỊ</span>
<ul class="main-list">
    <li><a href="{{route('user.index')}}">Người dùng</a></li>
    @if (Auth::user()->isAn('admin'))
        <li><a href="{{route('manage.setting')}}">Thông tin cấu hình</a></li>
    @endif
</ul>
@endsection
@section('content')
<div class="content-crud"  style="margin-top:0px;font-size:12px;text-align:left;padding-left:20px">
    <div class="title" >SỬA THÔNG TIN NGƯỜI DÙNG</div>
    <div class="main">
    <form method="POST" action="{{route('user.update', $user->uuid)}}">
        @csrf
        <div>
            <label class="form-label" style="margin-right:40px;">Họ và tên</label>
            <input type="text" name="name" class="form-input" value="{{$user->name}}">
        </div>
        <div>
            <label class="form-label"  style="margin-right:11px;">Tên đăng nhập</label>
            <input type="text" name="username" class="form-input" value="{{$user->username}}">
        </div>
        <div>
            <label class="form-label"  style="margin-right:41px;">Mật khẩu</label>
            <input type="password" name="password" class="form-input">
        </div>
        <div>
            <label class="form-label" style="margin-right:61px;">Email</label>
            <input type="email" name="email" class="form-input" value="{{$user->email}}">
        </div>
        <div class="user-content">
            <label class="form-label" style="margin-right:43px;">Đơn vị</label>
            <select name="group" class="custom-select form-select" id="group_id">
                <option value=""></option>
                @foreach ($groups as $group)
                    <option value="{{$group->uuid}}" @if($group->id == $user->group_id) selected @endif>{{$group->name}}</option>
                @endforeach
            </select>
        </div>
        <br>
        <div>
            <label class="form-label" style="margin-right:40px;">Có thể tạo thêm đơn vị cấp dưới</label>
            <input type="checkbox" name="can_create_group" @if($user->can_create_group == 1) checked @endif> 
        </div>
        <br>
        <div>
            <label class="form-label" style="margin-right:62px;">Có thể tạo thêm người dùng </label>
            <input type="checkbox" name="can_create_user" @if($user->can_create_user == 1) checked @endif> 
        </div>
        <hr style="margin:10px 0px;">
        <input type="submit" value="Lưu" class="btn">
    </form>
    </div>
</div>
@endsection
@push('script')
{{--<script src="{{ asset('js/select.js') }}"></script>--}}
<script>
    $("#group_id").chosen({"width":"200px","enable_escape_special_char":true});
</script>
@endpush