<style>
    .sidebar {
        width: 250px;
        height: 100vh;
        background-color: #333;
        color: #fff;
        padding-top: 20px;
        position: fixed;
        top: 0;
        left: 0;
    }

    .sidebar ul {
        list-style-type: none;
        padding: 0;
        margin-top: 56px;
    }

    .sidebar ul li {
        padding: 10px 20px;
        cursor: pointer;
    }

    .sidebar ul li:hover {
        background-color: #555;
    }

    .content {
        margin-left: 250px;
        padding: 20px;
    }

   
</style>



<div class="sidebar">
    <ul class="nav flex-column">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{ route('showProduct') }}">Quản lí sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('editTypeProduct') }}">Loại sản phẩm</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{ route('displayUsers') }}">Quản lí người dùng</a>
        </li>
        <li class="nav-item">
          <a class="nav-link " href="{{ route('displayBills') }}">Quản lí đơn hàng</a>
        </li>
      </ul>
</div>
