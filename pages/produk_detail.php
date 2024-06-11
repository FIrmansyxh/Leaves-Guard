<?php
$id = isset($_GET['id']) ? intval($_GET['id']) : 0;
// var_dump($id);

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <title>Leaves Guard</title>

  <!-- favicon -->
  <link rel="shortcut icon" href="../assets/images/favicon.png" type="image/x-icon">

  <!-- bootstrap -->
  <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

  <!-- JQuery -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>

  <!-- swiper -->
  <link rel="stylesheet" href="../assets/css/swiper-bundle.min.css">

  <!-- datepicker -->
  <link rel="stylesheet" href="../assets/css/jquery.datetimepicker.css">

  <!-- jquery ui -->
  <link rel="stylesheet" href="../assets/css/jquery-ui.min.css">

  <!-- Tailwind -->
  <script src="https://cdn.tailwindcss.com"></script>

  <!-- common -->
  <link rel="stylesheet" href="../assets/css/common.css">

  <!-- animations -->
  <link rel="stylesheet" href="../assets/css/animations.css">

  <!-- welcome -->
  <link rel="stylesheet" href="../assets/css/welcome.css">

  <!-- datetime -->
  <link rel="stylesheet" href="../assets/css/datetimepicker.css">

  <!-- details -->
  <link rel="stylesheet" href="../assets/css/details.css">
</head>

<body class="scrollbar-hidden">
  <!-- splash-screen start -->
  <section id="preloader" class="spalsh-screen">
    <div class="circle text-center">
      <div>
        <h1>Leaves Guard</h1>
        <p>Make your hydroponics healthier</p>
      </div>
    </div>
    <div class="loader-spinner">
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
      <div></div>
    </div>
  </section>
  <!-- splash-screen end -->

  <main class="details vacation-details">
    <!-- banner start -->
    <section class="banner position-relative">
      <img src="../assets/images/details/banner-1.png" alt="Banner" class="w-100 img-fluid">

      <!-- title -->
      <div class="page-title">
        <button type="button"
          class="back-btn back-page-btn d-flex align-items-center justify-content-center rounded-full">
          <img src="../assets/svg/arrow-left-black.svg" alt="arrow">
        </button>
      </div>
    </section>
    <!-- banner end -->

    <!-- details-body start -->
    <section class="details-body">
      <!-- details-title -->
      <section class="d-flex align-items-center gap-8 details-title">
        <div class="flex-grow">
          <h3 id="product-name"></h3>
          <ul class="d-flex align-items-center gap-8">
            <li class="d-flex align-items-center gap-04">
              <img src="../assets/svg/map-marker.svg" alt="icon">
              <p id="location"></p>
            </li>
          </ul>
        </div>
      </section>

      <!-- details-info -->
      <section class="details-info pt-32 pb-16">
        <div class="title">
          <h4>Details</h4>
        </div>
        <div id="deskripsi">

        </div>

        <!-- details-footer start -->
        <section class="details-footer d-flex align-items-center justify-content-between gap-8 w-100">
          <p id="price"></p>
          <a id="url" href="">Order Sekarang</a>
        </section>
        <!-- details-footer end -->
  </main>

  <!-- jquery -->
  <script src="../assets/js/jquery-3.6.1.min.js"></script>

  <!-- bootstrap -->
  <script src="../assets/js/bootstrap.bundle.min.js"></script>

  <!-- jquery ui -->
  <script src="../assets/js/jquery-ui.js"></script>

  <!-- mixitup -->
  <script src="../assets/js/mixitup.min.js"></script>

  <!-- gasp -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/gsap.min.js"></script>

  <!-- draggable -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.3/Draggable.min.js"></script>

  <!-- swiper -->
  <script src="../assets/js/swiper-bundle.min.js"></script>

  <!-- datepicker -->
  <script src="../assets/js/jquery.datetimepicker.full.js"></script>

  <!-- google-map api -->
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCodvr4TmsTJdYPjs_5PWLPTNLA9uA4iq8&callback=initMap"
    type="text/javascript"></script>

  <!-- script -->
  <script src="../assets/js/script.js"></script>
  <script>
    $(document).ready(function () {
      getProduct();
    });
    function getProduct() {
      $("#place-cards").empty();
      $.ajax({
        type: "GET",
        url: "http://localhost/preview/api.php?id=" + <?php echo $id ?>,
        dataType: "json",
        success: function (response) {
          console.log(response);
          $('#product-name').append(response.name);
          $('#location').append(response.location);
          $('#deskripsi').append(response.description);
          $('#price').append('Rp' + response.price);
          $('#url').attr('href', response.link_product);
        },
        error: function (error) {
          console.log("Error fetching news:", error);
        },
      });
    }
  </script>
</body>

</html>