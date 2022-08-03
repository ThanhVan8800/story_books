@extends('admin.layouts.sidebar')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Danh mục truyện/</span> {{$category}}</h4>

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
    <!-- Basic Layout & Basic with Icons -->
    <div class="row">
        <!-- Basic Layout -->
        <div class="col-xxl">
            <div class="card mb-4">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0">Basic Layout</h5>
                    <small class="text-muted float-end">Default label</small>
                </div>
                <div class="card-body">
                    <form action="{{route('category.update',$cate->id)}}" method="POST">
                        @csrf @method('PUT')
                        <div class="col-md">
                            <div class="spinner-grow text-secondary" style="display: none;">
                                <span class="visually-hidden">Loading...</span>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-name">Tên mục truyện</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="title" name="title" value="{{$cate->title}}"
                                    placeholder="Nhập tên mục truyện" onkeyup="ChangeToSlug();" />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-company">Slug</label>
                            <div class="col-sm-10">
                                <input type="text" id="slug" class="form-control" value="{{$cate->slug}}" name="slug"
                                    id="basic-default-company" placeholder="ACME Inc." />
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-email">Nội dung</label>
                            <div class="col-sm-10">
                                <textarea name="description" value="{{$cate->description}}" id="" cols="30" rows="10"
                                    class="form-control">{{$cate->description}}</textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-2 col-form-label" for="basic-default-phone">Trạng thái</label>
                            <div class="col-md mt-1">
                                <div class="form-check">
                                    <input name="status" class="form-check-input" type="radio" value="1"
                                        id="defaultRadio1" checked />
                                    <label class="form-check-label" for="defaultRadio1"> Kích hoạt </label>
                                </div>
                                <div class="form-check">
                                    <input name="status" class="form-check-input" type="radio" value="0"
                                        id="defaultRadio2" />
                                    <label class="form-check-label" for="defaultRadio2"> Không kích hoạt </label>
                                </div>

                            </div>
                            <div class="row justify-content-end">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-primary">Cập nhật</button>
                                </div>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Toggle Between Modals -->
<div class="col-lg-4 col-md-6">
    <small class="text-light fw-semibold">Toggle Between Modals</small>
    <div class="mt-3">
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modalToggle">
            Launch modal
        </button>

        <!-- Modal 1-->
        <div class="modal fade" id="modalToggle" aria-labelledby="modalToggleLabel" tabindex="-1" style="display: none"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalToggleLabel">Modal 1</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Show a second modal and hide this one with the button below.</div>
                    <div class="modal-footer">
                        <button class="btn btn-primary" data-bs-target="#modalToggle2" data-bs-toggle="modal"
                            data-bs-dismiss="modal">
                            Open second modal
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
@section('footer')
<script>
$(function() {
    $("form").submit(function() {
        $('.spinner-grow').fadeIn();
    });

}); //document ready
</script>


@endsection