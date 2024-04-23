<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $id > 0 ? 'Cập nhật sản phẩm' : 'tạo mới sản phẩm' }} </title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

</head>

<body>
    <div class="container">
        <h1>{{ $id > 0 ? 'Cập nhật sản phẩm' : 'tạo mới sản phẩm' }} </h1>
        <form action="{{ route('storeProduct') }}" method="post" class="row g-3">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Tên sản phẩm</label>
                <input type="text" class="form-control" id="formGroupExampleInput" placeholder="name" name="name"
                    value="{{ $name }}">
            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput2" class="form-label">Giá gốc</label>
                <input type="text" class="form-control" id="formGroupExampleInput2" name="init_price"
                    value="{{ $init_price }}" placeholder="init_price">
            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Giá khuyến mãi</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="dis_price"
                    value="{{ $dis_price }}" placeholder="dis_price">
            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Mô tả</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="description"
                    value="{{ $description }}" placeholder="description">
            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Image </label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="image"
                    value="{{ $image }}" placeholder="image">
            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Hãng</label>
                <select id="inputState" class="form-select" name="id_type">
                    <option selected value="{{ $id_type }}"> @switch($id_type)
                            @case(1)
                                <span> Iphone</span>
                            @break

                            @case(2)
                                <span>Xiaomi</span>
                            @break

                            @case(3)
                                <span>Samsung</span>
                            @break

                            @case(4)
                                <span>oppo</span>
                            @break

                            @default
                                <span>chọn hãng sản phẩm</span>
                        @endswitch
                    </option>
                    <option value="1">Iphone</option>
                    <option value="2">Xiaomi</option>
                    <option value="3">Samsung</option>
                    <option value="4">oppo</option>
                </select>

            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Số lượng tồn kho</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="stock_quantity"
                    value="{{ $stock_quantity }}" placeholder="stock_quantity">
            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Link hình ảnh</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="image_url"
                    value="{{ $image_url }}" placeholder="image_url">
            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Cpu</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="cpu" placeholder="cpu"
                    value="{{ $cpu }}">
            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Ram</label>
                <input type="text" class="form-control" id="formGroupExampleInput"name="ram" placeholder="ram"
                    value="{{ $ram }}">
            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Bộ nhớ trong</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="bo_nho_trong"
                    value="{{ $bo_nho_trong }}" placeholder="bo nho trong">
            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Kích thước màn hình</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="size_screen"
                    value="{{ $size_screen }}" placeholder="size_screen">
            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Công nghệ màn hình</label>
                <input type="text" class="form-control" id="formGroupExampleInput"
                    name="tech_screen"value="{{ $tech_screen }}" placeholder="tech_screen">
            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Camera sau</label>
                <input type="text" class="form-control" id="formGroupExampleInput"name="cam_sau"
                    value="{{ $cam_sau }}" placeholder="cam sau">
            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Camera trước</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="cam_truoc"
                    value="{{ $cam_truoc }}" placeholder="cam truoc">
            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Chip</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="chipset"
                    value="{{ $chipset }}" placeholder="chipset">
            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Pin</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="battery"
                    value="{{ $battery }}" placeholder="battery">
            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">sim</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="sim"
                    value="{{ $sim }}" placeholder="sim">
            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Tính năng đặc biệt</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="features"
                    value="{{ $features }}" placeholder="features">
            </div>
            <div class="col-md-3">
                <label for="formGroupExampleInput" class="form-label">Tình trạng</label>
                <select id="inputState" class="form-select" name="availability" value="{{ $availability }} ">
                    <option value="available">Có sẵn</option>
                    <option value="soldout">Hết hàng</option>
                    <option value="order">Đặt hàng</option>

                </select>
            </div>
            <div class="col-md-6">
                <label for="formGroupExampleInput" class="form-label">Link video demo sản phẩm</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="video_demo"
                    value="{{ $video_demo }}" placeholder="video-demo">
            </div>
            <div class="col-md-6">
                <label for="formGroupExampleInput" class="form-label">Tiêu đề</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="title"
                    value="{{ $title }}" placeholder="title video">
            </div>
            <div class="col-md-4">
                <label for="formGroupExampleInput" class="form-label">image_url_1</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="image1"
                    value="{{ $image1 }}" placeholder="link hình ảnh 1">
            </div>
            <div class="col-md-4">
                <label for="formGroupExampleInput" class="form-label">image_url_2</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="image2"
                    value="{{ $image2 }}" placeholder="link hình ảnh 2">
            </div>
            <div class="col-md-4">
                <label for="formGroupExampleInput" class="form-label">image_url_3</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="image3"
                    value="{{ $image3 }}" placeholder="link hình ảnh 3">
            </div>
            <div class="col-md-4">
                <label for="formGroupExampleInput" class="form-label">image_url_4</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="image4"
                    value="{{ $image4 }}" placeholder="link hình ảnh 4">
            </div>
            <div class="col-md-4">
                <label for="formGroupExampleInput" class="form-label">image_url_5</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="image5"
                    value="{{ $image5 }}" placeholder="link hình ảnh 5">
            </div>
            <div class="col-md-4">
                <label for="formGroupExampleInput" class="form-label">image_url_6</label>
                <input type="text" class="form-control" id="formGroupExampleInput" name="image6"
                    value="{{ $image6 }}" placeholder="link hình ảnh 6">
            </div>
            <button type="submit" class="btn btn-success">{{ $id > 0 ? 'Cập nhật' : 'Tạo mới' }}</button>

        </form>
    </div>

</body>

</html>
