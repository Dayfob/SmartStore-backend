<!-- Top Bar
		============================================= -->
<div id="top-bar">
    <div class="container">

        <div class="row justify-content-between align-items-center">
            <div class="col-12 col-md-auto">
                <p class="mb-0 py-2 text-center text-md-start"><strong>Call:</strong> 1800-547-2145 | <strong>Email:</strong> info@canvas.com</p>
            </div>

            <div class="col-12 col-md-auto">

                <!-- Top Links
                ============================================= -->
                <div class="top-links on-click">
                    <ul class="top-links-container">
                        <li class="top-links-item"><a href="#">Login</a>
                            <div class="top-links-section">
                                <form id="top-login" autocomplete="off">
                                    <div class="form-group">
                                        <label>Username</label>
                                        <input type="email" class="form-control" placeholder="Email address">
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input type="password" class="form-control" placeholder="Password" required="">
                                    </div>
                                    <div class="form-group form-check">
                                        <input class="form-check-input" type="checkbox" value="" id="top-login-checkbox">
                                        <label class="form-check-label" for="top-login-checkbox">Remember Me</label>
                                    </div>
                                    <button class="btn btn-danger w-100" type="submit">Sign in</button>
                                </form>
                            </div>
                        </li>
                    </ul>
                </div><!-- .top-links end -->

            </div>
        </div>

    </div>
</div><!-- #top-bar end -->

<!-- Header
============================================= -->
<header id="header" class="header-size-sm">
    <div class="container">
        <div class="header-row flex-column flex-lg-row justify-content-center justify-content-lg-start">

            <!-- Logo
            ============================================= -->
            <div id="logo" class="me-0 me-lg-auto">
                <a href="index.blade.php" class="standard-logo" data-dark-logo="{{ asset('images/logo-dark.png') }}"><img src="{{ asset('images/logo.png') }}" alt="Canvas Logo"></a>
                <a href="index.blade.php" class="retina-logo" data-dark-logo="{{ asset('images/logo-dark@2x.png') }}"><img src="{{ asset('images/logo@2x.png') }}" alt="Canvas Logo"></a>
            </div><!-- #logo end -->

            <div class="header-misc mb-4 mb-lg-0 order-lg-last">

                <ul class="header-extras me-0 me-lg-4">
                    <li>
                        <i class="i-plain icon-thumbs-up2 m-0"></i>
                        <div class="he-text">
                            Original Brands
                            <span>100% Guaranteed</span>
                        </div>
                    </li>
                    <li>
                        <i class="i-plain icon-truck2 m-0"></i>
                        <div class="he-text">
                            Free Shipping
                            <span>for $20 or more</span>
                        </div>
                    </li>
                    <li>
                        <i class="i-plain icon-undo m-0"></i>
                        <div class="he-text">
                            30-Day Returns
                            <span>Completely Free</span>
                        </div>
                    </li>
                </ul>

            </div>

        </div>
    </div>

    <div id="header-wrap" class="border-top border-f5">
        <div class="container">
            <div class="header-row justify-content-between">

                <div class="header-misc">

                    <!-- Top Cart
                    ============================================= -->
                    <div id="top-cart" class="header-misc-icon d-none d-sm-block">
                        <a href="#" id="top-cart-trigger"><i class="icon-line-bag"></i><span class="top-cart-number">5</span></a>
                        <div class="top-cart-content">
                            <div class="top-cart-title">
                                <h4>Shopping Cart</h4>
                            </div>
                            <div class="top-cart-items">
                                <div class="top-cart-item">
                                    <div class="top-cart-item-image">
                                        <a href="#"><img src="{{ asset('images/shop/small/1.jpg') }}" alt="Blue Round-Neck Tshirt" /></a>
                                    </div>
                                    <div class="top-cart-item-desc">
                                        <div class="top-cart-item-desc-title">
                                            <a href="#">Blue Round-Neck Tshirt with a Button</a>
                                            <span class="top-cart-item-price d-block">$19.99</span>
                                        </div>
                                        <div class="top-cart-item-quantity">x 2</div>
                                    </div>
                                </div>
                                <div class="top-cart-item">
                                    <div class="top-cart-item-image">
                                        <a href="#"><img src="{{ asset('images/shop/small/6.jpg') }}" alt="Light Blue Denim Dress" /></a>
                                    </div>
                                    <div class="top-cart-item-desc">
                                        <div class="top-cart-item-desc-title">
                                            <a href="#">Light Blue Denim Dress</a>
                                            <span class="top-cart-item-price d-block">$24.99</span>
                                        </div>
                                        <div class="top-cart-item-quantity">x 3</div>
                                    </div>
                                </div>
                            </div>
                            <div class="top-cart-action">
                                <span class="top-checkout-price">$114.95</span>
                                <a href="#" class="button button-3d button-small m-0">View Cart</a>
                            </div>
                        </div>
                    </div><!-- #top-cart end -->

                </div>

                <div id="primary-menu-trigger">
                    <svg class="svg-trigger" viewBox="0 0 100 100"><path d="m 30,33 h 40 c 3.722839,0 7.5,3.126468 7.5,8.578427 0,5.451959 -2.727029,8.421573 -7.5,8.421573 h -20"></path><path d="m 30,50 h 40"></path><path d="m 70,67 h -40 c 0,0 -7.5,-0.802118 -7.5,-8.365747 0,-7.563629 7.5,-8.634253 7.5,-8.634253 h 20"></path></svg>
                </div>

                <!-- Primary Navigation
                ============================================= -->
                <nav class="primary-menu">

                    <ul class="menu-container">
                        <li class="menu-item">
                            <a class="menu-link" href="index.blade.php"><div>Home</div></a>
                            <ul class="sub-menu-container">
                                <li class="menu-item">
                                    <a class="menu-link" href="intro.html#section-niche"><div>Niche Demos</div></a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="intro.html#section-onepage"><div>One-Page Demos</div></a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="index-corporate.html"><div>Home - Corporate</div></a>
                                    <ul class="sub-menu-container">
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-corporate.html"><div>Corporate - Layout 1</div></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-corporate-2.html"><div>Corporate - Layout 2</div></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-corporate-3.html"><div>Corporate - Layout 3</div></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-corporate-4.html"><div>Corporate - Layout 4</div></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="index-portfolio.html"><div>Home - Portfolio</div></a>
                                    <ul class="sub-menu-container">
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-portfolio.html"><div>Portfolio - Layout 1</div></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-portfolio-2.html"><div>Portfolio - Layout 2</div></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-portfolio-3.html"><div>Portfolio - Masonry</div></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-portfolio-4.html"><div>Portfolio - AJAX</div></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="index-blog.html"><div>Home - Blog</div></a>
                                    <ul class="sub-menu-container">
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-blog.html"><div>Blog - Layout 1</div></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-blog-2.html"><div>Blog - Layout 2</div></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-blog-3.html"><div>Blog - Layout 3</div></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="index-shop.html"><div>Home - Shop</div></a>
                                    <ul class="sub-menu-container">
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-shop.html"><div>Shop - Layout 1</div></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-shop-2.html"><div>Shop - Layout 2</div></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="index-magazine.html"><div>Home - Magazine</div></a>
                                    <ul class="sub-menu-container">
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-magazine.html"><div>Magazine - Layout 1</div></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-magazine-2.html"><div>Magazine - Layout 2</div></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-magazine-3.html"><div>Magazine - Layout 3</div></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="landing.html"><div>Home - Landing Page</div></a>
                                    <ul class="sub-menu-container">
                                        <li class="menu-item">
                                            <a class="menu-link" href="landing.html"><div>Landing Page - Layout 1</div></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="landing-2.html"><div>Landing Page - Layout 2</div></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="landing-3.html"><div>Landing Page - Layout 3</div></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="landing-4.html"><div>Landing Page - Layout 4</div></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="landing-5.html"><div>Landing Page - Layout 5</div></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="index-fullscreen-image.html"><div>Home - Full Screen</div></a>
                                    <ul class="sub-menu-container">
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-fullscreen-image.html"><div>Full Screen - Image</div></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-fullscreen-slider.html"><div>Full Screen - Slider</div></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-fullscreen-video.html"><div>Full Screen - Video</div></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="index-onepage.html"><div>Home - One Page</div></a>
                                    <ul class="sub-menu-container">
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-onepage.html"><div>One Page - Default</div></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-onepage-2.html"><div>One Page - Submenu</div></a>
                                        </li>
                                        <li class="menu-item">
                                            <a class="menu-link" href="index-onepage-3.html"><div>One Page - Dots Style</div></a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="menu-item mega-menu mega-menu-small">
                                    <a class="menu-link" href="#"><div>Extras</div></a>
                                    <div class="mega-menu-content">
                                        <div class="row mx-0">
                                            <ul class="sub-menu-container mega-menu-column col">
                                                <li class="menu-item">
                                                    <a class="menu-link" href="index-wedding.html"><div>Wedding</div></a>
                                                </li>
                                                <li class="menu-item">
                                                    <a class="menu-link" href="index-restaurant.html"><div>Restaurant</div></a>
                                                </li>
                                                <li class="menu-item">
                                                    <a class="menu-link" href="index-events.html"><div>Events</div></a>
                                                </li>
                                            </ul>
                                            <ul class="sub-menu-container mega-menu-column col">
                                                <li class="menu-item">
                                                    <a class="menu-link" href="index-parallax.html"><div>Parallax</div></a>
                                                </li>
                                                <li class="menu-item">
                                                    <a class="menu-link" href="index-app-showcase.html"><div>App Showcase</div></a>
                                                </li>
                                                <li class="menu-item">
                                                    <a class="menu-link" href="index-boxed.html"><div>Boxed Layout</div></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </li>
                        <li class="menu-item mega-menu"><a class="menu-link" href="#"><div>Men</div></a>
                            <div class="mega-menu-content mega-menu-style-2">
                                <div class="container">
                                    <div class="row">
                                        <ul class="sub-menu-container mega-menu-column col-lg-3">
                                            <li class="menu-item mega-menu-title"><a class="menu-link" href="#"><div>Footwear</div></a>
                                                <ul class="sub-menu-container">
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Casual Shoes</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Formal Shoes</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Sports shoes</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Flip Flops</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Slippers</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Sports Sandals</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Party Shoes</div></a></li>
                                                </ul>
                                            </li>
                                        </ul>

                                        <ul class="sub-menu-container mega-menu-column col-lg-3">
                                            <li class="menu-item mega-menu-title"><a class="menu-link" href="#"><div>Clothing</div></a>
                                                <ul class="sub-menu-container">
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Casual Shirts</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>T-Shirts</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Collared Tees</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Pants / Trousers</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Ethnic Wear</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Jeans</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Sweamwear</div></a></li>
                                                </ul>
                                            </li>
                                        </ul>

                                        <ul class="sub-menu-container mega-menu-column col-lg-3">
                                            <li class="menu-item mega-menu-title"><a class="menu-link" href="#"><div>Accessories</div></a>
                                                <ul class="sub-menu-container">
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Bags &amp; Backpacks</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Watches</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Sunglasses</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Wallets</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Caps &amp; Hats</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Jewellery</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Belts, Ties</div></a></li>
                                                </ul>
                                            </li>
                                        </ul>

                                        <ul class="sub-menu-container mega-menu-column col-lg-3">
                                            <li class="menu-item mega-menu-title"><a class="menu-link" href="#"><div>New Arrivals</div></a>
                                                <ul class="sub-menu-container">
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>T-Shirts</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Formal Shoes</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Accessories</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Watches</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Perfumes</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Belts, Ties</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Formal Shirts</div></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="menu-item mega-menu mega-menu-small"><a class="menu-link" href="#"><div>Women</div></a>
                            <div class="mega-menu-content mega-menu-style-2">
                                <div class="container">
                                    <div class="row">
                                        <ul class="sub-menu-container mega-menu-column col-6">
                                            <li class="menu-item mega-menu-title"><a class="menu-link" href="#"><div>Footwear</div></a>
                                                <ul class="sub-menu-container">
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Casual Shoes</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Formal Shoes</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Sports shoes</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Flip Flops</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Slippers</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Sports Sandals</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Party Shoes</div></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                        <ul class="sub-menu-container mega-menu-column col-6">
                                            <li class="menu-item mega-menu-title"><a class="menu-link" href="#"><div>Clothing</div></a>
                                                <ul class="sub-menu-container">
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Casual Shirts</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>T-Shirts</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Collared Tees</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Pants / Trousers</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Ethnic Wear</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Jeans</div></a></li>
                                                    <li class="menu-item"><a class="menu-link" href="#"><div>Sweamwear</div></a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </li><!-- .mega-menu end -->
                        <li class="menu-item"><a class="menu-link" href="#"><div>Accessories</div></a></li>
                        <li class="menu-item"><a class="menu-link" href="#"><div>Sale</div></a></li>
                        <li class="menu-item"><a class="menu-link" href="#"><div>Blog</div></a></li>
                        <li class="menu-item"><a class="menu-link" href="#"><div>Videos</div></a></li>
                        <li class="menu-item"><a class="menu-link" href="#"><div>Contact</div></a></li>
                    </ul>

                </nav><!-- #primary-menu end -->

            </div>

        </div>
    </div>
    <div class="header-wrap-clone"></div>
</header><!-- #header end -->
