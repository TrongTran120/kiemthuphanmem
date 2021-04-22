@extends('welcome')
@section('content')

<section id="cart_items">
    <div class="container">
        <div class="breadcrumbs">
            <ol class="breadcrumb">
                <li><a href="{{URL::to('/')}}">Trang chủ</a></li>
                <li class="active">Thanh toán</li>
            </ol>
        </div>

        <div class="register-req">
            <p>Làm ơn đăng ký hoặc đăng nhập để thanh toán giỏ hàng</p>
        </div>
        <!--/register-req-->

        <div class="shopper-informations">
            <div class="row">

                <div class="col-sm-10 clearfix">
                    <div class="bill-to">
                        <p>Điền thông tin</p>
                        <div class="form-one">
                            <form method="post" action="{{URL::to('/save-checkout-customer')}}">
                                {{csrf_field()}}
                                <input type="email" name="shipping_email" placeholder="Email*" required="">
                                <input type="text" name="shipping_name" placeholder="Họ tên *" required="">
                                <input type="text" name="shipping_address" placeholder="Địa chỉ *" required="">
                                <input type="number" name="shipping_phone" placeholder="Điện thoại *" required="" title= "Số điện thoại không hợp lệ"  pattern="(\+84|0)\d{9,10}">
                                <textarea rows="16" name="shipping_notes" id="exampleInputPassword1" placeholder="Ghi chú đơn hàng của bạn ..." required=""></textarea>
                                <input type="submit" value="Gửi" name="send_order" class="btn btn-primary btn-sm">
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="review-payment">
            <h2>Xem lại giỏ hàng</h2>
        </div>

        <div class="payment-options">
            <span>
                <label><input type="checkbox"> Direct Bank Transfer</label>
            </span>
            <span>
                <label><input type="checkbox"> Check Payment</label>
            </span>
            <span>
                <label><input type="checkbox"> Paypal</label>
            </span>
        </div>
    </div>
</section>
<!--/#cart_items-->

@endsection