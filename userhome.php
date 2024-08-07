<?php
$dsn = 'mysql:dbname=university;host=127.0.0.1;port=3306;';
$user = 'root';
$password = '';
$db = new PDO($dsn, $user, $password);

session_start();
if (isset($_REQUEST['logout'])) {
	unset($_SESSION['user']);
	session_destroy();
	header('location:index.html');
}
$stmt = "SELECT * FROM `product` ";

$stmt = $db->prepare($stmt);
$res = $stmt->execute();

    
$stmtuser = "SELECT * FROM `user` where Id=:uid";

$stmtuser = $db->prepare($stmtuser);
$stmtuser->bindValue(":uid",1);
$res = $stmtuser->execute();
$rowuserphone=$stmtuser->fetch(PDO::FETCH_ASSOC);
 


?>
<!DOCTYPE html>
<html>

<head>
  <!-- Basic -->
  <meta charset="utf-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <!-- Mobile Metas -->
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
  <!-- Site Metas -->
  <link rel="icon" href="images/fevicon.png" type="image/gif" />
  <meta name="keywords" content="" />
  <meta name="description" content="" />
  <meta name="author" content="" />

  <title>الجامعة الهاشمية</title>


  <!-- bootstrap core css -->
  <link rel="stylesheet" type="text/css" href="css/bootstrap.css" />

  <!-- fonts style -->
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet"> <!-- range slider -->

  <!-- font awesome style -->
  <link href="css/font-awesome.min.css" rel="stylesheet" />

  <!-- Custom styles for this template -->
  <link href="css/style.css" rel="stylesheet" />
  <!-- responsive style -->
  <link href="css/responsive.css" rel="stylesheet" />

</head>

<body class="sub_page">

  <div class="hero_area">
    <!-- header section strats -->
    <header class="header_section">
      <div class="header_top">
        <div class="container-fluid">
          <div class="top_nav_container">
            <div class="contact_nav">
              <a href="">
                
              </a>
              <a href="">
                <i class="fa fa-envelope" aria-hidden="true"></i>
                <span>
                  Email : ahmadalgazo92@gmail.com
                </span>
              </a>
            </div>
         
            <div class="user_option_box">
              <a href="" class="account-link">
                <i class="fa fa-user" aria-hidden="true"></i>
                <span>
                                <?php echo $_SESSION['user']['UserName']?>
                </span>
              </a>
              <a href="" class="cart-link">
              <i class="fa fa-sign-out" aria-hidden="true"></i><span><a href="userhome.php?logout='true'">Logout</a>
                                </span>
                          
              </a>
            </div>
          </div>

        </div>
      </div>
      <div class="header_bottom">
        <div class="container-fluid">
          <nav class="navbar navbar-expand-lg custom_nav-container ">
            <a class="navbar-brand" href="index.html">
              
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav ">
                <li class="nav-item ">
                  <a class="nav-link" href="index.html">Home <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="about.html"> About</a>
                </li>
                <li class="nav-item active">
                  <a class="nav-link" href="">Products</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="why.html">Why Us</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" href="testimonial.html">Testimonial</a>
                </li>
              </ul>
            </div>
          </nav>
        </div>
      </div>
    </header>
    <!-- end header section -->
  </div>


  <!-- product section -->

  <section class="product_section layout_padding">
    <div class="container">
      <div class="heading_container heading_center">
        <h2>
          Our Products
        </h2>
      </div>
      <div class="row">
      <?php
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) { 
                ?>
        <div class="col-sm-6 col-lg-4">
          <div class="box">
            <div class="img-box">
           <?php
           $stmtuser = "SELECT * FROM `user` where Id=:uid";

           $stmtuser = $db->prepare($stmtuser);
           $stmtuser->bindValue(":uid",$row["userid"]);
           $res = $stmtuser->execute();
           $rowuserphone=$stmtuser->fetch(PDO::FETCH_ASSOC);
           ?>
              <img src="images/<?= $row["photo"] ?>" alt="">
              <a  href="http://wa.me/+<?=$rowuserphone["phone"]; ?>"
       target="_blank" class="add_cart_btn">
                <span>
               
                <i class="fa fa-whatsapp"></i> Contact  
                </span>
              </a>
            </div>
            <div class="detail-box">
              <h5>
              <?= $row["productName"] ?>
              </h5><br>
              <p> <?= $row["description"] ?>
                                    <p>
              <div class="product_info">
                
                <h5>
                <span>$</span>

                <?= $row["price"] ?>
                </h5>
                <div class="star_container">
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                  <i class="fa fa-star" aria-hidden="true"></i>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php
                }
                ?>
</div>
      <div class="btn_box">
        <a href="" class="view_more-link">
          View More
        </a>
      </div>
    </div>
  </section>

  <!-- end product section -->


  <!-- info section -->
  <section class="info_section ">
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <div class="info_contact">
            <h5>
              <a href="" class="navbar-brand">
                <span>
                  Minics
                </span>
              </a>
            </h5>
            <p>
              <i class="fa fa-map-marker" aria-hidden="true"></i> 
              al'urdunu _ alzarqa' _ alhashimia
            </p>
            <p>
             
            </p>
            <p>
              <i class="fa fa-envelope" aria-hidden="true"></i>
              ahmadalgazo92@gmail.com
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_info">
            <h5>
              Information
            </h5>
            <p>
              Eligendi sunt, provident, debitis nemo, facilis cupiditate velit libero dolorum aperiam enim nulla iste maxime corrupti ad illo libero minus.
            </p>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_links">
            <h5>
              Useful Link
            </h5>
            <ul>
            <li>
                                العنوان  Jordan_alzarqa'a_Hashemite University      </li>
                            <li>
                                الميل ahmadalgazo92@gmail.com
                            </li>
                           
                        </ul>
          </div>
        </div>
        <div class="col-md-3">
          <div class="info_form ">
            <h5>
              Newsletter
            </h5>
            <form action="">
              <input type="email" placeholder="Enter your email">
              <button>
                Subscribe
              </button>
            </form>
            <div class="social_box">
              <a href="">
                <i class="fa fa-facebook" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-twitter" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-instagram" aria-hidden="true"></i>
              </a>
              <a href="">
                <i class="fa fa-youtube" aria-hidden="true"></i>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- end info_section -->


  <!-- footer section -->
  <footer class="footer_section">
    <div class="container">
      <p>
      
                &copy; <span id="displayYear"></span> All Rights Reserved By
                <a> Us سوق الجامعة الهاشمية </a>
             
      </p>
    </div>
  </footer>
  <!-- footer section -->

  <!-- jQery -->
  <script src="js/jquery-3.4.1.min.js"></script>
  <!-- bootstrap js -->
  <script src="js/bootstrap.js"></script>
  <!-- custom js -->
  <script src="js/custom.js"></script>


</body>

</html>