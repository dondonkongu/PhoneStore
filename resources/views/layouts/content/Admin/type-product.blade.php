@extends('layouts.content.Admin.Adminlayout.masterAdmin')
@section('content')
<style>
    .container{
        margin-top: 60px;
    }
    </style>

<div class="container">

    <table class="table table-bodered">
        <thead>
            <tr>
                <th>STT</th>
                <th>Name</th>
                <th>Description</th>
                <th>Image</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($typeProductList as $typeProduct)
            <tr>
                <td>{{ $typeProduct->id }}</td>
                <td>{{ $typeProduct->name }}</td>
                <td>{{ $typeProduct->description }}</td>
                <td>{{ $typeProduct->image }}</td>
                <td>
                    <button class="btn btn-warning">Edit</button>
                    <button class="btn btn-danger">Delete</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
<h2>
    Thêm mới loại sản phẩm
</h2>
    <form class="row g-3 needs-validation" novalidate action="{{ route('storeTypeProduct') }}" method="post">
        @csrf
        <div class="col-md-4">
          <label for="validationCustom01" class="form-label">Tên</label>
          <input type="text" class="form-control" id="validationCustom01" name="name"  required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="col-md-4">
          <label for="validationCustom02" class="form-label">Mô tả</label>
          <input type="text" class="form-control"  name="description"  required>
          <div class="valid-feedback">
            Looks good!
          </div>
        </div>
        <div class="col-md-4">
            <label for="validationCustom01" class="form-label">Hình ảnh</label>
            <input type="text" class="form-control" id="validationCustom01" name="image"  >
            <div class="valid-feedback">
              Looks good!
            </div>
          </div>
        <div class="col-12">
          <button class="btn btn-primary" type="submit">Thêm mới</button>
        </div>
      </form>
  </div>


@endsection