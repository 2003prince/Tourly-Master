<?php

error_reporting(0);

session_start();

$server = "localhost";
$user = "root";
$pass = "";
$database = "cp_2";

$conn = mysqli_connect($server, $user, $pass, $database);

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tourly - Travel agancy</title>

  <!-- 
    - favicon
  -->
  <link rel="shortcut icon" href="./favicon.svg" type="image/svg+xml">

  <!-- 
    - custom css link
  -->
  <link rel="stylesheet" href="./assets/css/style.css">

  <!-- 
    - google font link
  -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500;600;700;800&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/5.5.2/collection/components/icon/icon.min.css">
</head>

<body id="top">

  <!-- 
    - #HEADER
  -->

  <header class="header" data-header>

    <div class="overlay" data-overlay></div>

    <div class="header-top">
      <div class="container">

        <a href="tel:+01123456790" class="helpline-box">

          <div class="icon-box">
            <ion-icon name="call-outline"></ion-icon>
          </div>

          <div class="wrapper">
            <p class="helpline-title">For Further Inquires :</p>

            <p class="helpline-number">+91 1800 1800 123</p>
          </div>

        </a>

        <a href="#" class="logo">
          <img src="./assets/images/logo.svg" alt="Tourly logo">
        </a>

        <div class="header-btn-group">

          <?php

          if ($_SESSION['user_name']) {

          ?>

            <p><?php echo $_SESSION['user_name']; ?></p>
            <a href="logout.php"><button class="login-btn">Logout</button></a>

          <?php

          } else {

          ?>

            <a href="login__.php"><button class="login-btn">Login Now</button></a>
            <a href="SignUp.php"><button class="login-btn">Sign up Now</button></a>
            <a href="admin_login.php"><button class="login-btn">Admin</button></a>

          <?php

          }

          ?>

          <script src="script.js"></script>

          <button class="nav-open-btn" aria-label="Open Menu" data-nav-open-btn>
            <ion-icon name="menu-outline"></ion-icon>
          </button>

        </div>

      </div>
    </div>

    <div class="header-bottom">
      <div class="container" style="padding-top: 20px;">

        <ul class="social-list">

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
              <ion-icon name="logo-youtube"></ion-icon>
            </a>
          </li>

        </ul>

        <nav class="navbar" data-navbar>

          <div class="navbar-top">

            <a href="#" class="logo">
              <img src="./assets/images/logo-blue.svg" alt="Tourly logo">
            </a>

            <button class="nav-close-btn" aria-label="Close Menu" data-nav-close-btn>
              <ion-icon name="close-outline"></ion-icon>
            </button>

          </div>

          <ul class="navbar-list">

            <li>
              <a href="#home" class="navbar-link" data-nav-link>home</a>
            </li>

            <li>
              <a href="AboutUs.php" class="navbar-link" data-nav-link>about us</a>
            </li>

            <li>
              <a href="#destination" class="navbar-link" data-nav-link>destination</a>
            </li>

            <!-- <li>
              <a href="#package" class="navbar-link" data-nav-link>packages</a>
            </li> -->

            <li>
              <a href="#gallery" class="navbar-link" data-nav-link>gallery</a>
            </li>

            <li>
              <a href="#contact" class="navbar-link" data-nav-link>contact us</a>
            </li>

          </ul>

        </nav>

        <a href="records.php"><button class="btn btn-primary">My Records</button></a>

      </div>
    </div>

  </header>






  <main>
    <article>

      <!-- 
        - #HERO
      -->

      <section class="hero" id="home">
        <div class="container">

          <h2 class="h1 hero-title">Journey to explore India</h2>

          <p class="hero-text">
            Book your bus tickets effortlessly with us. Enjoy hassle-free reservations from anywhere, anytime. Simplify your travel plans and secure your seats online today.
          </p>

          <a href="AboutUs.php">
            <h2 style="color: green;">Learn more</h2>
          </a>

        </div>
      </section>
      <!-- 
        - #TOUR SEARCH
      -->
      <section class="tour-search">
        <div class="container">

          <form method='post' class="tour-search-form">

            <div class="input-wrapper">
              <label for="destination" class="input-label">Start Destination*</label>

              <input type="text" name="start_desti" id="destination" list="destination_list" required placeholder="Enter Destination" class="input-field" autocomplete="off">

              <datalist id="destination_list">
                <option value="Ahmedabad">Ahmedabad</option>
                <option value="Surat">Surat</option>
                <option value="Palanpur">Palanpur</option>
                <option value="Mehsana">Mehsana</option>
                <option value="Visnagar">Visnagar</option>
                <option value="Patan">Patan</option>
                <option value="Gandhinagar">Gandhinagar</option>
              </datalist>

            </div>

            <div class="input-wrapper">
              <label for="destination" class="input-label">Stop Destination*</label>

              <input type="text" name="stop_desti" id="destination" list="destination_list" required placeholder="Enter Destination" class="input-field" autocomplete="off">

              <datalist id="destination_list">
                <option value="Ahmedabad">Ahmedabad</option>
                <option value="Surat">Surat</option>
                <option value="Palanpur">Palanpur</option>
                <option value="Mehsana">Mehsana</option>
                <option value="Visnagar">Visnagar</option>
                <option value="Patan">Patan</option>
                <option value="Gandhinagar">Gandhinagar</option>
              </datalist>

            </div>

            <!-- <div class="input-wrapper">
              <label for="people" class="input-label">Pax Number*</label>

              <input type="number" name="people" id="people" required placeholder="No.of People" class="input-field">
            </div> -->

            <div class="input-wrapper">
              <label for="checkin" class="input-label">Date</label>

              <input type="date" name="date" id="checkin" required class="input-field">
            </div>

            <div class="input-wrapper">
              <label for="checkin" class="input-label">Seats</label>

              <input type="number" name="seats" placeholder="No. of seats" id="checkin" required class="input-field">
            </div>


            <!-- <div class="input-wrapper">
              <label for="checkout" class="input-label">Checkout Date*</label>

              <input type="date" name="checkout" id="checkout" required class="input-field">
            </div> -->

            <button type="submit" name='inquire' class="btn btn-secondary">Inquire now</button>

          </form><br>

        </div>

        <?php


        if (isset($_POST['inquire'])) {

          $start_destination = $_POST['start_desti'];
          $stop_destination = $_POST['stop_desti'];
          $date = $_POST['date'];
          $seats = $_POST['seats'];

          $rows = mysqli_query($conn, "select * from journey where  start_desti='$start_destination' AND stop_desti='$stop_destination' AND date='$date' AND seats > 0");

          $email_count = mysqli_num_rows($rows);
          if ($email_count > 0) {
        ?>

            <table style="width:100%;text-align:center;padding:15px 20px;background:white;">

              <tr style="border:1px solid black">
                <td style="font-weight:bold;border:1px solid black">Id</td>
                <td style="font-weight:bold;border:1px solid black">Start Destination</td>
                <td style="font-weight:bold;border:1px solid black">Stop Destination</td>
                <td style="font-weight:bold;border:1px solid black">Date</td>
                <td style="font-weight:bold;border:1px solid black">Seats Available</td>
                <td style="font-weight:bold;border:1px solid black">Price</td>
                <td style="font-weight:bold;border:1px solid black">Book Now</td>
              </tr>

              <?php

              while ($result2 = mysqli_fetch_assoc($rows)) {

                $get_id = $result2['id'];

                $seat_count = $result2['seats'];

                $price = $result2['price'];

                $username = $_SESSION['user_name'];

                $select = "select * from book where id='$get_id' and username='$username'";

                $query = mysqli_query($conn, $select);

                $email_count = mysqli_num_rows($query);


                if ($seat_count <= 0) {

              ?>

                  <tr>
                    <td><?php echo $result2['id']; ?></td>
                    <td><?php echo $result2['start_desti']; ?></td>
                    <td><?php echo $result2['stop_desti']; ?></td>
                    <td><?php echo $result2['date']; ?></td>
                    <td><?php echo $result2['seats']; ?></td>
                    <td><?php echo $result2['price']; ?></td>
                    <td>
                      <pack style="color:black;background:white;opacity:0.5;">Already Booked</p>
                    </td>
                  </tr>

                <?php

                } else {

                ?>
                  <tr>
                    <td><?php echo $result2['id']; ?></td>
                    <td><?php echo $result2['start_desti']; ?></td>
                    <td><?php echo $result2['stop_desti']; ?></td>
                    <td><?php echo $result2['date']; ?></td>
                    <td><?php echo $result2['seats']; ?></td>
                    <td><?php echo $result2['price']; ?></td>
                    <td><a href="book.php?id=<?php echo $result2['id']; ?>" style="color:green;background:white;">Book</a></td>
                  </tr>

              <?php

                  $remain = $seat_count - $seats;

                  $_SESSION['seats'] = $seats;

                  $_SESSION['price'] = $price * $seats;

                  $upd = "UPDATE journey SET seats = $remain WHERE start_desti = '$start_destination' AND stop_desti = '$stop_destination' AND date = '$date'";

                  if (mysqli_query($conn, $upd)) {
                    echo " ";
                  }
                }
              }

              ?>

            </table>

          <?php

          } else {

          ?>

            <p style="color:red;text-align:center;">No Data</p>

        <?php

          }
        }



        ?>

      </section>


      <!-- 
        - #POPULAR
      -->

      <section class="popular" id="destination">


        <div class="container">

          <p class="section-subtitle">Uncover place</p>

          <h2 class="h2 section-title">Popular destination</h2>

          <p class="section-text">
            It seems to me that some people want to make this announcement, but only the first ones, and no one else. The appearance of the praisers. Let it be ornamented with elasticity, fit.
          </p>

          <ul class="popular-list">

            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="./assets/images/Photos-20240401T125956Z-001/Photos/Sun temple Modera_.jfif" alt="San miguel, italy" loading="lazy">
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                  </div>

                  <p class="card-subtitle">
                    <a href="#">Gujarat</a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="#">Sun Temple</a>
                  </h3>

                  <p class="card-text">
                    It seems to me that some of these people want to spread the word.
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="./assets/images/Photos-20240401T125956Z-001/Photos/somnath temple.png" alt="Burj khalifa, dubai" loading="lazy">
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                  </div>

                  <p class="card-subtitle">
                    <a href="#">Gujarat</a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="#">Somnath</a>
                  </h3>

                  <p class="card-text">
                    It seems to me that some of these people want to spread the word.
                  </p>

                </div>

              </div>
            </li>

            <li>
              <div class="popular-card">

                <figure class="card-img">
                  <img src="./assets/images/Photos-20240401T125956Z-001/Photos/Dattatreya Temple, Girnar, Junagadh.jpg" alt="Kyoto temple, japan" loading="lazy">
                </figure>

                <div class="card-content">

                  <div class="card-rating">
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                    <ion-icon name="star"></ion-icon>
                  </div>

                  <p class="card-subtitle">
                    <a href="#">Gujarat</a>
                  </p>

                  <h3 class="h3 card-title">
                    <a href="#">Girnar</a>
                  </h3>

                  <p class="card-text">
                    Fusce hic augue velit wisi ips quibusdam pariatur, iusto.
                  </p>

                </div>

              </div>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #PACKAGE
      -->



      <!-- 
        - #GALLERY
      -->

      <section class="gallery" id="gallery">
        <div class="container">

          <p class="section-subtitle">Photo Gallery</p>

          <h2 class="h2 section-title">Photo's From Travellers</h2>

          <p class="section-text">
            It seems to me that some people want to make this announcement, but only the first ones, and no one else. The appearance of the praisers.
            Let it be decorated
            elasticity is held, fit.
          </p>

          <ul class="gallery-list">

            <li class="gallery-item">
              <figure class="gallery-image">
                <!-- 
                   - #GALLERY pic 1
                -->
                <img src="./assets\images\gallery-4.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <!-- 
                   - #GALLERY pic 2
                -->
                <img src=".\assets\images\Photos-20240401T125956Z-001\Photos\hil.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <!-- 
                   - #GALLERY pic 3
                -->
                <img src=".\assets\images\Photos-20240401T125956Z-001\Photos\Gijrati thali.jfif" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <!-- 
                   - #GALLERY pic 4
                -->
                <img src=".\assets\images\Photos-20240401T125956Z-001\Photos\new pic.jpg" alt="Gallery image">
              </figure>
            </li>

            <li class="gallery-item">
              <figure class="gallery-image">
                <!-- 
                - #GALLERY pic 5
             -->
                <img src=".\assets\images\Photos-20240401T125956Z-001\Photos\Munnar-Kerala-1.jpg" alt="Gallery image">
              </figure>
            </li>

          </ul>

        </div>
      </section>





      <!-- 
        - #CTA
      -->

      <section class="cta" id="contact">
        <div class="container">

          <div class="cta-content">
            <p class="section-subtitle">Call To Action</p>

            <h2 class="h2 section-title">Ready For Unforgatable Travel. Remember Us!</h2>

            <p class="section-text">
              Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio voluptas quos enim delectus odit molestias! Cum libero excepturi esse? Nemo velit dicta dolore error explicabo!
            </p>
          </div>

        </div>
      </section>

    </article>
  </main>






  <!-- 
    - #FOOTER
  -->

  <footer class="footer">

    <div class="footer-top">
      <div class="container">

        <div class="footer-brand">

          <a href="#" class="logo">
            <img src="./assets/images/logo.svg" alt="Tourly logo">
          </a>

          <p class="footer-text">
            iscover seamless bus ticket booking on our website. With user-friendly features, easily locate and reserve seats for your preferred routes. Skip the queues and uncertainty by securing your seats in advance from anywhere. Simplify your journey and book your bus tickets hassle-free online now.
          </p>

        </div>

        <div class="footer-contact">

          <h4 class="contact-title">Contact Us</h4>

          <p class="contact-text">
            Feel free to contact and reach us !!
          </p>

          <ul>

            <li class="contact-item">
              <ion-icon name="call-outline"></ion-icon>

              <a href="tel:+01123456790" class="contact-link">+91 1800 1800 123</a>
            </li>

            <li class="contact-item">
              <ion-icon name="mail-outline"></ion-icon>

              <a href="mailto:info.tourly.com" class="contact-link">info.tourly.com</a>
            </li>

            <li class="contact-item">
              <ion-icon name="location-outline"></ion-icon>

              <address>384002 , Gujarat , india </address>
            </li>

          </ul>

        </div>

      </div>
    </div>

    <div class="footer-bottom">
      <div class="container">

        <p class="copyright">
          &copy; 2024 <a href=""></a>. All rights reserved
        </p>

        <ul class="footer-bottom-list">

          <li>
            <a href="#" class="footer-bottom-link">Privacy Policy</a>
          </li>

          <li>
            <a href="#" class="footer-bottom-link">Term & Condition</a>
          </li>

          <li>
            <a href="#" class="footer-bottom-link">FAQ</a>
          </li>

        </ul>

      </div>
    </div>

  </footer>





  <!-- 
    - #GO TO TOP
  -->

  <a href="#top" class="go-top" data-go-top>
    <ion-icon name="chevron-up-outline"></ion-icon>
  </a>





  <!-- 
    - custom js link
  -->
  <script src="./assets/js/script.js"></script>

  <!-- 
    - ionicon link
  -->
  <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
  <script nomodule src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.js"></script>

</body>

</html>