<form action="#">
    <div class="table-content table-responsive">
        <table class="table">
            <thead>
                <tr>
                    <th class="li-product-thumbnail">Hình sản phẩm</th>
                    <th class="cart-product-name">Tên sản phẩm</th>
                    <th class="li-product-price">Đơn giá</th>
                    <th class="li-product-quantity">Số lượng</th>
                    <th class="li-product-subtotal">Tổng tiền</th>
                    <th class="li-product-remove">Xóa</th>
                    <th class="li-product-edit">Sửa</th>
                </tr>
            </thead>
            <tbody>
                @if(Session::has("Cart") != null)
                @foreach (Session::get('Cart')->sanphams as $item)
                <tr>
                    <td class="li-product-thumbnail"><a href="#"><img style="height: 200px;" src="{{asset("/images/product/".$item['sanphaminfo']->hinhanh)}}" alt="Image"></a></td>
                    <td class="li-product-name"><a href="#">{{$item['sanphaminfo']->tensp}}</a></td>
                    <td class="li-product-price"><span class="amount">{{number_format($item['sanphaminfo']->dongia)}}₫</span></td>
                    <td class="quantity">
                        <!-- <label>Quantity</label> -->
                        <div class="cart-plus-minus">
                            <input class="cart-plus-minus-box" id="sl-{{$item['sanphaminfo']->ma_sp}}" value="{{$item['sl']}}" type="text">
                            <div class="dec qtybutton"><i class="fa fa-angle-down"></i></div>
                            <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                        </div>
                    </td>
                    <td class="product-subtotal"><span class="amount">{{number_format($item['gia'])}}₫</span></td>
                    <td class="li-product-remove">
                        <a href="#">
                            <i class="fa fa-times" onclick="deletelistCart({{$item['sanphaminfo']->ma_sp}})"></i>
                        </a>
                    </td>
                    <td class="li-product-edit">
                        <a href="#">
                            <i data-id="{{$item['sanphaminfo']->ma_sp}}" onclick="savelistCart({{$item['sanphaminfo']->ma_sp}})" class="fa fa-floppy-o"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>
    <div class="row">
        <div class="col-md-5 ml-auto">
            <div class="cart-page-total">
                <h2>Tổng giỏ hàng</h2>
                <ul>
                    @if(Session::has("Cart") != null)
                        <li>Tổng số lượng <span>{{(Session::get('Cart')->tongsl)}}</span></li>
                        <li>Tổng tiền <span>{{number_format(Session::get('Cart')->tongtien)}} ₫</span></li>
                    @else
                        <li>Tổng số lượng <span>0</span></li>
                        <li>Tổng tiền <span>0 ₫</span></li>
                    @endif
                   
                </ul>
                <a  href="{{route('checkout')}}" >Thanh Toán</a>
            </div>
        </div>
    </div>
</form>