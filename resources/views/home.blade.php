@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <span>Danh sách của bạn</span>
                        <span class="float-right">
                            <a href="/listing/create">
                                Thêm mới
                            </a>
                        </span>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        @if(count($listings))
                            <table class="table table-striped">
                                <tr>
                                    <th>Doanh nghiệp</th>
                                </tr>
                                @foreach($listings as $listing)
                                    <tr>
                                        <td>
                                            <span class="float-left">{{ $listing->name }}</span>
                                            <form class="m-0 p-0" action="/listing/{{ $listing->id }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" href="/listing/{{ $listing->id }}/edit"
                                                        class="btn btn-danger float-right"
                                                        style="height: 35px">
                                                    Xóa
                                                </button>
                                            </form>


                                            <a href="/listing/{{ $listing->id }}/edit"
                                               class="btn btn-info float-right mr-2"
                                               style="height: 35px; color: white">
                                                Sửa
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        @else
                            <p>Bạn không có doanh nghiệp nào nào</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
