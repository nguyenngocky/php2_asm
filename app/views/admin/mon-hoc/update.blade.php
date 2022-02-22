@extends('layouts.admin')
@section('content')
@section('title', 'Sửa môn học')

    <div class="card-body h-100">
        <div class="col-12 col-xl-16">
            <div class="card">
                <div class="card-body">
                    <form action="<?= BASE_URL . 'mon-hoc/luu-cap-nhat/' . $model->id ?>" method="post" entype="multipart/form">
                    <div class="mb-3">
                            <label class="form-label">Tên môn học</label>
                            <input type="text" name="name" value="<?=$model->name?>" class="form-control" placeholder="Tên môn học">
                            <input type="hidden" name="author_id" value="{{$_SESSION['auth']['id']}}" >
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection