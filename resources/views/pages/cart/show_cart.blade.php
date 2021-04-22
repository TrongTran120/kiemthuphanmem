@extends('welcome')
@section('content')
<section id="cart_items">
    <div class="table-responsive cart_info" >
        <?php
        $content = Cart::content();
        ?>
        <table class="table table-condensed" >
            <thead>
                <tr class="cart_menu">
                    <td class="image">Hình ảnh</td>
                    <td class="description">Mô tả</td>
                    <td class="price">Giá</td>
                    <td class="quantity">Số lượng</td>
                    <td class="total">Tổng tiền</td>
                    <td style=" width: 40px;"></td>
                </tr>
            </thead>
            <tbody >
                @foreach($content as $v_content)
                <tr>
                    <td class="cart_product" width="60" >
                        <img src="{{{'public/upload/product/'.$v_content->options->image}}}" alt="" width="50" />
                    </td>
                    <td class="cart_description">
                        <h4><a href="">{{$v_content->name}}</a></h4>
                        <p>ID: {{$v_content->id}}</p>
                    </td>
                    <td class="cart_price">
                        <p>{{number_format($v_content->price,0,',','.').' VNĐ'}}</p>
                    </td>
                    <td class="cart_quantity">
                        <div class="cart_quantity_button">
                            <form action="{{URL::to('/update-cart-qty')}}" method="post">
                                {{csrf_field()}}
                                <input class="cart_quantity_input form-control" style="width: auto; margin-right: 10px;" type="number" min="1" name="quantity" value="{{$v_content->qty}}" autocomplete="off" size="2">
                                <input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="btn btn-default btn-sm">
                                <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-default">
                            </form>

                        </div>
                    </td>
                    <td class="cart_total">
                        <p class="cart_total_price">
                            <?php
                            $subtotal = $v_content->price * $v_content->qty;
                            echo number_format($subtotal,0,',','.') . ' VNĐ';
                            $tong=0;
                            ?>
                        </p>
                    </td>
                    <td class="cart_delete">
                        <a class="cart_quantity_delete" href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</section>
<section id="do_action">
        <div class="row">
            <div class="col-sm-6" style="float:none;margin:auto;">
                <div class="total_area">
                    <ul class="noPadding">
                        <?php $tong=0; ?>
                         @foreach($content as $v_content)
                         <?php
                                   
                                $total = $v_content->price * $v_content->qty;
                                $tong+= $total;            
                                ?>
                         @endforeach
                         <li>Tổng <span><?php echo number_format($tong,0,',','.') . ' VNĐ'?></span></li>
                        <li>Thuế <span>{{Cart::tax(0,',','.').' VNĐ'}} </span></li>
                        <li>Phí vận chuyển <span>Free</span></li>
                        <li>Thành tiền <span>{{Cart::total(0,',','.').' VNĐ'}}</span></li>            
                    </ul>
                    <div class="centerBtn">                    
                    <?php
                    $customer_id = Session::get('customer_id');
                    if ($customer_id == NULL) {
                    ?>
                        <a class="btn btn-default check_out" href="{{URL::to('/login-checkout')}}">Thanh toán</a>
                    <?php
                    } else {
                    ?>
                        <a class="btn btn-default check_out" href="{{URL::to('/checkout')}}">Thanh toán</a>
                    <?php
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
</section>
<!--/#do_action-->





@endsection