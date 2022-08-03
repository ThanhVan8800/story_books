@extends('admin.layouts.sidebar')

@section('content')
<hr class="my-5" />
<!-- Bordered Table -->
<div class="card">
    <h5 class="card-header">Bordered Table</h5>
    @if(Session::has('success'))
    <div class="alert alert-success alert-dismissible" role="alert">
        {{Session::get('success')}}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    @if(Session::has('error'))
    <div class="alert alert-success">
        {{Session::get('error')}}
    </div>
    @endif
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>STT</th>
                        <th>Tên mục truyện</th>
                        <th>Slug</th>
                        <th>Mô tả</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @if(!empty($lstCate))
                        @foreach ($lstCate as $key=>$cate )
                        <tr>
                            <td>
                                <i class="fab fa-angular fa-lg text-danger me-3"></i> <strong>{{$key}}</strong>
                            </td>
                            <td>{{$cate->title}}</td>
                            <td>{{$cate->slug}}</td>
                            <td>
                                {{$cate->description}}
                            </td>
                            <td>
                                @if ($cate->status == 1)
                                <span class="badge bg-label-primary me-1">Active</span>
                            </td>
                            @else
                            <span class="badge bg-label-warning me-1">UnActive</span></td>
                            @endif
                            <td>

                                <a class="dropdown-item" href="{{route('category.edit',[$cate->id])}}"><i
                                        class="bx bx-edit-alt me-1"></i> Edit</a>

                                <button type="button" class="dropdown-item" data-bs-toggle="modal"
                                    data-bs-target="#modalToggle"><i class="bx bx-trash me-1"></i>DELETE</button>
                                <form action="{{route('category.destroy',$cate->id)}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <!-- Modal 1-->
                                    <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel"
                                        tabindex="-10" style="display: none" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalToggleLabel">Warning</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">Bạn có chắc muốn xóa danh mục truyện này không?.</div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-outline-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>
                                                    <button class="btn btn-primary" type="submit"
                                                        data-bs-target="#modalToggle2" data-bs-toggle="modal"
                                                        data-bs-dismiss="modal">
                                                        Delete
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>

                            </td>
                        </tr>
                        @endforeach
                    @else
                        <!-- Error -->
                        <div class="container-xxl container-p-y">
                        <div class="misc-wrapper">
                            <h2 class="mb-2 mx-2">Page Not Found :(</h2>
                            <p class="mb-4 mx-2">Oops! 😖 The requested URL was not found on this server.</p>
                            <a href="/admin" class="btn btn-primary">Back to home</a>
                            <div class="mt-3">
                            <img
                                src="/templates/admin/assets/img/illustrations/page-misc-error-light.png"
                                alt="page-misc-error-light"
                                width="500"
                                class="img-fluid"
                                data-app-dark-img="illustrations/page-misc-error-dark.png"
                                data-app-light-img="illustrations/page-misc-error-light.png"
                            />
                            </div>
                        </div>
                        </div>
                        <!-- /Error -->
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</div>
<!--/ Bordered Table -->
<hr class="my-5" />


@endsection