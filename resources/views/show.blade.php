@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span>Thông tin doanh nghiệp</span>
                        <span class="float-right">
                            <a class="btn btn-secondary" href="/">
                                Back
                            </a>
                        </span></div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <div class="list-group">
                            <div class="list-group-item">
                                <span>Tên doanh nghiệp: {{ $listing->name }}</span>
                            </div>
                            <div class="list-group-item">
                                <span>Địa chỉ : {{ $listing->address }}</span>
                            </div>
                            <div class=" list-group-item">
                                <span>Website: <a
                                        href="http://{{ $listing->website }}"> {{ $listing->website }}</a></span>
                            </div>
                            <div class=" list-group-item">
                                <span>Email: <a
                                        href="mailto:{{ $listing->email }}">{{ $listing->email }}</a></span>
                            </div>
                            <div class=" list-group-item">
                                <span>Số điện thoại: {{ $listing->phone }}</span>
                            </div>
                            <div class=" list-group-item">
                                <span>Thông tin: {{ $listing->bio }}</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
