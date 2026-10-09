<!DOCTYPE html>
<html>
<head>
    <title>Banner Project</title>

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">

    <link rel="stylesheet"
          href="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">

    <style>
        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            color: #333;
        }

        header {
            background: white;
            padding: 20px 8%;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        header h1 {
            margin: 0;
            font-size: 26px;
        }

        .links a {
            text-decoration: none;
            margin-left: 15px;
            padding: 10px 18px;
            border-radius: 5px;
        }

        .banner-slider {
            width: 85%;
            max-width: 1100px;
            margin: 20px auto 60px;
        }

        .banner-slide {
            position: relative;
            padding: 0 10px;
        }

        .banner-slide img {
            width: 100%;
            height: 450px;
            object-fit: cover;
            border-radius: 10px;
        }

        .slick-dots {
            bottom: -35px;
        }
    </style>
</head>

<body>

    <header>
        <h1>Banner Project</h1>

        <div class="links">
            <a href="{{ route('login') }}" class="login">Login</a>

            <a href="{{ route('register') }}" class="register">Register</a>
        </div>
    </header>


    


    <div class="banner-slider">

        @foreach($banners as $banner)

            <div class="banner-slide">

                <img src="{{ asset('storage/' . $banner->image) }}">

                <div class="banner-content">
                    <h3>{{ $banner->title }}</h3>
                    <p>{{ $banner->description }}</p>
                </div>

            </div>

        @endforeach

    </div>


    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

    <script>
        $('.banner-slider').slick({
            autoplay: true,
            autoplaySpeed: 3000,
            dots: true,
        });
    </script>

</body>
</html>