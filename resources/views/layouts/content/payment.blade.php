@extends('welcome')

@section('content')

  <h2 class="mt-5 mb-4">Thông tin đơn hàng và người mua</h2>
  <div class="row">
    <div class="col-md-6">
      <h4>Thông tin đơn hàng:</h4>
      <table class="table table-bordered">
        <thead>
          <tr>
            <th>Sản phẩm</th>
            <th>Số lượng</th>
            <th>Ảnh</th>
            <th>Giá (vnd)</th>
          </tr>
        </thead>
        <tbody>
          @php
            $totalPrice = 0;
          @endphp
          @foreach($cartList as $item)
          @php
              $totalPrice += $item->price * $item->quantity;
          @endphp
          <tr>
            <td>{{ $item->name }}</td>
            <td>{{ $item->quantity }}</td>
            <td>
              <img src="{{ $item->thumbnails }}" alt="{{ $item->name }}" style="width: 50px; height: 50px;">
            </td>
            <td>{{ number_format($item->price * $item->quantity) }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <h4>Tổng tiền: <strong>{{ number_format($totalPrice) }}</strong> vnd</h4>
    </div>
    <div class="col-md-6">
      <h4>Thông tin người mua:</h4>
      <form action="{{ route('storePayment') }}" method="POST">
        {{ csrf_field() }}
        <div class="form-group">
          <label for="fullName">Họ và tên:</label>
          <input type="text" class="form-control" name="name" placeholder="Nhập họ và tên" required>
        </div>
        <div class="form-group">
          <label for="email">Email:</label>
          <input type="email" class="form-control" name="email" placeholder="Nhập email" required>
        </div>
        <div class="form-group">
          <label for="phoneNumber">Số điện thoại:</label>
          <input type="text" class="form-control" name="phoneNumber" placeholder="Nhập số điện thoại" required>
        </div>
        <div class="form-group">
          <label for="address">Địa chỉ</label>
          <input type="text" class="form-control" name="address" placeholder="Nhập địa chỉ giao hàng" required>
        </div>
        <div class="form-group">
          <label for="note">Ghi chú</label>
          <input type="text" class="form-control" name="note" placeholder="ghi chú cho đơn hàng..." >
        </div>
        
        <button type="submit" class="btn btn-outline-primary">Xác nhận đơn hàng</button>
      </form>
    </div>
  </div>


@endsection