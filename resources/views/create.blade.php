@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span>Tạo doanh nghiệp</span>
                        <span class="float-right">
                            <a class="btn btn-secondary" href="/home">
                                Back
                            </a>
                        </span></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="post" action="/listing">
                            @csrf
                            <div class="form-group">
                                <label for="nameBusiness">Tên doanh nghiệp</label>
                                <input type="text" class="form-control" id="nameBusiness"
                                       name="nameBusiness" placeholder="Nhập tên">
                            </div>
                            <div class="form-group">
                                <label for="address">Địa chỉ</label>
                                <input type="text" class="form-control" id="address"
                                       name="address" placeholder="Nhập địa chỉ">
                            </div>
                            <div class="form-group">
                                <label for="website">Website</label>
                                <input type="text" class="form-control" id="website"
                                       name="website" placeholder="Nhập website">
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email"
                                       name="email" placeholder="Nhập email">
                            </div>
                            <div class="form-group">
                                <label for="phone">Số điện thoại</label>
                                <input type="text" class="form-control" id="phone"
                                       name="phone" placeholder="Nhập số điện thoại">
                            </div>
                            <div class="form-group">
                                <label for="bio">Thông tin</label>
                                <input type="text" class="form-control" id="bio"
                                       name="bio" placeholder="Nhập thông tin">
                            </div>
                            <button type="submit" class="btn btn-primary">Xác nhận</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
