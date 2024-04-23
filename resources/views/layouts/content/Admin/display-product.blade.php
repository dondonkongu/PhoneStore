@extends('layouts.content.Admin.Adminlayout.masterAdmin')
@section('content')
    <style>
        .container {
            margin-top: 60px;
        }

        .add-product a {
            position: fixed;
            right: 0;
            margin: 20px;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>

    <script type="text/javascript">
        function deleteProduct(id) {
            $.post("{{ route('delete-product') }}", {
                    '_token': $('[name=_token]').val(),
                    id: id
                },
                function(data, status) {
                    location.reload();
                });
        }
    </script>

    <div class="container">
        <table class="table table-sm">
            @csrf

            <thead>
                <tr>
                    <th scope="col">Id</th>
                    <th scope="col">tên</th>
                    <th scope="col">mô tả</th>
                    <th scope="col">thao tác</th>

                </tr>
            </thead>
            <tbody>
                @foreach ($productList as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>
                            {{ $item->name }}
                        </td>
                        <td>
                            {{ $item->description }}
                        </td>
                        <td>

                            <a href="{{ route('editProduct') }}?id={{ $item->id }}">
                                <button type="submit" class="btn btn-warning">edit</button>
                            </a>
                            <button onclick="deleteProduct({{ $item->id }})" type="submit"
                                class="btn btn-danger">delete</button>
                        </td>
                    </tr>
                @endforeach

            </tbody>
        </table>
        <div class="add-product">
            <a href="{{ route('editProduct') }}">
                <button type="submit" class="btn btn-primary">thêm mới sản phẩm</button>
            </a>
        </div>
    </div>
@endsection
