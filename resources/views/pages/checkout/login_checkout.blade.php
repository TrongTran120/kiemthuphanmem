@extends('welcome')
@section('content')
<section id="form">
    <!--form-->
    <div class="container">
        <div class="row">
            <div class="col-sm-4 col-sm-offset-1">
                <div class="login-form">
                    <!--login form-->
                    <h2>Đăng nhập</h2>
                    <form action="{{URL::to('/login-customer')}}" method="post">
                        {{csrf_field()}}
                        <input type="email" name="email" placeholder="Tài khoản" required="" />
                        <input type="password" name="password" placeholder="Mật khẩu" required=""/>
                        <span>
                            <input type="checkbox" class="checkbox">
                            Lưu đăng nhập
                        </span>
                        <button type="submit" class="btn btn-default">Đăng nhập</button>
                    </form>
                </div>
                <!--/login form-->
            </div>
            <div class="col-sm-1">
                <h2 class="or">Hoặc</h2>
            </div>
            <div class="col-sm-4">
                <div class="signup-form">
                    <!--sign up form-->
                    <h2>Đăng ký!</h2>
                    <form action="{{URL::to('/add-customer')}}" method="post">
                        {{csrf_field()}}
                        <input type="text" name="customer_name" placeholder="Họ tên" required="" title="Tên phải trên 3 ký tự" minlength="3" maxlength="30" />
                        <input type="email" name="customer_email" placeholder="Email" required=""  title="Email không hợp lệ" maxlength="30"  />
                        <input type="password" name="customer_pass" placeholder="Mật khẩu" minlength="3" maxlength="20" pattern="^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?!.*\s).*$" title="Mật khẩu phải chứa ít nhất 1 kí tự viết hoa, 1 kí tự viết thường và 1 chữ số" required=""/>
                        <input type="text" name="customer_phone" placeholder="Điện thoại" required="" title= "Số điện thoại không hợp lệ"  pattern="(\+84|0)\d{9,10}"/>
                        <button type="submit" class="btn btn-default">Đăng ký</button>
                    </form>
                </div>
                <!--/sign up form-->
            </div>
        </div>
    </div>
</section>
<!--/form-->
@endsection