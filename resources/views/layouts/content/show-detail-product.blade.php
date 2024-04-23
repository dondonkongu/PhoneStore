@extends('welcome')

@section('js')
    <script type="text/javascript">
        function addToCart(id) {
            let quantity = document.querySelector('.qty-input').value;
            var product = {
                id: id,
                quantity: quantity
            };
            var cartList = [];
            var json = getCookie('cartList');
            if(json != ""){
                cartList = JSON.parse(json);
            }
            var isFind = false; 
            for (let i = 0; i < cartList.length; i++) {
                if (cartList[i].id == product.id) {
                    cartList[i].quantity = parseInt(cartList[i].quantity) + parseInt(product.quantity);
                    isFind = true;
                    break;
                }
            }
            if (!isFind) {
                cartList.push(product);
            }
            document.cookie = "cartList=" + JSON.stringify(cartList) + ";path=/";

            alert('Thêm vào giỏ hàng thành công');
            location.reload();

           

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
    </script>
@stop

@section('content')
    <style>
        .text-left {
            font-size: 1.5rem;
        }

        .card-title {
            font-size: 1rem;
            font-weight: bold;
        }

        .card-img-top:hover {
            transform: scale(1.1);
            transition: 0.5s;
        }

        .promotion {
            text-decoration: line-through;
            font-weight: bold;
        }

        .price {
            color: red;

        }


        .swipper-image {
            display: flex;
            justify-content: center;
            align-items: center;
            margin: 2px;
            border-radius: 10px;
            width: 50px;
            height: 50px;
            object-fit: cover;
            border: 1px solid #ccc;
        }

        .bi-youtube {
            font-size: 30px;
            color: red;
        }

        .col-md-8 {
            height: 450px;
        }

        .carousel-control-prev,
        .carousel-control-next {
            margin: 60px 0;
        }

        .order-button {
            height: 60px;
        }

        .order-button p {
            font-size: 13px;
        }

        .add-to-cart-button p {
            font-size: 7.5px;
        }

        .title-table {
            text-align: center;
            font-size: 1rem;

            padding: 10px;
        }

        @media (max-width: 768px) {
            .col-md-8 {
                height: auto;
            }

            .carousel-indicators {
                display: none;
            }

            #carouselExampleIndicators iframe,
            #carouselExampleIndicators img {
                width: 100%;
                height: auto;
            }

            .carousel-control-prev,
            .carousel-control-next {
                margin: 20px 0;
            }
        }

        .hr-divider {
            border-top: 2px solid #ccc;
            margin-top: 30px;
            margin-bottom: 30px;
        }

        .btn-buy .btn {
            margin: 10px 0;
            padding: 10px;
            border-radius: 10px;
        }

        .technical-table {
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .box-promotion {
            border: 1px solid #ccc;
            border-radius: 10px;
        }

        .box-promotion p {
            background-color: #f8d7da;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
            padding: 5px 10px;
            color: red;

        }

        .box-promotion ul {
            padding: 10px;
        }

        .description-box,
        .fag-box,
        .fag-element {
            border: 1px solid #ccc;
            border-radius: 10px;
            padding: 10px;
        }

        .fag-element:hover {
            background-color: #ccc;
        }

        .fag-box .question {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .fag-box .question:hover {
            text-decoration: none;
            color: black;

        }

        .direct-box a {
            text-decoration: none;
        }

        .quantity {
            display: flex;
            align-items: center;
        }

        .qty-input {
            width: 50px;
            padding: 5px;
            text-align: center;
            border: 1px solid #ccc;
        }

        .btn-minus,
        .btn-plus {
            background-color: #f0f0f0;
            border: 1px solid #ccc;
            color: #555;
            cursor: pointer;
            padding: 5px 10px;
            font-size: 16px;
            transition: background-color 0.3s, color 0.3s;
        }

        .btn-minus:hover,
        .btn-plus:hover {
            background-color: #e0e0e0;
        }

        .btn-minus:disabled,
        .btn-plus:disabled {
            background-color: #f0f0f0;
            color: #ccc;
            cursor: not-allowed;
        }

        .modal-body {

            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }
    </style>

    <script type="text/javascript">
        document.addEventListener('DOMContentLoaded', function() {
            const btnMinus = document.querySelector('.btn-minus');
            const btnPlus = document.querySelector('.btn-plus');
            const qtyInput = document.querySelector('.qty-input');

            btnMinus.addEventListener('click', function() {
                let currentValue = parseInt(qtyInput.value);
                if (currentValue > 1) {
                    qtyInput.value = currentValue - 1;
                }
            });

            btnPlus.addEventListener('click', function() {
                let currentValue = parseInt(qtyInput.value);
                qtyInput.value = currentValue + 1;
            });
        });
    </script>

    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
        aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="staticBackdropLabel">Nhập số lượng cần mua</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <strong>Chọn số lượng</strong>
                    <div class="quantity">
                        <button class="btn-minus">-</button>
                        <input type="text" class="qty-input" value="1" name="quantity">
                        <button class="btn-plus">+</button>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">Đóng</button>
                    <button onclick="addToCart({{ $detail->id }})" type="submit" class="btn btn-outline-success">Thêm vào
                        giỏ hàng</button>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="direct-box">
            <a href="{{ route('home') }}">Trang chủ</a>
            <i class="bi bi-arrow-right-short"></i>
            <a href="{{ route('showTypeProduct') }}?id={{ $detail->id_type }}">{{ $category->name }}</a>
            <i class="bi bi-arrow-right-short"></i>
            <span>{{ $detail->name }}</span>
        </div>
        <p class="text-left"><strong>{{ $detail->name }}</strong></p>
        <div class="hr-divider"></div>

        <div class="row">
            <div class="col-md-8">
                <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <iframe width="710" height="374.89"
                                src="{{ $image_product_detail->video_demo }}?autoplay=1&mute=1"
                                title="{{ $image_product_detail->title }}" frameborder="0"
                                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                                referrerpolicy="strict-origin-when-cross-origin" allowfullscreen='allowfullscreen'></iframe>
                        </div>
                        <div class="carousel-item">
                            <img src="{{ $image_product_detail->image1 }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ $image_product_detail->image2 }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ $image_product_detail->image3 }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ $image_product_detail->image4 }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ $image_product_detail->image5 }}" class="d-block w-100" alt="...">
                        </div>
                        <div class="carousel-item">
                            <img src="{{ $image_product_detail->image6 }}" class="d-block w-100" alt="...">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden"></span>
                    </button>

                </div>
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active"
                        aria-current="true" aria-label="Slide 1">
                        <div class="swipper-image">
                            <i class="bi bi-youtube"></i>
                        </div>
                    </button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1"
                        aria-label="Slide 2">
                        <img src="{{ $image_product_detail->image1 }}" class="swipper-image" alt="...">
                    </button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2"
                        aria-label="Slide 3">
                        <img src="{{ $image_product_detail->image2 }}" class="swipper-image" alt="...">
                    </button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3"
                        aria-label="Slide 4">
                        <img src="{{ $image_product_detail->image3 }}" class="swipper-image" alt="...">
                    </button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="4"
                        aria-label="Slide 5">
                        <img src="{{ $image_product_detail->image4 }}" class="swipper-image" alt="...">
                    </button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="5"
                        aria-label="Slide 6">
                        <img src="{{ $image_product_detail->image5 }}" class="swipper-image" alt="...">
                    </button>
                    <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="6"
                        aria-label="Slide 7">
                        <img src="{{ $image_product_detail->image6 }}" class="swipper-image" alt="...">
                    </button>
                </div>
                <p><strong>Giá:</strong>
                    {{ number_format($detail->dis_price > 0 ? $detail->dis_price : $detail->init_price) }}
                    vnđ</p>


            </div>
            <div class="col-md-4">
                <div>
                    <p><strong>
                            @if ($detail->dis_price == 0)
                                <p class="card-text price ">{{ number_format($detail->init_price) }} vnd</p>
                            @else
                                <p class="card-text price ">{{ number_format($detail->dis_price) }} vnd</p>
                                <p class="card-text promotion">{{ number_format($detail->init_price) }} vnd</p>
                            @endif
                        </strong></p>
                </div>
                <div class="box-promotion">
                    <p>
                        <i class="bi bi-gift"></i>
                        <strong>Khuyến mãi</strong>
                    </p>
                    <ul>
                        <li>trả góp</li>
                        <li>Giảm giá 20% khi mua trả góp</li>
                        <li>Giảm giá 30% khi mua trả góp qua thẻ</li>
                        <li>Giảm giá 40% khi mua trả góp qua thẻ tín dụng</li>
                        <li>Giảm giá 50% khi mua trả góp qua thẻ tín dụng quốc tế</li>
                    </ul>
                </div>

                <div class="btn-buy">
                    <div class="d-flex justify-content-between ">
                        <button type="button" class="btn btn-outline-danger order-button">
                            <strong>MUA NGAY </strong>
                            <p>(giao nhanh hoặc nhận tại cửa hàng)</p>
                        </button>
                        <button type="button" class="btn btn-outline-success add-to-cart-button" data-bs-toggle="modal"
                            data-bs-target="#staticBackdrop">

                            <i class="bi bi-cart-plus"></i>
                            <p>Thêm vào giỏ </p>
                        </button>

                    </div>
                    <div class="d-flex justify-content-between">
                        <button type="button" class="btn btn-outline-primary">
                            <strong>Trả góp 0%</strong>
                        </button>
                        <button type="button" class="btn btn-outline-primary">
                            <strong>Trả góp 0% qua thẻ</strong>
                        </button>
                    </div>

                </div>


            </div>
        </div>
        <div class="row">
            <div class="col-md-8">
                <div class="description-box">
                    <p><strong>Đặc điểm nổi bật</strong></p>
                    <ul>
                        <li>Mở khoá giới hạn tiềm năng với AI - Hỗ trợ phiên dịch cuộc gọi, khoanh vùng tìm kiếm, Trợ lí
                            Note và chình sửa anh</li>
                        <li>Tuyệt tác thiết kế bền bỉ và hoàn hảo - Vỏ ngoài bằng titan mới cùng màu sắc lấy cảm hứng từ
                            chất liệu đá tự nhiên</li>
                        <li>Tích hợp S-Pen cực nhạy - Thoải mát viết, chạm thật chính xác trên màn hình cùng nhiều tính năng
                            tiện ích</li>
                        <li>Nắm trong tay trọn bộ chi tiết chân thực nhất - Camera 200MP hỗ trợ khả năng xử lý AI cải thiện
                            độ nét và tông màu</li>
                    </ul>
                    <p>
                        Samsung S24 Ultra là siêu phẩm smartphone đỉnh cao mở đầu năm 2024 đến từ nhà Samsung với chip
                        Snapdragon 8 Gen 3 For Galaxy mạnh mẽ, công nghệ tương lai Galaxy AI cùng khung viền Titan đẳng cấp
                        hứa hẹn sẽ mang tới nhiều sự thay đổi lớn về mặt thiết kế và cấu hình. SS Galaxy S24 bản Ultra sở
                        hữu màn hình 6.8 inch Dynamic AMOLED 2X tần số quét 120Hz. Máy cũng sở hữu camera chính 200MP,
                        camera zoom quang học 50MP, camera tele 10MP và camera góc siêu rộng 12MP.
                    </p>
                </div>
                <div class="fag-box">
                    <p><strong>Câu hỏi thường gặp</strong></p>
                    @foreach ($faq as $item)
                        <div class="fag-element">
                            <p>
                                <a class="question" data-bs-toggle="collapse" href="#{{ $item->id_faq_question }}"
                                    role="button" aria-expanded="false" aria-controls="collapseExample">
                                    {{ $item->question }}
                                    <i class="bi bi-arrow-right"></i>

                                </a>
                            </p>
                            <div class="collapse" id="{{ $item->id_faq_question }}">
                                <div class="card card-body">
                                    {{ $item->answer }}
                                </div>
                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
            <div class="col-md-4">
                <div class="technical-table">
                    <p class="title-table"><strong>Thông số kỹ thuật</strong></p>
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                                <th scope="row">Màn hình</th>
                                <td>{{ $detail->size_screen }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Camera sau</th>
                                <td>{{ $detail->cam_sau }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Camera trước</th>
                                <td>{{ $detail->cam_truoc }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Chip set</th>
                                <td>{{ $detail->chipset }}</td>
                            </tr>
                            <tr>
                                <th scope="row">RAM</th>
                                <td>{{ $detail->ram }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Bộ nhớ trong</th>
                                <td>{{ $detail->bo_nho_trong }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Pin</th>
                                <td>{{ $detail->battery }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Sim</th>
                                <td>{{ $detail->sim }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tính năng đặc biệt</th>
                                <td>{{ $detail->features }}</td>
                            </tr>
                            <tr>
                                <th scope="row">Tình trạng</th>
                                <td>{{ $detail->availability }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="hr-divider"></div>
                <h1> Sản phẩm liên quan</h1>
                <div class='row'>
                    @foreach ($related_product as $product)
                        <div class="col-md-3">
                            <div class="card">
                                <a href="{{ route('showDetailProduct', $product->id) }}">
                                    <img src="{{ $product->image_url }}" class="card-img-top" alt="...">

                                </a>
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <div class = "d-flex justify-content-between">
                                        @if ($product->dis_price == 0)
                                            <p class="card-text price ">{{ number_format($product->init_price) }}
                                                vnd</p>
                                        @else
                                            <p class="card-text price ">{{ number_format($product->dis_price) }}
                                                vnd</p>
                                            <p class="card-text promotion">
                                                {{ number_format($product->init_price) }}</p>
                                        @endif
                                    </div>
                                    <a href="#" class="btn btn-outline-success">
                                        <i class="bi bi-cart-plus"></i>
                                        Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="pagiante">
                    {{ $related_product->links() }}
                </div>
            </div>
        </div>
    </div>

    </div>

@stop
