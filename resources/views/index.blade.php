@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span>Danh sách các doanh nghiệp mới nhất</span>
                    </div>

                    <div class="card-body">
                        @if(count($listings))
                            <div class="list-group">
                                @foreach($listings as $listing)
                                    <div class="list-group-item">
                                        <a href="/listing/{{ $listing->id }}">{{ $listing->name }}</a>
                                    </div>
                                @endforeach
                            </div>
                        @else
                            <p>Không có doanh nghiệp nào</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
