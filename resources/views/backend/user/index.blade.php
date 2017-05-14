@extends("backend.layout.iframeMain")
@inject('commonPresenter','App\Presenters\CommonPresenter')
@section('content')
    <div class="wrapper wrapper-content animated fadeInRight">
        @include('backend.layout.success')
        <div class="row">
            <div class="col-sm-12">
                <div class="ibox float-e-margins">
                    <div class="ibox-title">
                        <h5>用户列表</h5>
                        <div class="ibox-tools">
                            <a href="{{route('backend.user.create')}}">
                                <i class="fa fa-plus"></i> <small>新增</small>
                            </a>
                        </div>
                    </div>
                    <div class="ibox-content">
                        <div class="row">
                            {!! $commonPresenter->renderSearchForm($search) !!}
                        </div>
                        <table class="table table-hover table-striped">
                            <thead>
                            <tr>
                                <th>用户编号</th>
                                <th>用户邮箱</th>
                                <th>用户名称</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $item)
                                <tr>
                                    <td>{{$item->id}}</td>
                                    <td>{{$item->email}}</td>
                                    <td>{{$item->name}}</td>
                                    <td>
                                        <a href="{{route('backend.user.edit',['id'=>$item->id])}}" class="btn btn-primary btn-flat">编辑</a>
                                        <button class="btn btn-danger btn-flat"
                                                data-url="{{URL::to('backend/user/'.$item->id)}}"
                                                data-toggle="modal"
                                                data-target="#delete-modal"
                                        >
                                            删除
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                    @if($data->render())
                        <div class="box-footer clearfix">
                            {!! $commonPresenter->renderPagination($data,$search) !!}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection

@section("after.js")
    @include('backend.components.modal.delete',['title'=>'操作提示','content'=>'你确定要删除这名用户吗?'])
@endsection
