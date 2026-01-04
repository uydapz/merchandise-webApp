<div class="hero_area">
    <style>
        .bg-box {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }
    
        .bg-box video {
            position: absolute;
            top: 50%;
            left: 50%;
            width: 100%;
            height: 100%;
            object-fit: cover;
            transform: translate(-50%, -50%);
        }
    </style>
    <div class="bg-box">
        <video autoplay muted loop>
            <source src="{{ asset('assets/images/bg.mp4') }}" type="video/mp4">
        </video>
    </div>    
    <header class="header_section">
        <div class="container">
            <nav class="navbar navbar-expand-lg custom_nav-container ">
                <a class="navbar-brand" href="/">
                    <span>
                        Santripasir
                    </span>
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class=""> </span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav  mx-auto ">
                        <li class="nav-item  {{ $title == 'Beranda' ? 'active' : '' }}">
                            <a class="nav-link" href="/">Beranda <span class="sr-only">)</span></a>
                        </li>
                        <li class="nav-item {{ $title == 'Story' ? 'active' : '' }}">
                            <a class="nav-link" href="/story">Story</a>
                        </li>
                        <li class="nav-item {{ $title == 'Catalogue' ? 'active' : '' }}">
                            <a class="nav-link" href="/catalogue">Katalog</a>
                        </li>
                    </ul>
                    <div class="user_option">
                        <a href="/login" class="order_online">
                            Login
                        </a>
                    </div>
                </div>
            </nav>
        </div>
