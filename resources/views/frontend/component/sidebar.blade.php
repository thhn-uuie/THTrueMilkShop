<div class="welcome">
    <label>Xin chào</label>
    <div class="name">{{ \Illuminate\Support\Facades\Auth::user()->name }}</div>
</div>
<div class="block account-nav">
    <div class="title account-nav-title"></div>
    <div class="content account-nav-content">
        <ul class="nav items">
            <li class="nav item">
                <a href="{{route('user.user_account')}}">Thông tin tài khoản</a>
            </li>
            <li class="nav item">
                <a href="{{route('user.order.orders')}}">Quản lý đơn hàng</a>
            </li>
            <li class="nav item">
                <a href="https://www.thtruemart.vn/customer/account/passwordforgot/">Đổi mật
                    khẩu</a>
            </li>
            <li class="nav item">
                <a href="{{asset('/logout')}}">Đăng xuất</a>
            </li>
        </ul>
    </div>
</div>
