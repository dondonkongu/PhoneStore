@extends('layouts.content.Admin.Adminlayout.masterAdmin')
@section('content')
    <style>
        .container {
            margin-top: 60px;
        }
    </style>

    <div class="container">
        <table class="table table-bodered border-primary">
            <thead class="table table-primary">
                <tr>
                    <th>STT</th>
                    <th>tên khách hàng </th>
                    <th>địa chỉ</th>
                    <th>số điện thoại</th>
                    <th>sản phẩm </th>
                    <th>anh</th>
                    <th>số lượng </th>
                    <th>đơn giá</th>
                    <th>thành tiền</th>
                    <th>ngày đặt hàng</th>
                    <th>trạng thái</th>
                </tr>
            </thead>
            @php
                $count =1;
            @endphp
            <tbody>
                @foreach ($billList as $item)
                <tr>
                    <td>{{ $count++ }}</td>
                    <td>{{ $item->customer_name }}</td>
                    <td>{{ $item->address_customer }}</td>
                    <td>{{ $item->phone_customer }}</td>
                    <td>{{ $item->product_name }}</td>
                    <td>
                        <img src="{{ $item->product_image_url }}" width="30px" height="30px">

                    </td>
                    <td> x{{ $item->quantity }}</td>
                    <td>{{ number_format($item->price )}}</td>
                    <td>{{ number_format($item->total) }}</td>
                    <td>{{ $item->date_order }}</td>
                    <td>{{ $item->note }}</td>
                </tr>
                @endforeach
            </tbody>
    </table>

</div>

@endsection
