@extends('welcome')
@section('js')
<script>
  function updateToCart(id) {
      var quantity = $('#quantity_' + id).val();
      var cartList = [];
      var json = getCookie('cartList');
      if (json != "") {
          cartList = JSON.parse(json);
          index = -1
          for (let i = 0; i < cartList.length; i++) {
              if (cartList[i].id == id) {
                  cartList[i].quantity = quantity;
                  index = i;
                  break;
              }
          }
          if (quantity == 0) {
              cartList.splice(index, 1);
          }

          document.cookie = "cartList=" + JSON.stringify(cartList) + ";path=/";
          location.reload();
      }
  }
  function deleteToCart(id){
    var cartList = [];
      var json = getCookie('cartList');
      if (json != "") {
          cartList = JSON.parse(json);
          index = -1
          for (let i = 0; i < cartList.length; i++) {
              if (cartList[i].id == id) {
                  index = i;
                  break;
              }
          }
         if(index != -1){
              cartList.splice(index, 1);
         }

          document.cookie = "cartList=" + JSON.stringify(cartList) + ";path=/";
          location.reload();
        }
  }

  function getCookie(cname) {
      let name = cname + "=";
      let decodedCookie = decodeURIComponent(document.cookie);
      let ca = decodedCookie.split(';');
      for (let i = 0; i < ca.length; i++) {
          let c = ca[i];
          while (c.charAt(0) == ' ') {
              c = c.substring(1);
          }
          if (c.indexOf(name) == 0) {
              return c.substring(name.length, c.length);
          }
      }
      return "";
  }
</script>@endsection
@section('content')
<body>
    <div class="container">
      <h1 class="my-4">Giỏ hàng</h1>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">STT</th>
            <th scope="col">Sản phẩm</th>
            <th scope="col">Số lượng</th>
            <th scope="col">Đơn giá</th>
            <th scope="col">Tổng cộng</th>
            <th scope="col">Thao tác</th>
          </tr>
        </thead>
        @php
            $total = 0;
            $count = 1;
        @endphp
        @foreach ($cartList as $item)
          @php
              $total += $item->price*$item->quantity;
              @endphp
        <tbody>
          <tr>
            <th scope="row">{{ $count++ }}</th>
            <td>{{ $item->name }}</td>
            <td>
              <input type="number" id="quantity_{{ $item->id }}" value="{{ $item->quantity }}" class="form-control" style="width: 60px;" onchange="updateToCart({{ $item->id }})">
            </td>
            <td>{{ $item->price }}</td>
            <td>{{ number_format($item->price*$item->quantity) }}</td>
            <td>
              <button class="btn btn-sm btn-danger" onclick="deleteToCart({{ $item->id }})">Xóa</button>
            </td>
          </tr>
          
        </tbody>
            
        @endforeach

        <tfoot>
          <tr>
            <td colspan="4" class="text-right"><strong>Tổng cộng:</strong></td>
            <td><strong> {{ number_format($total) }} vnd</strong></td>
            <td></td>
          </tr>
        </tfoot>
      </table>
      <div class="text-center">
        <a href="{{ route('home') }}" class="btn btn-primary">Tiếp tục mua hàng</a>
        <a href="{{ route('payment') }}" class="btn btn-success">Thanh toán</a>
      </div>
    </div>
  </body>
@endsection