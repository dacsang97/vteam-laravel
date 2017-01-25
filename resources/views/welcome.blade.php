<!doctype html>
<html>
<head>
    <meta charset="utf-8">
    <title>VTeam</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="format-detection" content="telephone=no">
    <!-- Favicon -->
    <link rel="icon" type="image/svg+xml" href="logo.svg">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="lib/css/bootstrap.min.css">
    <link rel="stylesheet" href="lib/css/jquery.fullPage.css">
    <link rel="stylesheet" href="lib/css/smoothDivScroll.css">
    <link rel="stylesheet" href="lib/css/animate.css">
    <link rel="stylesheet" href="lib/css/jquery.mCustomScrollbar.min.css">
    <link rel="stylesheet" href="lib/css/owl.carousel.css">
    <link rel="stylesheet" href="lib/css/custom.css">
    <link rel="stylesheet" href="lib/fonts/font-awesome/css/font-awesome.min.css">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lte IE 9]>
    <link rel="stylesheet" href="lib/css/ie9.css">
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <script>
        (function(f){
            window.setTimeout =f(window.setTimeout);
            window.setInterval =f(window.setInterval);
        })(function(f){return function(c,t){
            var a=[].slice.call(arguments,2);return f(function(){c.apply(this,a)},t)}
        });
    </script>
    <![endif]-->
</head>
<body class='light'>
    <div class="page-preloader"><span class="spinner"></span></div>
    <div class="bg-box">
        <div class="video-bg second-version">
        </div>
        <div class="layer"></div>
    </div>
    <header class='container'>
        <figure class='brand animated fadeInLeft pull-left'>
            <a href="#home">
                <img src="lib/img/logo-light.svg" alt="logo" width="350" height="100">
            </a>
        </figure>
        <div class="nav pull-right">
            <nav>
                <ul class="section-menu animated fadeInRight">
                    <li data-menuanchor="home" class="active"><a href="#home"><span data-hover='Home'>Home</span></a></li>
                    <li data-menuanchor="about"><a href="#about"><span data-hover='About'>About</span></a></li>
                    <li data-menuanchor="services"><a href="#services"><span data-hover='Services'>Services</span></a></li>
                    <li data-menuanchor="contact"><a href="#contact"><span data-hover='Contact'>Contact</span></a></li>
                </ul>
            </nav>
            <div class="bt-nav">
                <div class="line line1"></div>
                <div class="line line2"></div>
                <div class="line line3"></div>
            </div>
        </div>
    </header>
    <main class='fullpage main'>
        @include('welcome.partials.home')
        @include('welcome.partials.about')
        @include('welcome.partials.services')
        @include('welcome.partials.contact')
    </main>
    <footer>
        <div class="copyright">
            <p>© VTeam, 2017</p>
        </div>
    </footer>
    <!-- javascript -->
    <script src="lib/js/jquery-1.11.2.min.js"></script>
    <script src="lib/js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="lib/js/bootstrap.min.js"></script>
    <script src="lib/js/blur.js"></script>
    <script src="lib/js/jquery.fullPage.min.js"></script>
    <script src="lib/js/jquery.touchSwipe.min.js"></script>
    <script src="lib/js/jquery.mousewheel.min.js"></script>
    <script src="lib/js/jquery.kinetic.min.js"></script>
    <script src="lib/js/jquery.smoothdivscroll-1.3-min.js"></script>
    <script src="lib/js/jquery.mCustomScrollbar.concat.min.js"></script>
    <script src="lib/js/owl.carousel.min.js"></script>
    <script src="lib/js/jquery.plugin.min.js"></script>
    <script src='lib/js/carouFredSel.js'></script>
    <script src="lib/js/jquery.formstyler.min.js"></script>
    <script src="lib/js/jquery.countdown.min.js"></script>
    <script src="lib/js/main.js"></script>
    <div id="fb-root"></div>
    <div id="fb-root"></div>
    <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=245853192502636";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>
</body>
</html>
