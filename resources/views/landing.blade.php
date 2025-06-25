<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FitHub - Fitness Club</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #121212;
            color: #fff;
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px 10%;
            background-color: #D97706;
            
        }

        .logo {
            font-size: 28px;
            font-weight: bold;
            color: #fff;
        }

        nav {
            display: flex;
            gap: 20px;
        }

        nav a {
            text-decoration: none;
            color: #fff;
            font-size: 16px;
            transition: color 0.3s ease;
        }

        nav a:hover {
            color: #000;
        }

        .hero {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 60px 10%;
            background: linear-gradient(90deg, #000, #D97706);
            color: #fff;
        }

        .hero-content {
            max-width: 50%;
        }

        .hero-content h1 {
            font-size: 60px;
            line-height: 1.2;
            margin-bottom: 20px;
            color: #fff;
        }

        .hero-content p {
            font-size: 18px;
            margin-bottom: 30px;
            line-height: 1.6;
        }

        .hero-content .cta {
            padding: 15px 30px;
            background-color: #D97706;
            color: #fff;
            text-decoration: none;
            font-size: 18px;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .hero-content .cta:hover {
            background-color: #D97706;
        }

        .hero-image {
            position: relative;
            max-width: 40%;
        }

        .hero-image img {
            width: 100%;
            border-radius: 10px;
        }

        .overlay-box {
            position: absolute;
            bottom: 10%;
            left: -10%;
            background: #D97706;
            padding: 10px 20px;
            border-radius: 8px;
            display: flex;
            align-items: center;
            color: #fff;
        }

        .overlay-box span {
            font-size: 20px;
            margin-right: 10px;
        }

        .overlay-box .icon {
            font-size: 30px;
            color: #fff;
        }

        @media screen and (max-width: 768px) {
            .hero {
                flex-direction: column;
            }

            .hero-content {
                max-width: 100%;
                text-align: center;
                margin-bottom: 20px;
            }

            .hero-image {
                max-width: 100%;
            }

            .overlay-box {
                left: 50%;
                transform: translateX(-50%);
            }
        }
        .about-section {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 50px;
            background-color: #fdfdfd;
            font-size: 18px;
        }
      
        .about-section .about-image {
            flex: 1;
            position: relative;
            
        }

        .about-image{
        position: relative;
        max-width: 35%;
        border-radius: 10px;
        }

        .about-section .about-image img {
            width: 100%;
            border-radius: 10px;
        }

        .about-section  .background-shape {
            position: absolute;
            top: 50px;
            left: 50px;
            width: 100px;
            height: 100px;
            background-color: #D97706;
            border-radius: 50%;
            z-index: -1;
        }

        .about-section .about-content {
            flex: 1;
            padding-left: 50px;
        }

        .about-section .about-content h2 {
            color: #D97706;
            margin-bottom: 20px;
        }

        .about-section .about-content h1 {
            font-size: 36px;
            margin-bottom: 20px;
        }

        .about-section .about-content p {
            color: #555;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .about-section .about-content .coach {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 20px;
        }

        .about-section .about-content .coach img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
        }

        .about-section .about-content .coach .name {
            font-weight: bold;
        }

        .about-section .about-content .explore-btn {
            /* background-color: #ff5722; */
            background-color: #D97706;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <header>
        <div class="logo">FitHub</div>
        <nav>
            <a href="#">Home</a>
            <a href="#">About</a>
            <a href="/log">Sign In</a>
        </nav>
    </header>

    <section class="hero">
        <div class="hero-content">
            <h1>Work Hard To Get Better Life</h1>
            <p>Join the best fitness club and start your journey towards a healthier, better you. With world-class trainers and facilities, achieving your fitness goals has never been easier.</p>
            <a href="/reg" class="cta">Join Now</a>
        </div>
        <div class="hero-image">
            <img src="/img/f.jpg" alt="Fitness Trainer">
          
        </div>
    </section>
    <section class="about-section">
        <div class="about-image">
            <div class="background-shape"></div>
            <img src="/img/g.jpg" alt="Fitness Girl">
        </div>
        <div class="about-content">
            <h2>About Us</h2>         
            <p>
                We make fitness tracking simple and effective, helping you stay on top of your health goals. Our platform allows you to monitor workouts, set personalized goals, and analyze progress. Designed for all fitness levels, we provide customized workout plans and recommendations to keep you on the right track. Start today and take a step toward a healthier, stronger you!l
            </p>
            <a href="#" class="explore-btn">Explore More</a>
        </div>
    </section>

</body>
</html>
