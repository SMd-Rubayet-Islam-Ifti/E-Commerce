<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>E-Commerce Website</title>

    <!--
      - favicon
    -->
    <link rel="shortcut icon" href="./assets/images/logo/favicon.ico" type="image/x-icon">

    <!--
      - custom css link
    -->
    <link rel="stylesheet" href="{{asset('css/style-prefix.css')}}">

    <!--
      - google font link*
    -->

    <script src="//code.tidio.co/2l8awmiopxub2rsj7vuajrnkxy2xnqln.js" async></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap"
          rel="stylesheet">

</head>

<body>
<input type="hidden" name="id" value="{{$user->id}}">
<div class="overlay" data-overlay></div>

@if ($subscribe->contains('Subscriber', $user->email))
    <!-- Subscriber Welcome Modal -->
{{--    <div class="modal" data-modal>--}}
{{--        <div class="modal-close-overlay" data-modal-overlay></div>--}}
{{--        <div class="modal-content">--}}
{{--            <button class="modal-close-btn" data-modal-close>--}}
{{--                <ion-icon name="close-outline"></ion-icon>--}}
{{--            </button>--}}
{{--            <div class="newsletter-img">--}}
{{--                <img src="{{asset('logo/cam-morin-knKm7u_7Ihw-unsplash.jpg')}}" alt="subscribe newsletter" width="400" height="400">--}}
{{--            </div>--}}
{{--            <div class="newsletter">--}}
{{--                <div class="newsletter-header">--}}
{{--                    <h3 class="newsletter-title">Subscribe Newsletter.</h3>--}}
{{--                    <p class="newsletter-desc">--}}
{{--                        Welcome <b>{{$user->name}}</b> to our <b>Ecommerce</b>.--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}
@else
    <!-- Non-Subscriber Modal -->
    <div class="modal" data-modal>
        <div class="modal-close-overlay" data-modal-overlay></div>
        <div class="modal-content">
            <button class="modal-close-btn" data-modal-close>
                <ion-icon name="close-outline"></ion-icon>
            </button>
            <div class="newsletter-img">
                <img src="{{asset('logo/cam-morin-knKm7u_7Ihw-unsplash.jpg')}}" alt="subscribe newsletter" width="400" height="400">
            </div>
            <div class="newsletter">
                <form action="{{route('subscribes',['id'=>$user->id])}}" method="post">
                    @csrf
                    <div class="newsletter-header">
                        <h3 class="newsletter-title">Subscribe Newsletter.</h3>
                        <p class="newsletter-desc">
                            Subscribe to <b>Ecommerce</b> to get the latest product updates and discounts.
                        </p>
                    </div>
                    <input type="email" name="email" class="email-field" placeholder="Email Address" required>
                    <button type="submit" class="btn-newsletter">Subscribe</button>
                </form>
            </div>
        </div>
    </div>
@endif





<!--
  - NOTIFICATION TOAST
-->

<div class="notification-toast" data-toast>

    <button class="toast-close-btn" data-toast-close>
        <ion-icon name="close-outline"></ion-icon>
    </button>

    <div class="toast-banner">
        <img  src="{{asset('storage/' . $product3->pro_pic)}}" alt="Lafz Perfume" width="80" height="70">
    </div>

    <div class="toast-detail">

        <p class="toast-message">
            @if ($product3->customer_id == $user->id)
                You just bought
            @else
                {{$product3->customer_name}} just bought
            @endif
        </p>

        <p class="toast-title">
            {{$product3->pro_des}}
        </p>

        <p class="toast-meta" id="timeElapsed">
            <time datetime="PT2M">2 Minutes</time> ago
        </p>

    </div>

</div>





<!--
  - HEADER
-->

<header>

    <div class="header-top">

        <div class="container">

            <ul class="header-social-container">

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </li>

            </ul>

            <div class="header-alert-news">
                <p>
                    <b>Free Shipping</b>
                    This Week Order Over - $55
                </p>
            </div>

            <div class="header-top-actions">

                <select name="currency" id="currency">

                    <option value="usd">USD &dollar;</option>
                    <option value="eur">EUR &euro;</option>
                    <option value="bdt">BDT &#2547;</option>

                </select>

                <select name="language">

                    <option value="en-US">English</option>
                    <option value="es-ES">Espa&ntilde;ol</option>
                    <option value="fr">Fran&ccedil;ais</option>

                </select>

            </div>

        </div>

    </div>

    <div class="header-main">

        <div class="container">

            <a href="#" class="header-logo">
                <img src="{{asset('logo/logo.svg')}}" alt="Anon's logo" width="120" height="36">
            </a>

            <div class="header-search-container">
                <form action="{{route('allproduct2',['id'=>$user->id])}}" method="get">
                    @csrf
                <input type="search" name="search" class="search-field" placeholder="Enter your product name...">

                <button class="search-btn" type="submit">
                    <ion-icon name="search-outline"></ion-icon>
                </button>
                </form>
            </div>

            <div class="header-user-actions">

                <!-- <a href="{{route('login')}}" class="action-btn">
            <ion-icon name="person-outline"></ion-icon>
        </a> -->

                <button class="action-btn">
                    <ion-icon name="heart-outline"></ion-icon>
                    <span class="count">0</span>
                </button>

                <a class="action-btn" href="{{ route('cart',['id' => $user->id]) }}">
                    <ion-icon name="bag-handle-outline"></ion-icon>
                    <span class="count">{{ $total }}</span>
                </a>

            </div>

        </div>

    </div>

    <nav class="desktop-navigation-menu">

        <div class="container">

            <ul class="desktop-menu-category-list">

                <li class="menu-category">
                    <a href="#" class="menu-title">Home</a>

                <li class="menu-category">
                    <a href="{{route('aboutus',['id'=>$user->id])}}" class="menu-title">About Us</a>
                </li>
                <li class="menu-category">
                    <a href="#" class="menu-title">Categories</a>
                    <ul class="dropdown-list">

                        @foreach($category as $cata)
                            <li class="dropdown-item">
                                <a href="{{route('productlist2',['id'=>$user->id,'category'=>$cata->Category_Name])}}">{{$cata->Category_Name}}</a>
                            </li>
                        @endforeach

                    </ul>
                </li>

                <li class="menu-category">
                    <a href="#" class="menu-title">Hot Offers</a>
                </li>


{{--                <li class="menu-category">--}}
{{--                    <a href="#" class="menu-title">Categories</a>--}}

{{--                    <div class="dropdown-panel">--}}

{{--                        <ul class="dropdown-panel-list">--}}

{{--                            <li class="menu-title">--}}
{{--                                <a href="#">Kids</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">Shirt</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">T-Shirt</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">Shoes</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">Diaper</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">Toy</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="{{asset('logo/electronics-banner-1.jpg')}}" alt="headphone collection" width="250"--}}
{{--                                         height="119">--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}

{{--                        <ul class="dropdown-panel-list">--}}

{{--                            <li class="menu-title">--}}
{{--                                <a href="#">Men's</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">Formal</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">Casual</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">Sports</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">Jacket</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">Sunglasses</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="{{asset('logo/mens-banner.jpg')}}" alt="men's fashion" width="250" height="119">--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}

{{--                        <ul class="dropdown-panel-list">--}}

{{--                            <li class="menu-title">--}}
{{--                                <a href="#">Women's</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">Formal</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">Casual</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">Perfume</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">Cosmetics</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">Bags</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="{{asset('logo/womens-banner.jpg')}}" alt="women's fashion" width="250" height="119">--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}

{{--                        <ul class="dropdown-panel-list">--}}

{{--                            <li class="menu-title">--}}
{{--                                <a href="#">Electronics</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">Smart Watch</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">Smart TV</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">Keyboard</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">Mouse</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">Microphone</a>--}}
{{--                            </li>--}}

{{--                            <li class="panel-list-item">--}}
{{--                                <a href="#">--}}
{{--                                    <img src="{{asset('logo/electronics-banner-2.jpg')}}" alt="mouse collection" width="250" height="119">--}}
{{--                                </a>--}}
{{--                            </li>--}}

{{--                        </ul>--}}

{{--                    </div>--}}
{{--                </li>--}}



                <li class="menu-category">
                    <a href="#" class="menu-title">{{ $user->name }}</a>
                    <ul class="dropdown-list">

                        <li class="dropdown-item">
                            <a href="{{ route('purchase',['id'=>$user->id]) }}">Purchase History</a>
                        </li>

                        <li class="dropdown-item">

                            <a href="/">Logout</a>
                        </li>

                    </ul>
                </li>

            </ul>

        </div>

    </nav>

    <div class="mobile-bottom-navigation">

        <button class="action-btn" data-mobile-menu-open-btn>
            <ion-icon name="menu-outline"></ion-icon>
        </button>

        <a href="{{ route('cart', ['id' => $user->id]) }}" class="action-btn">
            <ion-icon name="bag-handle-outline"></ion-icon>
            <span class="count">{{ $total }}</span>
        </a>


        <button class="action-btn">
            <ion-icon name="home-outline"></ion-icon>
        </button>

        <button class="action-btn">
            <ion-icon name="heart-outline"></ion-icon>

            <span class="count">0</span>
        </button>

        <button class="action-btn" data-mobile-menu-open-btn>
            <ion-icon name="grid-outline"></ion-icon>
        </button>

    </div>

    <nav class="mobile-navigation-menu  has-scrollbar" data-mobile-menu>

        <div class="menu-top">
            <h2 class="menu-title">Menu</h2>

            <button class="menu-close-btn" data-mobile-menu-close-btn>
                <ion-icon name="close-outline"></ion-icon>
            </button>
        </div>

        <ul class="mobile-menu-category-list">

            <li class="menu-category">
                <a href="#" class="menu-title">Home</a>
            </li>

            <li class="menu-category">

                <button class="accordion-menu" data-accordion-btn>
                    <p class="menu-title">Men's</p>

                    <div>
                        <ion-icon name="add-outline" class="add-icon"></ion-icon>
                        <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                    </div>
                </button>

                <ul class="submenu-category-list" data-accordion>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Shirt</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Shorts & Jeans</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Safety Shoes</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Wallet</a>
                    </li>

                </ul>

            </li>

            <li class="menu-category">

                <button class="accordion-menu" data-accordion-btn>
                    <p class="menu-title">Women's</p>

                    <div>
                        <ion-icon name="add-outline" class="add-icon"></ion-icon>
                        <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                    </div>
                </button>

                <ul class="submenu-category-list" data-accordion>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Dress & Frock</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Earrings</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Necklace</a>
                    </li>

                    <li class="submenu-category">
                        <a href="#" class="submenu-title">Makeup Kit</a>
                    </li>

                </ul>

            </li>



            <li class="menu-category">
                <a href="{{route('aboutus',['id'=>$user->id])}}" class="menu-title">About Us</a>
            </li>

            <li class="menu-category">
                <a href="#" class="menu-title">Hot Offers</a>
            </li>

            <li class="menu-category">

                <button class="accordion-menu" data-accordion-btn>
                    <p class="menu-title">{{ $user->name }}</p>

                    <div>
                        <ion-icon name="add-outline" class="add-icon"></ion-icon>
                        <ion-icon name="remove-outline" class="remove-icon"></ion-icon>
                    </div>
                </button>

                <ul class="submenu-category-list" data-accordion>

                    <li class="submenu-category">
                        <a href="{{ route('purchase',['id'=>$user->id]) }}" class="submenu-title">Purchase History</a>
                    </li>

                    <li class="submenu-category">
                        <a href="/" class="submenu-title">Logout</a>
                    </li>

                </ul>

            </li>


        </ul>

        <div class="menu-bottom">

            <ul class="menu-category-list">

                <li class="menu-category">

                    <button class="accordion-menu" data-accordion-btn>
                        <p class="menu-title">Language</p>

                        <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                    </button>

                    <ul class="submenu-category-list" data-accordion>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">English</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Espa&ntilde;ol</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">Fren&ccedil;h</a>
                        </li>

                    </ul>

                </li>

                <li class="menu-category">
                    <button class="accordion-menu" data-accordion-btn>
                        <p class="menu-title">Currency</p>
                        <ion-icon name="caret-back-outline" class="caret-back"></ion-icon>
                    </button>

                    <ul class="submenu-category-list" data-accordion>
                        <li class="submenu-category">
                            <a href="#" class="submenu-title">USD &dollar;</a>
                        </li>

                        <li class="submenu-category">
                            <a href="#" class="submenu-title">EUR &euro;</a>
                        </li>
                    </ul>
                </li>

            </ul>

            <ul class="menu-social-container">

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-twitter"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </li>

                <li>
                    <a href="#" class="social-link">
                        <ion-icon name="logo-linkedin"></ion-icon>
                    </a>
                </li>

            </ul>

        </div>

    </nav>

</header>





<!--
  - MAIN
-->

<main>

    <!--
      - BANNER
    -->

    <div class="banner">

        <div class="container">

            <div class="slider-container has-scrollbar">

                <div class="slider-item">

                    <img src="{{asset('logo/banner-1.jpg')}}" alt="women's latest fashion sale" class="banner-img">

                    <div class="banner-content">

                        <p class="banner-subtitle">Trending item</p>

                        <h2 class="banner-title">Women's latest fashion sale</h2>

                        <p class="banner-text">
                            starting at &dollar; <b>20</b>.00
                        </p>

                        <a href="#" class="banner-btn">Shop now</a>

                    </div>

                </div>

                <div class="slider-item">

                    <img src="{{asset('logo/banner-2.jpg')}}" alt="modern sunglasses" class="banner-img">

                    <div class="banner-content">

                        <p class="banner-subtitle">Trending accessories</p>

                        <h2 class="banner-title">Modern sunglasses</h2>

                        <p class="banner-text">
                            starting at &dollar; <b>15</b>.00
                        </p>

                        <a href="#" class="banner-btn">Shop now</a>

                    </div>

                </div>

                <div class="slider-item">

                    <img src="{{asset('logo/banner-3.jpg')}}" alt="new fashion summer sale" class="banner-img">

                    <div class="banner-content">

                        <p class="banner-subtitle">Sale Offer</p>

                        <h2 class="banner-title">New fashion summer sale</h2>

                        <p class="banner-text">
                            starting at &dollar; <b>29</b>.99
                        </p>

                        <a href="#" class="banner-btn">Shop now</a>

                    </div>

                </div>

            </div>

        </div>

    </div>





    <!--
      - CATEGORY
    -->

{{--    <div class="category">--}}

{{--        <div class="container">--}}

{{--            <div class="category-item-container has-scrollbar">--}}

{{--                <div class="category-item">--}}

{{--                    <div class="category-img-box">--}}
{{--                        <img src="{{asset('logo/icons/dress.svg')}}" alt="dress & frock" width="30">--}}
{{--                    </div>--}}

{{--                    <div class="category-content-box">--}}

{{--                        <div class="category-content-flex">--}}
{{--                            <h3 class="category-item-title">Dress & frock</h3>--}}

{{--                            <p class="category-item-amount">(53)</p>--}}
{{--                        </div>--}}

{{--                        <a href="#" class="category-btn">Show all</a>--}}

{{--                    </div>--}}

{{--                </div>--}}

{{--                <div class="category-item">--}}

{{--                    <div class="category-img-box">--}}
{{--                        <img src="{{asset('logo/icons/coat.svg')}}" alt="winter wear" width="30">--}}
{{--                    </div>--}}

{{--                    <div class="category-content-box">--}}

{{--                        <div class="category-content-flex">--}}
{{--                            <h3 class="category-item-title">Winter wear</h3>--}}

{{--                            <p class="category-item-amount">(58)</p>--}}
{{--                        </div>--}}

{{--                        <a href="#" class="category-btn">Show all</a>--}}

{{--                    </div>--}}

{{--                </div>--}}

{{--                <div class="category-item">--}}

{{--                    <div class="category-img-box">--}}
{{--                        <img src="{{asset('logo/icons/glasses.svg')}}" alt="glasses & lens" width="30">--}}
{{--                    </div>--}}

{{--                    <div class="category-content-box">--}}

{{--                        <div class="category-content-flex">--}}
{{--                            <h3 class="category-item-title">Glasses & lens</h3>--}}

{{--                            <p class="category-item-amount">(68)</p>--}}
{{--                        </div>--}}

{{--                        <a href="#" class="category-btn">Show all</a>--}}

{{--                    </div>--}}

{{--                </div>--}}

{{--                <div class="category-item">--}}

{{--                    <div class="category-img-box">--}}
{{--                        <img src="{{asset('logo/icons/shorts.svg')}}" alt="shorts & jeans" width="30">--}}
{{--                    </div>--}}

{{--                    <div class="category-content-box">--}}

{{--                        <div class="category-content-flex">--}}
{{--                            <h3 class="category-item-title">Shorts & jeans</h3>--}}

{{--                            <p class="category-item-amount">(84)</p>--}}
{{--                        </div>--}}

{{--                        <a href="#" class="category-btn">Show all</a>--}}

{{--                    </div>--}}

{{--                </div>--}}

{{--                <div class="category-item">--}}

{{--                    <div class="category-img-box">--}}
{{--                        <img src="{{asset('logo/icons/tee.svg')}}" alt="t-shirts" width="30">--}}
{{--                    </div>--}}

{{--                    <div class="category-content-box">--}}

{{--                        <div class="category-content-flex">--}}
{{--                            <h3 class="category-item-title">T-shirts</h3>--}}

{{--                            <p class="category-item-amount">(35)</p>--}}
{{--                        </div>--}}

{{--                        <a href="#" class="category-btn">Show all</a>--}}

{{--                    </div>--}}

{{--                </div>--}}

{{--                <div class="category-item">--}}

{{--                    <div class="category-img-box">--}}
{{--                        <img src="{{asset('logo/icons/jacket.svg')}}" alt="jacket" width="30">--}}
{{--                    </div>--}}

{{--                    <div class="category-content-box">--}}

{{--                        <div class="category-content-flex">--}}
{{--                            <h3 class="category-item-title">Jacket</h3>--}}

{{--                            <p class="category-item-amount">(16)</p>--}}
{{--                        </div>--}}

{{--                        <a href="#" class="category-btn">Show all</a>--}}

{{--                    </div>--}}

{{--                </div>--}}

{{--                <div class="category-item">--}}

{{--                    <div class="category-img-box">--}}
{{--                        <img src="{{asset('logo/icons/watch.svg')}}" alt="watch" width="30">--}}
{{--                    </div>--}}

{{--                    <div class="category-content-box">--}}

{{--                        <div class="category-content-flex">--}}
{{--                            <h3 class="category-item-title">Watch</h3>--}}

{{--                            <p class="category-item-amount">(27)</p>--}}
{{--                        </div>--}}

{{--                        <a href="#" class="category-btn">Show all</a>--}}

{{--                    </div>--}}

{{--                </div>--}}

{{--                <div class="category-item">--}}

{{--                    <div class="category-img-box">--}}
{{--                        <img src="{{asset('logo/icons/hat.svg')}}" alt="hat & caps" width="30">--}}
{{--                    </div>--}}

{{--                    <div class="category-content-box">--}}

{{--                        <div class="category-content-flex">--}}
{{--                            <h3 class="category-item-title">Hat & caps</h3>--}}

{{--                            <p class="category-item-amount">(39)</p>--}}
{{--                        </div>--}}

{{--                        <a href="#" class="category-btn">Show all</a>--}}

{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}

{{--        </div>--}}

{{--    </div>--}}





    <!--
      - PRODUCT
    -->

    <div class="product-container">

        <div class="container">


            <!--
              - SIDEBAR
            -->

{{--            <div class="sidebar  has-scrollbar" data-mobile-menu>--}}

{{--                <div class="sidebar-category">--}}

{{--                    <div class="sidebar-top">--}}
{{--                        <h2 class="sidebar-title">Category</h2>--}}

{{--                        <button class="sidebar-close-btn" data-mobile-menu-close-btn>--}}
{{--                            <ion-icon name="close-outline"></ion-icon>--}}
{{--                        </button>--}}
{{--                    </div>--}}

{{--                    <ul class="sidebar-menu-category-list">--}}

{{--                        <li class="sidebar-menu-category">--}}

{{--                            <button class="sidebar-accordion-menu" data-accordion-btn>--}}

{{--                                <div class="menu-title-flex">--}}
{{--                                    <img src="{{asset('logo/icons/dress.svg')}}" alt="clothes" width="20" height="20"--}}
{{--                                         class="menu-title-img">--}}

{{--                                    <p class="menu-title">Men's and Women's</p>--}}
{{--                                </div>--}}

{{--                                <div>--}}
{{--                                    <ion-icon name="add-outline" class="add-icon"></ion-icon>--}}
{{--                                    <ion-icon name="remove-outline" class="remove-icon"></ion-icon>--}}
{{--                                </div>--}}

{{--                            </button>--}}

{{--                            <ul class="sidebar-submenu-category-list" data-accordion>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Shirt</p>--}}
{{--                                        <data value="300" class="stock" title="Available Stock">300</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">shorts & jeans</p>--}}
{{--                                        <data value="60" class="stock" title="Available Stock">60</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">jacket</p>--}}
{{--                                        <data value="50" class="stock" title="Available Stock">50</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">dress & frock</p>--}}
{{--                                        <data value="87" class="stock" title="Available Stock">87</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                            </ul>--}}

{{--                        </li>--}}

{{--                        <li class="sidebar-menu-category">--}}

{{--                            <button class="sidebar-accordion-menu" data-accordion-btn>--}}

{{--                                <div class="menu-title-flex">--}}
{{--                                    <img src="{{asset('logo/icons/shoes.svg')}}" alt="footwear" class="menu-title-img" width="20"--}}
{{--                                         height="20">--}}

{{--                                    <p class="menu-title">Sports and Outdoors</p>--}}
{{--                                </div>--}}

{{--                                <div>--}}
{{--                                    <ion-icon name="add-outline" class="add-icon"></ion-icon>--}}
{{--                                    <ion-icon name="remove-outline" class="remove-icon"></ion-icon>--}}
{{--                                </div>--}}

{{--                            </button>--}}

{{--                            <ul class="sidebar-submenu-category-list" data-accordion>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Sports</p>--}}
{{--                                        <data value="45" class="stock" title="Available Stock">45</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Formal</p>--}}
{{--                                        <data value="75" class="stock" title="Available Stock">75</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Casual</p>--}}
{{--                                        <data value="35" class="stock" title="Available Stock">35</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Safety Shoes</p>--}}
{{--                                        <data value="26" class="stock" title="Available Stock">26</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                            </ul>--}}

{{--                        </li>--}}

{{--                        <li class="sidebar-menu-category">--}}

{{--                            <button class="sidebar-accordion-menu" data-accordion-btn>--}}

{{--                                <div class="menu-title-flex">--}}
{{--                                    <img src="{{asset('logo/icons/jewelry.svg')}}" alt="clothes" class="menu-title-img" width="20"--}}
{{--                                         height="20">--}}

{{--                                    <p class="menu-title">Jewelry</p>--}}
{{--                                </div>--}}

{{--                                <div>--}}
{{--                                    <ion-icon name="add-outline" class="add-icon"></ion-icon>--}}
{{--                                    <ion-icon name="remove-outline" class="remove-icon"></ion-icon>--}}
{{--                                </div>--}}

{{--                            </button>--}}

{{--                            <ul class="sidebar-submenu-category-list" data-accordion>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Earrings</p>--}}
{{--                                        <data value="46" class="stock" title="Available Stock">46</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Couple Rings</p>--}}
{{--                                        <data value="73" class="stock" title="Available Stock">73</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Necklace</p>--}}
{{--                                        <data value="61" class="stock" title="Available Stock">61</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                            </ul>--}}

{{--                        </li>--}}

{{--                        <li class="sidebar-menu-category">--}}

{{--                            <button class="sidebar-accordion-menu" data-accordion-btn>--}}

{{--                                <div class="menu-title-flex">--}}
{{--                                    <img src="{{asset('logo/icons/perfume.svg')}}" alt="perfume" class="menu-title-img" width="20"--}}
{{--                                         height="20">--}}

{{--                                    <p class="menu-title">Health and Beauty</p>--}}
{{--                                </div>--}}

{{--                                <div>--}}
{{--                                    <ion-icon name="add-outline" class="add-icon"></ion-icon>--}}
{{--                                    <ion-icon name="remove-outline" class="remove-icon"></ion-icon>--}}
{{--                                </div>--}}

{{--                            </button>--}}

{{--                            <ul class="sidebar-submenu-category-list" data-accordion>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Clothes Perfume</p>--}}
{{--                                        <data value="12" class="stock" title="Available Stock">12 pcs</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Deodorant</p>--}}
{{--                                        <data value="60" class="stock" title="Available Stock">60 pcs</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">jacket</p>--}}
{{--                                        <data value="50" class="stock" title="Available Stock">50 pcs</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">dress & frock</p>--}}
{{--                                        <data value="87" class="stock" title="Available Stock">87 pcs</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                            </ul>--}}

{{--                        </li>--}}

{{--                        <li class="sidebar-menu-category">--}}

{{--                            <button class="sidebar-accordion-menu" data-accordion-btn>--}}

{{--                                <div class="menu-title-flex">--}}
{{--                                    <img src="{{asset('logo/icons/cosmetics.svg')}}" alt="cosmetics" class="menu-title-img" width="20"--}}
{{--                                         height="20">--}}

{{--                                    <p class="menu-title">Women Accessories</p>--}}
{{--                                </div>--}}

{{--                                <div>--}}
{{--                                    <ion-icon name="add-outline" class="add-icon"></ion-icon>--}}
{{--                                    <ion-icon name="remove-outline" class="remove-icon"></ion-icon>--}}
{{--                                </div>--}}

{{--                            </button>--}}

{{--                            <ul class="sidebar-submenu-category-list" data-accordion>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Shampoo</p>--}}
{{--                                        <data value="68" class="stock" title="Available Stock">68</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Sunscreen</p>--}}
{{--                                        <data value="46" class="stock" title="Available Stock">46</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Body Wash</p>--}}
{{--                                        <data value="79" class="stock" title="Available Stock">79</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Makeup Kit</p>--}}
{{--                                        <data value="23" class="stock" title="Available Stock">23</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                            </ul>--}}

{{--                        </li>--}}

{{--                        <li class="sidebar-menu-category">--}}

{{--                            <button class="sidebar-accordion-menu" data-accordion-btn>--}}

{{--                                <div class="menu-title-flex">--}}
{{--                                    <img src="{{asset('logo/icons/glasses.svg')}}" alt="glasses" class="menu-title-img" width="20"--}}
{{--                                         height="20">--}}

{{--                                    <p class="menu-title">Men Accessories</p>--}}
{{--                                </div>--}}

{{--                                <div>--}}
{{--                                    <ion-icon name="add-outline" class="add-icon"></ion-icon>--}}
{{--                                    <ion-icon name="remove-outline" class="remove-icon"></ion-icon>--}}
{{--                                </div>--}}

{{--                            </button>--}}

{{--                            <ul class="sidebar-submenu-category-list" data-accordion>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Sunglasses</p>--}}
{{--                                        <data value="50" class="stock" title="Available Stock">50</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Lenses</p>--}}
{{--                                        <data value="48" class="stock" title="Available Stock">48</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                            </ul>--}}

{{--                        </li>--}}

{{--                        <li class="sidebar-menu-category">--}}

{{--                            <button class="sidebar-accordion-menu" data-accordion-btn>--}}

{{--                                <div class="menu-title-flex">--}}
{{--                                    <img src="{{asset('logo/icons/bag.svg')}}" alt="bags" class="menu-title-img" width="20" height="20">--}}

{{--                                    <p class="menu-title">Bags</p>--}}
{{--                                </div>--}}

{{--                                <div>--}}
{{--                                    <ion-icon name="add-outline" class="add-icon"></ion-icon>--}}
{{--                                    <ion-icon name="remove-outline" class="remove-icon"></ion-icon>--}}
{{--                                </div>--}}

{{--                            </button>--}}

{{--                            <ul class="sidebar-submenu-category-list" data-accordion>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Shopping Bag</p>--}}
{{--                                        <data value="62" class="stock" title="Available Stock">62</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Gym Backpack</p>--}}
{{--                                        <data value="35" class="stock" title="Available Stock">35</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Purse</p>--}}
{{--                                        <data value="80" class="stock" title="Available Stock">80</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                                <li class="sidebar-submenu-category">--}}
{{--                                    <a href="#" class="sidebar-submenu-title">--}}
{{--                                        <p class="product-name">Wallet</p>--}}
{{--                                        <data value="75" class="stock" title="Available Stock">75</data>--}}
{{--                                    </a>--}}
{{--                                </li>--}}

{{--                            </ul>--}}

{{--                        </li>--}}

{{--                    </ul>--}}

{{--                </div>--}}

{{--                <div class="product-showcase">--}}

{{--                    <h3 class="showcase-heading">best sellers</h3>--}}

{{--                    <div class="showcase-wrapper">--}}

{{--                        <div class="showcase-container">--}}

{{--                            <div class="showcase">--}}

{{--                                <a href="#" class="showcase-img-box">--}}
{{--                                    <img src="{{asset('logo/all/1.jpg')}}" alt="baby fabric shoes" width="75" height="75"--}}
{{--                                         class="showcase-img">--}}
{{--                                </a>--}}

{{--                                <div class="showcase-content">--}}

{{--                                    <a href="#">--}}
{{--                                        <h4 class="showcase-title">baby fabric shoes</h4>--}}
{{--                                    </a>--}}

{{--                                    <div class="showcase-rating">--}}
{{--                                        <ion-icon name="star"></ion-icon>--}}
{{--                                        <ion-icon name="star"></ion-icon>--}}
{{--                                        <ion-icon name="star"></ion-icon>--}}
{{--                                        <ion-icon name="star"></ion-icon>--}}
{{--                                        <ion-icon name="star"></ion-icon>--}}
{{--                                    </div>--}}

{{--                                    <div class="price-box">--}}
{{--                                        <del>$5.00</del>--}}
{{--                                        <p class="price">$4.00</p>--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                            </div>--}}

{{--                            <div class="showcase">--}}

{{--                                <a href="#" class="showcase-img-box">--}}
{{--                                    <img src="{{asset('logo/all/2.jpg')}}" alt="men's hoodies t-shirt" class="showcase-img"--}}
{{--                                         width="75" height="75">--}}
{{--                                </a>--}}

{{--                                <div class="showcase-content">--}}

{{--                                    <a href="#">--}}
{{--                                        <h4 class="showcase-title">men's hoodies t-shirt</h4>--}}
{{--                                    </a>--}}
{{--                                    <div class="showcase-rating">--}}
{{--                                        <ion-icon name="star"></ion-icon>--}}
{{--                                        <ion-icon name="star"></ion-icon>--}}
{{--                                        <ion-icon name="star"></ion-icon>--}}
{{--                                        <ion-icon name="star"></ion-icon>--}}
{{--                                        <ion-icon name="star-half-outline"></ion-icon>--}}
{{--                                    </div>--}}

{{--                                    <div class="price-box">--}}
{{--                                        <del>$17.00</del>--}}
{{--                                        <p class="price">$7.00</p>--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                            </div>--}}

{{--                            <div class="showcase">--}}

{{--                                <a href="#" class="showcase-img-box">--}}
{{--                                    <img src="{{asset('logo/all/3.jpg')}}" alt="girls t-shirt" class="showcase-img" width="75"--}}
{{--                                         height="75">--}}
{{--                                </a>--}}

{{--                                <div class="showcase-content">--}}

{{--                                    <a href="#">--}}
{{--                                        <h4 class="showcase-title">girls t-shirt</h4>--}}
{{--                                    </a>--}}
{{--                                    <div class="showcase-rating">--}}
{{--                                        <ion-icon name="star"></ion-icon>--}}
{{--                                        <ion-icon name="star"></ion-icon>--}}
{{--                                        <ion-icon name="star"></ion-icon>--}}
{{--                                        <ion-icon name="star"></ion-icon>--}}
{{--                                        <ion-icon name="star-half-outline"></ion-icon>--}}
{{--                                    </div>--}}

{{--                                    <div class="price-box">--}}
{{--                                        <del>$5.00</del>--}}
{{--                                        <p class="price">$3.00</p>--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                            </div>--}}

{{--                            <div class="showcase">--}}

{{--                                <a href="#" class="showcase-img-box">--}}
{{--                                    <img src="{{asset('logo/all/4.jpg')}}" alt="woolen hat for men" class="showcase-img" width="75"--}}
{{--                                         height="75">--}}
{{--                                </a>--}}

{{--                                <div class="showcase-content">--}}

{{--                                    <a href="#">--}}
{{--                                        <h4 class="showcase-title">woolen hat for men</h4>--}}
{{--                                    </a>--}}
{{--                                    <div class="showcase-rating">--}}
{{--                                        <ion-icon name="star"></ion-icon>--}}
{{--                                        <ion-icon name="star"></ion-icon>--}}
{{--                                        <ion-icon name="star"></ion-icon>--}}
{{--                                        <ion-icon name="star"></ion-icon>--}}
{{--                                        <ion-icon name="star"></ion-icon>--}}
{{--                                    </div>--}}

{{--                                    <div class="price-box">--}}
{{--                                        <del>$15.00</del>--}}
{{--                                        <p class="price">$12.00</p>--}}
{{--                                    </div>--}}

{{--                                </div>--}}

{{--                            </div>--}}

{{--                        </div>--}}

{{--                    </div>--}}

{{--                </div>--}}

{{--            </div>--}}



            <div class="product-box">

                <!--
                  - PRODUCT MINIMAL
                -->

                <div class="product-minimal">

                    <div class="product-showcase">

                        <h2 class="title">New Arrivals</h2>

                        <div class="showcase-wrapper has-scrollbar">

                            <div class="showcase-container">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                @foreach($product as $pro)
                                <div class="showcase">
                                        <a href="{{ route('product', ['id' => $pro->pro_id,'ids'=>$user->id,'category'=>$pro->category]) }}" class="showcase-img-box">
                                            <img src="{{asset('storage/' .$pro->pro_pic)}}" alt="relaxed short full sleeve t-shirt" width="70" class="showcase-img">
                                        </a>

                                        <div class="showcase-content">
                                            <input type="hidden" name="id" value="{{$pro->pro_id}}">
                                            <a href="{{ route('product', ['id' => $pro->pro_id,'ids'=>$user->id,'category'=>$pro->category]) }}">
                                                <h4 class="showcase-title">{{$pro->pro_des}}</h4>
                                            </a>

                                            <a href="{{ route('product', ['id' => $pro->pro_id,'ids'=>$user->id,'category'=>$pro->category]) }}" class="showcase-category">{{$pro->category}}</a>

                                            <div class="price-box">
                                                <p class="price" data-price-usd="{{$pro->price}}">${{$pro->price}}</p>
                                                @if($pro->Previous_Price === NULL)

                                                @elseif($pro->Previous_Price !== NULL)
                                                    <del data-previous-price-usd="{{$pro->Previous_Price}}">${{$pro->Previous_Price}}</del>
                                                @endif
                                            </div>

                                        </div>

                                    </div>
                                @endforeach


                            </div>

                            <div class="showcase-container">
                                <input type="hidden" name="user_id" value="{{ $user->id }}">
                                @foreach($product2 as $pro)
                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="{{asset('storage/' .$pro->pro_pic)}}" alt="men yarn fleece full-zip jacket" class="showcase-img"
                                             width="70">
                                    </a>

                                    <div class="showcase-content">
                                        <input type="hidden" name="id" value="{{$pro->pro_id}}">
                                        <a href="{{ route('product', ['id' => $pro->pro_id,'ids'=>$user->id,'category'=>$pro->category]) }}">
                                            <h4 class="showcase-title">{{$pro->pro_des}}</h4>
                                        </a>

                                        <a href="#" class="showcase-category">{{$pro->category}}</a>

                                        <div class="price-box">
                                            <p class="price" data-price-usd="{{$pro->price}}">${{$pro->price}}</p>
                                            @if($pro->Previous_Price === NULL)

                                            @elseif($pro->Previous_Price !== NULL)
                                                <del data-previous-price-usd="{{$pro->Previous_Price}}">${{$pro->Previous_Price}}</del>
                                            @endif
                                        </div>

                                    </div>

                                </div>
                                @endforeach
                            </div>

                        </div>

                    </div>

                    <div class="product-showcase">

                        <h2 class="title">Trending</h2>

                        <div class="showcase-wrapper  has-scrollbar">

                            <div class="showcase-container">

                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="{{asset('logo/all/sports-1.jpg')}}" alt="running & trekking shoes - white" class="showcase-img"
                                             width="70">
                                    </a>

                                    <div class="showcase-content">

                                        <a href="#">
                                            <h4 class="showcase-title">Running & Trekking Shoes - White</h4>
                                        </a>

                                        <a href="#" class="showcase-category">Sports</a>

                                        <div class="price-box">
                                            <p class="price">$49.00</p>
                                            <del>$15.00</del>
                                        </div>

                                    </div>

                                </div>

                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="{{asset('logo/all/sports-2.jpg')}}" alt="trekking & running shoes - black" class="showcase-img"
                                             width="70">
                                    </a>

                                    <div class="showcase-content">

                                        <a href="#">
                                            <h4 class="showcase-title">Trekking & Running Shoes - black</h4>
                                        </a>

                                        <a href="#" class="showcase-category">Sports</a>

                                        <div class="price-box">
                                            <p class="price">$78.00</p>
                                            <del>$36.00</del>
                                        </div>

                                    </div>

                                </div>

                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="{{asset('logo/all/party-wear-1.jpg')}}" alt="womens party wear shoes" class="showcase-img"
                                             width="70">
                                    </a>

                                    <div class="showcase-content">

                                        <a href="#">
                                            <h4 class="showcase-title">Womens Party Wear Shoes</h4>
                                        </a>

                                        <a href="#" class="showcase-category">Party wear</a>

                                        <div class="price-box">
                                            <p class="price">$94.00</p>
                                            <del>$42.00</del>
                                        </div>

                                    </div>

                                </div>

                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="{{asset('logo/all/sports-3.jpg')}}" alt="sports claw women's shoes" class="showcase-img"
                                             width="70">
                                    </a>

                                    <div class="showcase-content">

                                        <a href="#">
                                            <h4 class="showcase-title">Sports Claw Women's Shoes</h4>
                                        </a>

                                        <a href="#" class="showcase-category">Sports</a>

                                        <div class="price-box">
                                            <p class="price">$54.00</p>
                                            <del>$65.00</del>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="showcase-container">

                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="{{asset('logo/all/sports-6.jpg')}}" alt="air tekking shoes - white" class="showcase-img"
                                             width="70">
                                    </a>

                                    <div class="showcase-content">

                                        <a href="#">
                                            <h4 class="showcase-title">Air Trekking Shoes - white</h4>
                                        </a>

                                        <a href="#" class="showcase-category">Sports</a>

                                        <div class="price-box">
                                            <p class="price">$52.00</p>
                                            <del>$55.00</del>
                                        </div>

                                    </div>

                                </div>

                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="{{asset('logo/all/shoe-3.jpg')}}" alt="Boot With Suede Detail" class="showcase-img" width="70">
                                    </a>

                                    <div class="showcase-content">

                                        <a href="#">
                                            <h4 class="showcase-title">Boot With Suede Detail</h4>
                                        </a>

                                        <a href="#" class="showcase-category">boots</a>

                                        <div class="price-box">
                                            <p class="price">$20.00</p>
                                            <del>$30.00</del>
                                        </div>

                                    </div>

                                </div>

                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="{{asset('logo/all/shoe-1.jpg')}}" alt="men's leather formal wear shoes" class="showcase-img"
                                             width="70">
                                    </a>

                                    <div class="showcase-content">

                                        <a href="#">
                                            <h4 class="showcase-title">Men's Leather Formal Wear shoes</h4>
                                        </a>

                                        <a href="#" class="showcase-category">formal</a>

                                        <div class="price-box">
                                            <p class="price">$56.00</p>
                                            <del>$78.00</del>
                                        </div>

                                    </div>

                                </div>

                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="{{asset('logo/all/shoe-2.jpg')}}" alt="casual men's brown shoes" class="showcase-img" width="70">
                                    </a>

                                    <div class="showcase-content">

                                        <a href="#">
                                            <h4 class="showcase-title">Casual Men's Brown shoes</h4>
                                        </a>

                                        <a href="#" class="showcase-category">Casual</a>

                                        <div class="price-box">
                                            <p class="price">$50.00</p>
                                            <del>$55.00</del>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                    <div class="product-showcase">

                        <h2 class="title">Top Rated</h2>

                        <div class="showcase-wrapper  has-scrollbar">

                            <div class="showcase-container">

                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="{{asset('logo/all/watch-3.jpg')}}" alt="pocket watch leather pouch" class="showcase-img"
                                             width="70">
                                    </a>

                                    <div class="showcase-content">

                                        <a href="#">
                                            <h4 class="showcase-title">Pocket Watch Leather Pouch</h4>
                                        </a>

                                        <a href="#" class="showcase-category">Watches</a>

                                        <div class="price-box">
                                            <p class="price">$50.00</p>
                                            <del>$34.00</del>
                                        </div>

                                    </div>

                                </div>

                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="{{asset('logo/all/jewellery-3.jpg')}}" alt="silver deer heart necklace" class="showcase-img"
                                             width="70">
                                    </a>

                                    <div class="showcase-content">

                                        <a href="#">
                                            <h4 class="showcase-title">Silver Deer Heart Necklace</h4>
                                        </a>

                                        <a href="#" class="showcase-category">Jewellery</a>

                                        <div class="price-box">
                                            <p class="price">$84.00</p>
                                            <del>$30.00</del>
                                        </div>

                                    </div>

                                </div>

                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="{{asset('logo/all/perfume.jpg')}}" alt="titan 100 ml womens perfume" class="showcase-img"
                                             width="70">
                                    </a>

                                    <div class="showcase-content">

                                        <a href="#">
                                            <h4 class="showcase-title">Titan 100 Ml Womens Perfume</h4>
                                        </a>

                                        <a href="#" class="showcase-category">Perfume</a>

                                        <div class="price-box">
                                            <p class="price">$42.00</p>
                                            <del>$10.00</del>
                                        </div>

                                    </div>

                                </div>

                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="{{asset('logo/all/belt.jpg')}}" alt="men's leather reversible belt" class="showcase-img"
                                             width="70">
                                    </a>

                                    <div class="showcase-content">

                                        <a href="#">
                                            <h4 class="showcase-title">Men's Leather Reversible Belt</h4>
                                        </a>

                                        <a href="#" class="showcase-category">Belt</a>

                                        <div class="price-box">
                                            <p class="price">$24.00</p>
                                            <del>$10.00</del>
                                        </div>

                                    </div>

                                </div>

                            </div>

                            <div class="showcase-container">

                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="{{asset('logo/all/jewellery-2.jpg')}}" alt="platinum zircon classic ring" class="showcase-img"
                                             width="70">
                                    </a>

                                    <div class="showcase-content">

                                        <a href="#">
                                            <h4 class="showcase-title">platinum Zircon Classic Ring</h4>
                                        </a>

                                        <a href="#" class="showcase-category">jewellery</a>

                                        <div class="price-box">
                                            <p class="price">$62.00</p>
                                            <del>$65.00</del>
                                        </div>

                                    </div>

                                </div>

                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="{{asset('logo/all/watch-1.jpg')}}" alt="smart watche vital plus" class="showcase-img" width="70">
                                    </a>

                                    <div class="showcase-content">

                                        <a href="#">
                                            <h4 class="showcase-title">Smart watche Vital Plus</h4>
                                        </a>

                                        <a href="#" class="showcase-category">Watches</a>

                                        <div class="price-box">
                                            <p class="price">$56.00</p>
                                            <del>$78.00</del>
                                        </div>

                                    </div>

                                </div>

                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="{{asset('logo/all/shampoo.jpg')}}" alt="shampoo conditioner packs" class="showcase-img"
                                             width="70">
                                    </a>

                                    <div class="showcase-content">

                                        <a href="#">
                                            <h4 class="showcase-title">shampoo conditioner packs</h4>
                                        </a>

                                        <a href="#" class="showcase-category">cosmetics</a>

                                        <div class="price-box">
                                            <p class="price">$20.00</p>
                                            <del>$30.00</del>
                                        </div>

                                    </div>

                                </div>

                                <div class="showcase">

                                    <a href="#" class="showcase-img-box">
                                        <img src="{{asset('logo/all/jewellery-1.jpg')}}" alt="rose gold peacock earrings" class="showcase-img"
                                             width="70">
                                    </a>

                                    <div class="showcase-content">

                                        <a href="#">
                                            <h4 class="showcase-title">Rose Gold Peacock Earrings</h4>
                                        </a>

                                        <a href="#" class="showcase-category">jewellery</a>

                                        <div class="price-box">
                                            <p class="price">$20.00</p>
                                            <del>$30.00</del>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                <!--
                  - PRODUCT FEATURED
                -->

                <div class="product-featured">

                    <h2 class="title">Deal of the day</h2>

                    <div class="showcase-wrapper has-scrollbar">

                        <div class="showcase-container">

                            <div class="showcase">

                                <div class="showcase-banner">
                                    <img src="{{asset('logo/all/shampoo.jpg')}}" alt="shampoo, conditioner & facewash packs" class="showcase-img">
                                </div>

                                <div class="showcase-content">

                                    <div class="showcase-rating">
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star-outline"></ion-icon>
                                        <ion-icon name="star-outline"></ion-icon>
                                    </div>

                                    <a href="#">
                                        <h3 class="showcase-title">CLEAR Men Anti-Hair Fall Anti-dandruff shampoo | CLEAR HAIR CARE</h3>
                                    </a>

                                    <p class="showcase-desc">
                                        Lorem ipsum dolor sit amet consectetur Lorem ipsum
                                        dolor dolor sit amet consectetur Lorem ipsum dolor
                                    </p>

                                    <div class="price-box">
                                        <p class="price">$150.00</p>

                                        <del>$200.00</del>
                                    </div>

                                    <button class="add-cart-btn">add to cart</button>

                                    <div class="showcase-status">
                                        <div class="wrapper">
                                            <p>
                                                already sold: <b>20</b>
                                            </p>

                                            <p>
                                                available: <b>40</b>
                                            </p>
                                        </div>

                                        <div class="showcase-status-bar"></div>
                                    </div>

                                    <div class="countdown-box">

                                        <p class="countdown-desc">
                                            Hurry Up! Offer ends in:
                                        </p>

                                        <div class="countdown">

                                            <div class="countdown-content">

                                                <p class="display-number">360</p>

                                                <p class="display-text">Days</p>

                                            </div>

                                            <div class="countdown-content">
                                                <p class="display-number">24</p>
                                                <p class="display-text">Hours</p>
                                            </div>

                                            <div class="countdown-content">
                                                <p class="display-number">59</p>
                                                <p class="display-text">Min</p>
                                            </div>

                                            <div class="countdown-content">
                                                <p class="display-number">00</p>
                                                <p class="display-text">Sec</p>
                                            </div>

                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                        <div class="showcase-container">

                            <div class="showcase">

                                <div class="showcase-banner">
                                    <img src="{{asset('logo/all/jewellery-1.jpg')}}"" alt="Rose Gold diamonds Earring" class="showcase-img">
                                </div>

                                <div class="showcase-content">

                                    <div class="showcase-rating">
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star"></ion-icon>
                                        <ion-icon name="star-outline"></ion-icon>
                                        <ion-icon name="star-outline"></ion-icon>
                                    </div>

                                    <h3 class="showcase-title">
                                        <a href="#" class="showcase-title">Buy LAFZ Meliha No Alcohol No Gas Premium Body Spray</a>
                                    </h3>

                                    <p class="showcase-desc">
                                        Lorem ipsum dolor sit amet consectetur Lorem ipsum
                                        dolor dolor sit amet consectetur Lorem ipsum dolor
                                    </p>

                                    <div class="price-box">
                                        <p class="price">$1990.00</p>
                                        <del>$2000.00</del>
                                    </div>

                                    <button class="add-cart-btn">add to cart</button>

                                    <div class="showcase-status">
                                        <div class="wrapper">
                                            <p> already sold: <b>15</b> </p>

                                            <p> available: <b>40</b> </p>
                                        </div>

                                        <div class="showcase-status-bar"></div>
                                    </div>

                                    <div class="countdown-box">

                                        <p class="countdown-desc">Hurry Up! Offer ends in:</p>

                                        <div class="countdown">
                                            <div class="countdown-content">
                                                <p class="display-number">360</p>
                                                <p class="display-text">Days</p>
                                            </div>

                                            <div class="countdown-content">
                                                <p class="display-number">24</p>
                                                <p class="display-text">Hours</p>
                                            </div>

                                            <div class="countdown-content">
                                                <p class="display-number">59</p>
                                                <p class="display-text">Min</p>
                                            </div>

                                            <div class="countdown-content">
                                                <p class="display-number">00</p>
                                                <p class="display-text">Sec</p>
                                            </div>
                                        </div>

                                    </div>

                                </div>

                            </div>

                        </div>

                    </div>

                </div>



                <!--
                  - PRODUCT GRID
                -->

                <div class="product-main">

                    <h2 class="title">New Products</h2>

                    <div class="product-grid">
                        @foreach($product4 as $prod)
                        <div class="showcase">

                            <div class="showcase-banner">

                                <a href="{{ route('product', ['id' => $prod->pro_id,'ids'=>$user->id,'category'=>$prod->category]) }}">
                                <img src="{{asset('storage/' .$prod->pro_pic)}}" alt="Mens Winter Leathers Jackets" width="300" class="product-img default">
                                <img src="{{asset('storage/' .$prod->pro_pic)}}" alt="Mens Winter Leathers Jackets" width="300" class="product-img hover">
                                </a>
                                @if($prod->Discount_Rate && $prod->Activate === 'ON')
                                    <p class="showcase-badge angle black pink">{{$prod->Discount_Rate}}%</p>
                                @else

                                @endif

                                <div class="showcase-actions">

                                    <button class="btn-action">
                                        <ion-icon name="heart-outline"></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon name="eye-outline"></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon name="repeat-outline"></ion-icon>
                                    </button>

                                    <button class="btn-action">
                                        <ion-icon name="bag-add-outline"></ion-icon>
                                    </button>

                                </div>

                            </div>

                            <div class="showcase-content">

                                <input type="hidden" value="{{$prod->pro_id}}">
                                <input type="hidden" value="{{$prod->category}}">
                                <a href="{{ route('product', ['id' => $prod->pro_id,'ids'=>$user->id,'category'=>$prod->category]) }}" class="showcase-category">{{$prod->pro_name}}</a>

                                <a href="{{ route('product', ['id' => $prod->pro_id,'ids'=>$user->id,'category'=>$prod->category]) }}">
                                    <h3 class="showcase-title">{{$prod->pro_des}}
                                    {{$prod->rating}}</h3>
                                </a>
                                @if($averageRatings[$prod->pro_id] > 0)
                                    {{ $averageRatings[$prod->pro_id] }}


                                    <div class="showcase-rating">
                                        @for ($i = 1; $i <= 5; $i++)
                                            @if ($i <= $averageRatings[$prod->pro_id])
                                        <ion-icon name="star"></ion-icon>
                                            @else
                                        <ion-icon name="star-outline"></ion-icon>
                                            @endif
                                        @endfor
                                    </div>
                                @else

                                @endif

                                <div class="price-box">
                                    <p class="price" data-price-usd="{{$prod->price}}">${{$prod->price}}</p>
                                    @if($prod->Previous_Price === NULL)

                                    @elseif($prod->Previous_Price !== NULL)
                                        <del data-previous-price-usd="{{$prod->Previous_Price}}">${{$prod->Previous_Price}}</del>
                                    @endif
                                </div>

                            </div>

                        </div>
                        @endforeach
                        

                    </div>

                </div>

            </div>

        </div>

    </div>





    <!--
      - TESTIMONIALS, CTA & SERVICE
    -->

    <div>

        <div class="container">

            <div class="testimonials-box">

                <!--
                  - TESTIMONIALS
                -->

                <div class="testimonial">

                    <h2 class="title">testimonial</h2>

                    <div class="testimonial-card">

                        <img src="{{asset('logo/testimonial-1.jpg')}}" alt="alan doe" class="testimonial-banner" width="80" height="80">


                        <p class="testimonial-name">Sheikh Rubayet Islam</p>

                        <p class="testimonial-title">CEO & Founder Invision</p>

                        <img src="{{asset('logo/icons/quotes.svg')}}" alt="quotation" class="quotation-img" width="26">

                        <p class="testimonial-desc">
                            Lorem ipsum dolor sit amet consectetur Lorem ipsum
                            dolor dolor sit amet.
                        </p>

                    </div>

                    <div class="testimonial-card">

                        <img src="{{asset('logo/IMG_2194.jpg')}}" alt="alan doe" class="testimonial-banner" width="80" height="80">


                        <p class="testimonial-name">Pias Miah</p>

                        <p class="testimonial-title">CEO & Founder Invision</p>

                        <img src="{{asset('logo/icons/quotes.svg')}}" alt="quotation" class="quotation-img" width="26">

                        <p class="testimonial-desc">
                            Lorem ipsum dolor sit amet consectetur Lorem ipsum
                            dolor dolor sit amet.
                        </p>

                    </div>

                </div>





                <!--
                  - CTA
                -->

                <div class="cta-container">

                    <img src="{{asset('logo/cta-banner.jpg')}}" alt="summer collection" class="cta-banner">

                    <a href="#" class="cta-content">

                        <p class="discount">25% Discount</p>

                        <h2 class="cta-title">Gaming Season</h2>

                        <p class="cta-text">Starting @ $10</p>

                        <button class="cta-btn">Shop now</button>

                    </a>

                </div>



                <!--
                  - SERVICE
                -->

                <div class="service">

                    <h2 class="title">Our Services</h2>

                    <div class="service-container">

                        <a href="#" class="service-item">

                            <div class="service-icon">
                                <ion-icon name="boat-outline"></ion-icon>
                            </div>

                            <div class="service-content">

                                <h3 class="service-title">Worldwide Delivery</h3>
                                <p class="service-desc">For Order Over $100</p>

                            </div>

                        </a>

                        <a href="#" class="service-item">

                            <div class="service-icon">
                                <ion-icon name="rocket-outline"></ion-icon>
                            </div>

                            <div class="service-content">

                                <h3 class="service-title">Next Day delivery</h3>
                                <p class="service-desc">BD Orders Only</p>

                            </div>

                        </a>

                        <a href="#" class="service-item">

                            <div class="service-icon">
                                <ion-icon name="call-outline"></ion-icon>
                            </div>

                            <div class="service-content">

                                <h3 class="service-title">Best Online Support</h3>
                                <p class="service-desc">Hours: 8AM - 11PM</p>

                            </div>

                        </a>

                        <a href="#" class="service-item">

                            <div class="service-icon">
                                <ion-icon name="arrow-undo-outline"></ion-icon>
                            </div>

                            <div class="service-content">

                                <h3 class="service-title">Return Policy</h3>
                                <p class="service-desc">Easy & Free Return</p>

                            </div>

                        </a>

                        <a href="#" class="service-item">

                            <div class="service-icon">
                                <ion-icon name="ticket-outline"></ion-icon>
                            </div>

                            <div class="service-content">

                                <h3 class="service-title">30% money back</h3>
                                <p class="service-desc">For Order Over $100</p>

                            </div>

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>





    <!--
      - BLOG
    -->

    <div class="blog">

        <div class="container">

            <div class="blog-container has-scrollbar">

                <div class="blog-card">

                    <a href="#">
                        <img src="{{asset('logo/blog-1.jpg')}}" alt="Clothes Retail KPIs 2021 Guide for Clothes Executives" width="300" height="200" class="blog-banner">
                    </a>

                    <div class="blog-content">

                        <a href="#" class="blog-category">Fashion</a>

                        <a href="#">
                            <h3 class="blog-title">Clothes Retail KPIs 2021 Guide for Clothes Executives.</h3>
                        </a>

                        <p class="blog-meta">
                            By <cite>Mr Admin</cite> / <time datetime="2022-04-06">Apr 06, 2022</time>
                        </p>

                    </div>

                </div>

                <div class="blog-card">

                    <a href="#">
                        <img src="{{asset('logo/blog-2.jpg')}}" alt="Curbside fashion Trends: How to Win the Pickup Battle."
                             class="blog-banner" width="300" height="200">
                    </a>

                    <div class="blog-content">

                        <a href="#" class="blog-category">Clothes</a>

                        <h3>
                            <a href="#" class="blog-title">Curbside fashion Trends: How to Win the Pickup Battle.</a>
                        </h3>

                        <p class="blog-meta">
                            By <cite>Mr Robin</cite> / <time datetime="2022-01-18">Jan 18, 2022</time>
                        </p>

                    </div>

                </div>

                <div class="blog-card">

                    <a href="#">
                        <img src="{{asset('logo/blog-3.jpg')}}" alt="EBT vendors: Claim Your Share of SNAP Online Revenue."
                             class="blog-banner" width="300" height="200">
                    </a>

                    <div class="blog-content">

                        <a href="#" class="blog-category">Shoes</a>

                        <h3>
                            <a href="#" class="blog-title">EBT vendors: Claim Your Share of SNAP Online Revenue.</a>
                        </h3>

                        <p class="blog-meta">
                            By <cite>Mr Selsa</cite> / <time datetime="2022-02-10">Feb 10, 2022</time>
                        </p>

                    </div>

                </div>

                <div class="blog-card">

                    <a href="#">
                        <img src="{{asset('logo/blog-4.jpg')}}" alt="Curbside fashion Trends: How to Win the Pickup Battle."
                             class="blog-banner" width="300" height="200">
                    </a>

                    <div class="blog-content">

                        <a href="#" class="blog-category">Electronics</a>

                        <h3>
                            <a href="#" class="blog-title">Curbside fashion Trends: How to Win the Pickup Battle.</a>
                        </h3>

                        <p class="blog-meta">
                            By <cite>Mr Pawar</cite> / <time datetime="2022-03-15">Mar 15, 2022</time>
                        </p>

                    </div>

                </div>

            </div>

        </div>

    </div>

</main>





<!--
  - FOOTER
-->

<footer>

    <div class="footer-category">

        <div class="container">

            <h2 class="footer-category-title">Brand directory</h2>

            <div class="footer-category-box">

                <h3 class="category-box-title">Fashion :</h3>

                <a href="#" class="footer-category-link">T-shirt</a>
                <a href="#" class="footer-category-link">Shirts</a>
                <a href="#" class="footer-category-link">shorts & jeans</a>
                <a href="#" class="footer-category-link">jacket</a>
                <a href="#" class="footer-category-link">dress & frock</a>
                <a href="#" class="footer-category-link">innerwear</a>
                <a href="#" class="footer-category-link">hosiery</a>

            </div>

            <div class="footer-category-box">
                <h3 class="category-box-title">footwear :</h3>

                <a href="#" class="footer-category-link">sport</a>
                <a href="#" class="footer-category-link">formal</a>
                <a href="#" class="footer-category-link">Boots</a>
                <a href="#" class="footer-category-link">casual</a>
                <a href="#" class="footer-category-link">cowboy shoes</a>
                <a href="#" class="footer-category-link">safety shoes</a>
                <a href="#" class="footer-category-link">Party wear shoes</a>
                <a href="#" class="footer-category-link">Branded</a>
                <a href="#" class="footer-category-link">Firstcopy</a>
                <a href="#" class="footer-category-link">Long shoes</a>
            </div>

            <div class="footer-category-box">
                <h3 class="category-box-title">jewellery :</h3>

                <a href="#" class="footer-category-link">Necklace</a>
                <a href="#" class="footer-category-link">Earrings</a>
                <a href="#" class="footer-category-link">Couple rings</a>
                <a href="#" class="footer-category-link">Pendants</a>
                <a href="#" class="footer-category-link">Crystal</a>
                <a href="#" class="footer-category-link">Bangles</a>
                <a href="#" class="footer-category-link">bracelets</a>
                <a href="#" class="footer-category-link">nosepin</a>
                <a href="#" class="footer-category-link">chain</a>
                <a href="#" class="footer-category-link">Earrings</a>
                <a href="#" class="footer-category-link">Couple rings</a>
            </div>

            <div class="footer-category-box">
                <h3 class="category-box-title">cosmetics :</h3>

                <a href="#" class="footer-category-link">Shampoo</a>
                <a href="#" class="footer-category-link">Bodywash</a>
                <a href="#" class="footer-category-link">Facewash</a>
                <a href="#" class="footer-category-link">makeup kit</a>
                <a href="#" class="footer-category-link">liner</a>
                <a href="#" class="footer-category-link">lipstick</a>
                <a href="#" class="footer-category-link">prefume</a>
                <a href="#" class="footer-category-link">Body soap</a>
                <a href="#" class="footer-category-link">scrub</a>
                <a href="#" class="footer-category-link">hair gel</a>
                <a href="#" class="footer-category-link">hair colors</a>
                <a href="#" class="footer-category-link">hair dye</a>
                <a href="#" class="footer-category-link">sunscreen</a>
                <a href="#" class="footer-category-link">skin loson</a>
                <a href="#" class="footer-category-link">liner</a>
                <a href="#" class="footer-category-link">lipstick</a>
            </div>

        </div>

    </div>

    <div class="footer-nav">

        <div class="container">

            <ul class="footer-nav-list">

                <li class="footer-nav-item">
                    <h2 class="nav-title">Popular Categories</h2>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Fashion</a>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Electronic</a>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Cosmetic</a>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Health</a>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Watches</a>
                </li>

            </ul>

            <ul class="footer-nav-list">

                <li class="footer-nav-item">
                    <h2 class="nav-title">Products</h2>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Prices drop</a>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">New products</a>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Best sales</a>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Contact us</a>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Sitemap</a>
                </li>

            </ul>

            <ul class="footer-nav-list">

                <li class="footer-nav-item">
                    <h2 class="nav-title">Our Company</h2>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Delivery</a>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Legal Notice</a>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Terms and conditions</a>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">About us</a>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Secure payment</a>
                </li>

            </ul>

            <ul class="footer-nav-list">

                <li class="footer-nav-item">
                    <h2 class="nav-title">Services</h2>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Prices drop</a>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">New products</a>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Best sales</a>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Contact us</a>
                </li>

                <li class="footer-nav-item">
                    <a href="#" class="footer-nav-link">Sitemap</a>
                </li>

            </ul>

            <ul class="footer-nav-list">

                <li class="footer-nav-item">
                    <h2 class="nav-title">Contact</h2>
                </li>

                <li class="footer-nav-item flex">
                    <div class="icon-box">
                        <ion-icon name="location-outline"></ion-icon>
                    </div>

                    <address class="content">
                        Mirpur-2, Dhaka - 1216
                    </address>
                </li>

                <li class="footer-nav-item flex">
                    <div class="icon-box">
                        <ion-icon name="call-outline"></ion-icon>
                    </div>

                    <a href="tel:+607936-8058" class="footer-nav-link">016 42 88 92 75 </a>
                </li>

                <li class="footer-nav-item flex">
                    <div class="icon-box">
                        <ion-icon name="mail-outline"></ion-icon>
                    </div>

                    <a href="mailto:example@gmail.com" class="footer-nav-link">rubayetislam16@gmail.com</a>
                </li>

            </ul>

            <ul class="footer-nav-list">

                <li class="footer-nav-item">
                    <h2 class="nav-title">Follow Us</h2>
                </li>

                <li>
                    <ul class="social-link">

                        <li class="footer-nav-item">
                            <a href="#" class="footer-nav-link">
                                <ion-icon name="logo-facebook"></ion-icon>
                            </a>
                        </li>

                        <li class="footer-nav-item">
                            <a href="#" class="footer-nav-link">
                                <ion-icon name="logo-twitter"></ion-icon>
                            </a>
                        </li>

                        <li class="footer-nav-item">
                            <a href="#" class="footer-nav-link">
                                <ion-icon name="logo-linkedin"></ion-icon>
                            </a>
                        </li>

                        <li class="footer-nav-item">
                            <a href="#" class="footer-nav-link">
                                <ion-icon name="logo-instagram"></ion-icon>
                            </a>
                        </li>

                    </ul>
                </li>

            </ul>

        </div>

    </div>

    <div class="footer-bottom">

        <div class="container">

            <img src="{{asset('logo/payment.png')}}" alt="payment method" class="payment-img">

            <p class="copyright">
                Copyright &copy; <a href="#">E-Commerce</a> all rights reserved.
            </p>

        </div>

    </div>

</footer>






<!--
  - custom js link
-->
<script src="{{asset('js/script.js')}}"></script>
<script>
    // JavaScript code to calculate and update the time elapsed
    var soldTime = new Date("{{$product3->created_at}}");
    var currentTime = new Date();
    var timeDifference = currentTime - soldTime;

    var timeElapsed = document.getElementById("timeElapsed");

    function updateElapsedTime() {
        var timeDifferenceMinutes = Math.floor(timeDifference / 60000); // Convert milliseconds to minutes
        if (timeDifferenceMinutes < 120) {
            // Less than 2 hours, show in minutes
            timeElapsed.textContent = timeDifferenceMinutes + " Minute(s) ago";
        } else {
            // More than 2 hours, switch to hours
            var timeDifferenceHours = Math.floor(timeDifferenceMinutes / 60); // Convert minutes to hours
            timeElapsed.textContent = timeDifferenceHours + " Hour(s) ago";
        }
    }

    // Update the time every minute
    setInterval(updateElapsedTime, 60000); // Update every minute (60,000 milliseconds)
    updateElapsedTime();


    const exchangeRates = {
        usd: 1,    // 1 USD to USD (base currency)
        eur: 0.85, // Example: 1 USD to EUR is 0.85
        bdt: 110.32 // Example: 1 USD to BDT is 110.32
        // Add more currencies and exchange rates as needed
    };

    // Function to update the displayed price
    function updatePrice(currency) {
        const priceElements = document.querySelectorAll('.price');
        const previousPriceElements = document.querySelectorAll('del[data-previous-price-usd]');
        const selectedCurrency = document.getElementById('currency').value;
        const exchangeRate = exchangeRates[selectedCurrency];
        const currencySymbol = getCurrencySymbol(selectedCurrency);

        priceElements.forEach(priceElement => {
            const priceInUSD = parseFloat(priceElement.getAttribute('data-price-usd'));
            const convertedPrice = (priceInUSD * exchangeRate).toFixed(2);
            const formattedPrice = currency === 'usd' ? `$${priceInUSD}` : `${currencySymbol}${convertedPrice}`;
            priceElement.textContent = formattedPrice;
        });

        previousPriceElements.forEach(previousPriceElement => {
            const previousPriceInUSD = parseFloat(previousPriceElement.getAttribute('data-previous-price-usd'));
            const convertedPreviousPrice = (previousPriceInUSD * exchangeRate).toFixed(2);
            const formattedPreviousPrice = currency === 'usd' ? `$${previousPriceInUSD}` : `${currencySymbol}${convertedPreviousPrice}`;
            previousPriceElement.textContent = formattedPreviousPrice;
        });
    }

    // Function to get the currency symbol
    function getCurrencySymbol(currency) {
        switch (currency) {
            case 'usd':
                return '$';
            case 'eur':
                return '€'; // Euro symbol
            case 'bdt':
                return '৳'; // BDT symbol
            default:
                return currency;
        }
    }

    // Attach an event listener to the currency select element
    document.getElementById('currency').addEventListener('change', function() {
        const selectedCurrency = this.value;
        updatePrice(selectedCurrency);
    });

    // Initialize the price with the default currency (USD)
    updatePrice('usd');

</script>
<!--
  - ionicon link
-->
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>
