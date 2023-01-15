<!DOCTYPE html>
<?php
	session_start();
    include_once '../connection.php';
    include_once 'ownerNavBar.php';
    //$user_id = $_SESSION['user_id'];

  
?>

<!DOCTYPE html>
<html>
<head>
    <title>Hotel Booking Website</title>
    <!-- CSS only -->
<?php require('../inc/links.php'); ?>
<link
  rel="stylesheet"
  href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"
/>
<link rel="stylesheet" type="text/css" href="../css/common.css">
<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>

<style type="text/css">
    
    .availability-form{
        margin-top: -50px;
        z-index: 2;
        position: relative;
    }

    @media screen and (max-width: 275px ) {
    .availability-form{
        margin-top: 0px;
        padding: 0 35px;
        max-height: 300px;
    }

    }
</style>
</head>
<body>

<!-- Swiper Carousal-->
 <div class="container-fluid px-lg-4 mt-4">
     <div class="swiper swiper-container">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <img src="images/pexels-jean-van-der-meulen-1457842.jpg" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/pexels-leonardo-rossatti-2598638.jpg" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/pexels-pixabay-221457.jpg" class="w-100 d-block" />
        </div>
        <div class="swiper-slide">
          <img src="images/pexels-victoria-akvarel-1648771.jpg" class="w-100 d-block" />
        </div>
     
        
      </div>
      
    </div>
 </div>

 <!-- check avilability form-->
 <div class="container availability-form">
    <div class="row">
        <div class="col-lg-12 bg-white shadow p-4 rounded">
            <h5 class="col-lg-3">Check Booking Availability</h5>
            <form method="POST" action="testSearchResort.php">
                <div class="row align-items-end">
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Check-in</label>
                        <input type="date" class="form-control shadow-none" name = "fdate">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Check-Out</label>
                        <input type="date" class="form-control shadow-none" name="tdate">
                    </div>
                    <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">Capacity</label>
                        <select class="form-select shadow-none" name = "capacity">
                    
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        </select>
                    </div>

                     <div class="col-lg-3 mb-3">
                        <label class="form-label" style="font-weight: 500;">State</label>
                        <select class="form-select shadow-none" name = "state">
                    
                        <option value="Johor">Johor</option>
                        <option value="Kedah">Kedah</option>
                        <option value="Kelantan">Kelantan</option>
                        <option value="Melaka">Melaka</option>
                        <option value="Negeri Sembilan">Negeri Sembilan</option>
                        <option value="Pahang">Pahang</option>
                        <option value="Penang">Penang</option>
                        <option value="Perak">Perak</option>
                        <option value="Perlis">Perlis</option>
                        <option value="Sabah">Sabah</option>
                        <option value="Sarawak">Sarawak</option>
                        <option value="Selangor">Selangor</option>
                        <option value="Terengganu">Terengganu</option>


                        </select>
                    </div>

                    <div class="col-lg-1 mb-lg-3 mt-2">
                        <button type="submit" name = "submit" class="btn text-white shadow-none custom-bg">Submit</button>
                    </div>

                </div>
            </form>
        </div>
    </div>
 </div>

 <!-- Our Facilities-->


        </div>
     
    </div>
 </div>




<!-- JavaScript Bundle with Popper -->


 <!-- Swiper JS -->
    <script src="https://cdn.jsdelivr.net/npm/swiper/swiper-bundle.min.js"></script>

 <!-- Initialize Swiper -->
    <script>
      var swiper = new Swiper(".swiper-container", {
        spaceBetween: 30,
        effect: "fade",
        loop: true,
        autoplay: {
            delay: 3500,
            disableOnInteraction: false,
        }
      });

      var swiper = new Swiper(".swiper-testimonials", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        slidesPerView: "3",
        loop: true,
        coverflowEffect: {
          rotate: 50,
          stretch: 0,
          depth: 100,
          modifier: 1,
          slideShadows: false,
        },
        pagination: {
          el: ".swiper-pagination",
        },
        breakpoints: {
            320: {
                slidesPerView: 1,
            },
            640: {
                slidesPerView: 1,
            },
            768: {
                slidesPerView: 2,
            },
            1024: {
                slidesPerView: 3,
            },
        }
      });
    </script>
</body>
</html>
