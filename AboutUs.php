<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us - Travel Agency</title>
    <link rel="stylesheet" href="styles.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }

        header {
            background-color: #333;
            color: #fff;
            padding: 20px 0;
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            display: flex;
            align-items: center;
            justify-content: flex-start;
        }

        nav ul li {
            margin-right: 20px;
        }

        nav ul li a {
            color: #fff;
            text-decoration: none;
            font-size: 18px;
        }

        nav ul li a:hover {
            color: #ccc;
        }

        .container {
            width: 80%;
            margin: auto;
            padding: 20px 0;
        }

        .about-us {
            background-color: #fff;
            padding: 40px;
            margin-bottom: 20px;
        }

        .about-us h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .about-us p {
            color: #666;
            line-height: 1.6;
            margin-bottom: 20px;
        }

        .photo-gallery {
            background-color: #f9f9f9;
            padding: 40px;
        }

        .photo-gallery h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        .gallery {
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        .photo {
            margin: 10px;
            width: 150px;
            height: 150px;
            border-radius: 50%;
            overflow: hidden;
            border: 2px solid #333;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            position: relative;
        }

        .photo img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .photo:hover {
            transform: scale(1.05);
        }

        .photo-caption {
            text-align: center;
            position: absolute;
            bottom: -30px;
            left: 0;
            right: 0;
            color: #333;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 20px 0;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
            </ul>
        </nav>
    </header>

    <section class="about-us">
        <div class="container">
            <h2>About Us</h2>
            <p>Welcome to our travel agency, where your journey begins. We specialize in providing convenient and comfortable bus booking services for your travel needs.</p>
            <p>At our agency, we understand that traveling by bus is not just about reaching your destination, but also about enjoying the journey. That's why we strive to make your bus travel experience enjoyable, safe, and hassle-free.</p>
            <p>Whether you're planning a weekend getaway, a family vacation, or a business trip, we've got you covered. Our extensive network of bus routes ensures that you can travel to your desired destination with ease.</p>
            <p>With our user-friendly online booking platform, you can easily search for bus routes, compare fares, and book your tickets in advance. We also offer flexible payment options and round-the-clock customer support to assist you every step of the way.</p>
            <p>Experience the convenience and comfort of bus travel with us. Book your tickets today and embark on your next adventure!</p>
        </div>
    </section>

    <section class="photo-gallery">
        <div class="container">
            <h2><u>Co-Founders</u></h2>
            <div class="gallery">
                <div class="photo">
                    <img src="./assets/members/jainil.jpg" alt="Image 1">
                </div>
                <div class="photo">
                    <img src="./assets/members/yash.png" alt="Image 2">
                </div>
                <div class="photo">
                    <img src="./assets/members/mihir.png" alt="Image 3">
                </div>
                <div class="photo">
                    <img src="./assets/members/patelprince.jpg" alt="Image 4">
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; 2024 Travel Agency. All rights reserved.</p>
        </div>
    </footer>
</body>

</html>