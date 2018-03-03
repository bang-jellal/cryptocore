<div class="header-wrapicon2">
    <img src="{{ asset('template/fashe/images/icons/icon-header-02.png') }}"
         class="header-icon1 js-show-header-dropdown" alt="ICON">
    <span class="header-icons-noti">0</span>
    @guest
        <div class="header-cart header-dropdown">
            <div class="header-cart-total" style="text-align: center">
                You do not have a shopping cart, please log in or register
            </div>

            <div class="header-cart-buttons">
                <div class="header-cart-wrapbtn">
                    <!-- Button -->
                    <a href="{{ route('login') }}"
                       class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                        Login
                    </a>
                </div>

                <div class="header-cart-wrapbtn">
                    <!-- Button -->
                    <a href="{{ route('register') }}"
                       class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                        Register
                    </a>
                </div>
            </div>
        </div>
    @else
        <div class="header-cart header-dropdown">
            <ul class="header-cart-wrapitem">
                <li class="header-cart-item">
                    <div class="header-cart-item-img">
                        <img src="{{ asset('template/fashe/images/item-cart-02.jpg') }}" alt="IMG">
                    </div>

                    <div class="header-cart-item-txt">
                        <a href="#" class="header-cart-item-name">
                            Converse All Star Hi Black Canvas
                        </a>

                        <span class="header-cart-item-info">
											1 x $39.00
										</span>
                    </div>
                </li>
            </ul>
            <div class="header-cart-total">
                Total: $75.00
            </div>
            <div class="header-cart-buttons">
                <div class="header-cart-wrapbtn">
                    <a href="cart.html" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                        View Cart
                    </a>
                </div>
                <div class="header-cart-wrapbtn">
                    <a href="#" class="flex-c-m size1 bg1 bo-rad-20 hov1 s-text1 trans-0-4">
                        Check Out
                    </a>
                </div>
            </div>
        </div>
    @endguest
</div>