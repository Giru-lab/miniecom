<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>VetCore Plus</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="{{ asset('res/img/favicon.png') }}" rel="icon">
  <link href="{{ asset('res/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('res/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('res/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('res/vendor/aos/aos.css') }}" rel="stylesheet">
  <link href="{{ asset('res/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
  <link href="{{ asset('res/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{ asset('res/css/main.css') }}" rel="stylesheet">

  <!-- =======================================================
  * Template Name: Appland
  * Template URL: https://bootstrapmade.com/free-bootstrap-app-landing-page-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

  <header id="header" class="header d-flex align-items-center sticky-top">
    <div class="container-fluid container-xl position-relative d-flex align-items-center">

      <div class="logo d-flex align-items-center me-auto">
        <!-- <img src="{{ asset('res/img/logo.png') }}" alt=""> -->
        <h1 class="sitename"><span class="text-warning">Vet</span>core</h1>
      </div>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="#features">Features</a></li>
          <li><a href="#products">Products</a></li>
          <li><a href="#gallery">Gallery</a></li>
          <li><a href="#faq">F.A.Q</a></li>
          <li><a href="#contact">Contact</a></li>
            <ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>

      <a class="btn-getstarted" href="{{ route('products.browse') }}">Get Started</a>

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section" style="background-size: cover; background-position: bottom; background-image: url({{ asset('res/img/background.webp') }});">

      <div class="container">
        <div class="row gy-4">
          <div class="col-lg-6 order-lg-last hero-img" data-aos="zoom-out" data-aos-delay="100">
            <img src="{{ asset('res/img/hero-imgs.png') }}" class="img-fluid animated" alt="">
          </div>
          <div class="col-lg-6  d-flex flex-column justify-content-center text-center text-md-start" data-aos="fade-in">
            <h2 class="text-black">Join the Vetcore community today!
              Register now to get pet care tips, product updates, and exclusive offers straight to your inbox.</h2>
            <p></p>
            <div class="d-flex mt-4 justify-content-center justify-content-md-start">
              <a href="/register" class="btn btn-primary">Register Now</a>
            </div>
          </div>
        </div>
      </div>

    </section><!-- /Hero Section -->

    <!-- About Section -->
    <section id="about" class="about section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
      </div><!-- End Section Title -->


    <!-- Features Section -->
    <section id="features" class="features section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Features</h2>
        <p>Making life easier for you and your furry friends.</p>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row gy-5">

          <div class="col-xl-5 d-flex align-items-center" data-aos="fade-up" data-aos-delay="100">
            <img src="{{ asset('res/img/dog-playing.png') }}" class="img-fluid" alt="">
          </div>

          <div class="col-xl-7 d-flex" data-aos="fade-up" data-aos-delay="200">

            <div class="row align-self-center gy-5">

              <div class="col-md-6 icon-box">
                <i class="bi bi-award"></i>
                <div>
                  <h4>Safe & Trusted Products</h4>
                  <p>All products and treats are carefully selected and vet-approved to ensure the safety of your pets.</p>
                </div>
              </div><!-- End Feature Item -->

              <div class="col-md-6 icon-box">
                <i class="bi bi-card-checklist"></i>
                <div>
                  <h4>Engaging Playtime Essentials</h4>
                  <p>From squeaky toys to durable chews, our products keep your pets active and happy.</p>
                </div>
              </div><!-- End Feature Item -->

              <div class="col-md-6 icon-box">
                <i class="bi bi-dribbble"></i>
                <div>
                  <h4>Real-Time Support</h4>
                  <p>Our team is always ready to help with questions, recommendations, or issues.</p>
                </div>
              </div><!-- End Feature Item -->

              <div class="col-md-6 icon-box">
                <i class="bi bi-filter-circle"></i>
                <div>
                  <h4>Eco-Friendly Choices</h4>
                  <p>We offer sustainable options that are great for your pet—and the planet.</p>
                </div>
              </div><!-- End Feature Item -->

              <div class="col-md-6 icon-box">
                <i class="bi bi-patch-check"></i>
                <div>
                  <h4>Easy Payment Options</h4>
                  <p>No need to choose mode of payments because we offers COD (Cash on Delivery) </p>
                </div>
              </div><!-- End Feature Item -->

              <div class="col-md-6 icon-box">
                <i class="bi bi-lightning-charge"></i>
                <div>
                  <h4>Fast & Reliable Delivery</h4>
                  <p>Get your orders delivered quickly with our trusted courier partners, right to your doorstep.</p>
                </div>
              </div><!-- End Feature Item -->

            </div>

          </div>

        </div>

      </div>

    </section><!-- /Features Section -->

    <!-- PRODUCT Section -->
    
    <section id="product" class="gallery section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">

        <section id="products" class="products section">
          <h2>Products </h2>
          <p>Premium care for pets — trusted by vets, loved by pet parents.</p>
      </div><!-- End Section Title -->

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100"
          >


          <style>
            .product-gallery img {
              border-radius: 12px;
              transition: transform 0.3s ease, box-shadow 0.3s ease;
              box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
              height: 100%;
              object-fit: cover;
            }
          
            .product-gallery img:hover {
              transform: scale(1.03);
              box-shadow: 0 6px 20px rgba(0, 0, 0, 0.15);
            }
          
            .gallery-wrapper {
              gap: 20px;
              flex-wrap: wrap;
            }
          
            @media (max-width: 992px) {
              .product-gallery div {
                flex: 1 1 48%;
              }
            }
          
            @media (max-width: 576px) {
              .product-gallery div {
                flex: 1 1 100%;
              }
            }
          
            .browse-button {
              background-color: #5271FF;
              color: white;
              padding: 12px 30px;
              border: none;
              border-radius: 6px;
              font-size: 16px;
              cursor: pointer;
              transition: background-color 0.3s ease;
              text-decoration: none;
              display: inline-block;
            }
          
            .browse-button:hover {
              background-color: #3959e7;
            }
          </style>
          
          <div class="d-flex gallery-wrapper product-gallery">
            <div>
              <img src="{{ asset('res/img/app-gallery/bunddd.png') }}" class="img-fluid" alt="Bundle Product" style="height: 500px;">
            </div>
            <div>
              <img src="{{ asset('res/img/app-gallery/active sss.png') }}" class="img-fluid" alt="Active Supplement" style="height: 500px;">
            </div>
            <div>
              <img src="{{ asset('res/img/app-gallery/nutrifuel.png') }}" class="img-fluid" alt="NutriFuel" style="height: 500px;">
            </div>
          </div>
          
          <div style="padding: 30px; display: flex; justify-content: center;">
            <a href="{{ route('products.browse') }}" class="browse-button">
              Browse All Products
            </a>
          </div>
          


          <div class="swiper-pagination"></div>

      </div>

  </section>
    
    <!-- Gallery Section -->
    <section id="gallery" class="gallery section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Gallery</h2>
        <h3>this is the product that can be bought on Tiktok</h3>
      </div><!-- End Section Title -->

      <div class="container-fluid" data-aos="fade-up" data-aos-delay="100">

        <div class="swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "slidesPerView": "auto",
              "centeredSlides": true,
              "pagination": {
                "el": ".swiper-pagination",
                "type": "bullets",
                "clickable": true
              },
              "breakpoints": {
                "320": {
                  "slidesPerView": 1,
                  "spaceBetween": 0
                },
                "768": {
                  "slidesPerView": 3,
                  "spaceBetween": 30
                },
                "992": {
                  "slidesPerView": 5,
                  "spaceBetween": 30
                },
                "1200": {
                  "slidesPerView": 7,
                  "spaceBetween": 30
                }
              }
            }
          </script>
          <div class="swiper-wrapper align-items-center">
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery-full" href="{{ asset('res/img/app-gallery/1.jpg') }}"><img src="{{ asset('res/img/app-gallery/1.jpg') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery-full" href="{{ asset('res/img/app-gallery/2.jpg') }}"><img src="{{ asset('res/img/app-gallery/2.jpg') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery-full" href="{{ asset('res/img/app-gallery/3.jpg') }}"><img src="{{ asset('res/img/app-gallery/3.jpg') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery-full" href="{{ asset('res/img/app-gallery/4.jpg') }}"><img src="{{ asset('res/img/app-gallery/4.jpg') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery-full" href="{{ asset('res/img/app-gallery/5.jpg') }}"><img src="{{ asset('res/img/app-gallery/5.jpg') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery-full" href="{{ asset('res/img/app-gallery/6.jpg') }}"><img src="{{ asset('res/img/app-gallery/6.jpg') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery-full" href="{{ asset('res/img/app-gallery/7.jpg') }}"><img src="{{ asset('res/img/app-gallery/7.jpg') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery-full" href="{{ asset('res/img/app-gallery/8.jpg') }}"><img src="{{ asset('res/img/app-gallery/8.jpg') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery-full" href="{{ asset('res/img/app-gallery/9.jpg') }}"><img src="{{ asset('res/img/app-gallery/9.jpg') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery-full" href="{{ asset('res/img/app-gallery/3.jpg') }}"><img src="{{ asset('res/img/app-gallery/3.jpg') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery-full" href="{{ asset('res/img/app-gallery/6.jpg') }}"><img src="{{ asset('res/img/app-gallery/6.jpg') }}" class="img-fluid" alt=""></a></div>
            <div class="swiper-slide"><a class="glightbox" data-gallery="images-gallery-full" href="{{ asset('res/img/app-gallery/4.jpg') }}"><img src="{{ asset('res/img/app-gallery/4.jpg') }}" class="img-fluid" alt=""></a></div>
          </div>
          <div class="swiper-pagination"></div>
        </div>

      </div>

    </section><!-- /Gallery Section -->

    
    <!-- Faq Section -->
    <section id="faq" class="faq section light-background">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Frequently Asked Questions</h2>
      </div><!-- End Section Title -->

      <div class="container">

        <div class="row justify-content-center">

          <div class="col-lg-8">

            <div class="faq-container">

              <div class="faq-item faq-active" data-aos="fade-up" data-aos-delay="200">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>What kind of products does Vetcore Plus offer?</h3>
                <div class="faq-content">
                  <p>Vetcore Plus offers a wide range of veterinary and pet care products including pet supplements, vitamins, dewormers, grooming essentials, pet food, accessories, and more. We also provide products for livestock and poultry needs.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="300">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Are Vetcore Plus products safe for all breeds and ages?</h3>
                <div class="faq-content">
                  <p>Yes, our products are formulated to be safe for most breeds and age groups. However, we recommend checking the label or consulting your veterinarian for breed-specific or age-specific recommendations, especially for puppies, kittens, or senior pets.

                  </p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="400">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>How can I be sure that a product is authentic?</h3>
                <div class="faq-content">
                  <p>To ensure authenticity, only purchase from our official store, authorized resellers, or verified online platforms. All Vetcore Plus products come with clear packaging, labels, and expiration dates.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="500">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Where can I buy Vetcore Plus products?</h3>
                <div class="faq-content">
                  <p>You can purchase our products through our official website, partner e-commerce platforms like Shopee, Lazada, and TikTok Shop, or from authorized resellers nationwide.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item" data-aos="fade-up" data-aos-delay="600">
                <i class="faq-icon bi bi-question-circle"></i>
                <h3>Do you offer Cash on Delivery (COD)?</h3>
                <div class="faq-content">
                  <p>Yes, we offer Cash on Delivery for orders made through select platforms such as Shopee and TikTok Shop.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

            </div>

          </div>

        </div>

      </div>

    </section><!-- /Faq Section -->

    <!-- Contact Section -->
    <section id="contact" class="contact section">

      <!-- Section Title -->
      <div class="container section-title" data-aos="fade-up">
        <h2>Contact</h2>
        <p></p>
      </div><!-- End Section Title -->

      <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="row gy-4">

          <div class="col-lg-6">

            <div class="row gy-4">
              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="200">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Address</h3>
                  <p>Blk 22 Lot 31 Mount Caraballo St.  </p>
                  <p>Camella Springville
                    Heights Phase 3, Bacoor, Cavite, South Luzon</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="300">
                  <i class="bi bi-telephone"></i>
                  <h3>Call Us</h3>
                  <p>+639707406924
                  </p>
                  <p>_
                  </p>
                  <p>
                    +639107907488</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="400">
                  <i class="bi bi-envelope"></i>
                  <h3>Email Us</h3>
                  <p>gilberttabigue156@gmail.com</p>
                  <p>primovet.gilbert@gmail.com</p>
                </div>
              </div><!-- End Info Item -->

              <div class="col-md-6">
                <div class="info-item" data-aos="fade" data-aos-delay="500">
                  <i class="bi bi-clock"></i>
                  <h3>Open Hours</h3>
                  <p>Monday - Saturday</p>
                  <p>8:00AM - 05:00PM</p>
                </div>
              </div><!-- End Info Item -->

            </div>

          </div>

          <div class="col-lg-6">
            <form action="forms/contact.php" method="post" class="php-email-form" data-aos="fade-up" data-aos-delay="200">
              <div class="row gy-4">

                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Your Name" required="">
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Your Email" required="">
                </div>

                <div class="col-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subject" required="">
                </div>

                <div class="col-12">
                  <textarea class="form-control" name="message" rows="6" placeholder="Message" required=""></textarea>
                </div>

                <div class="col-12 text-center">
                  <div class="loading">Loading</div>
                  <div class="error-message"></div>
                  <div class="sent-message">Your message has been sent. Thank you!</div>

                  <button type="submit">Send Message</button>
                </div>

              </div>
            </form>
          </div><!-- End Contact Form -->

        </div>

      </div>

    </section><!-- /Contact Section -->

  </main>

  <footer id="footer" class="footer">

    <div class="footer-newsletter">
      <div class="container">
        <div class="row justify-content-center text-center">
          <div class="col-lg-6">
            <h4>Join Our Newsletter</h4>
            <p>Be the first to get updates about Vetcore Plus products, promos, and exclusive offers</p>
            <form action="forms/newsletter.php" method="post" class="php-email-form">
              <div class="newsletter-form"><input type="email" name="email"><input type="submit" value="Subscribe"></div>
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your subscription request has been sent. Thank you!</div>
            </form>
          </div>
        </div>
      </div>
    </div>
    
    

    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-6 footer-about">
          <a href="index.html" class="d-flex align-items-center">
            <span class="sitename">Vetcore Plus</span>
          </a>
          <div class="footer-contact pt-3">
            <p>Address: Bik 22 Lot 31 Mount Caraballo St.</p>
            <p>Camella Springville Heights Phase 3, Bacoor, Cavite, South Luzon </p>
            <p>Landmark: Casa Veronica </p>
            <p>Company: PRIMOVET INC.</p>
            <p class="mt-3"><strong>Phone:</strong> <span>+639707406924</span></p>
            <p><strong>Email:</strong> <span>gilberttabigue156@gmail.com</span></p>
          </div>
        </div>

        <div class="col-lg-2 col-md-3 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="#">Home</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('products.browse') }}">Food And Supplements</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('products.browse') }}">Tick And Flea Prevention</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="{{ route('products.browse') }}">Grooming Supplies</a></li>

          </ul>
        </div>

        <div class="col-lg-4 col-md-12">
          <h4>Follow Us</h4>
          <p>Vet Core Plus</p>
          <div class="social-links d-flex">
            <a href="https://www.facebook.com/vetcoreplus" target="_blank"><i class="bi bi-facebook"></i></a>
            <a href="https://www.instagram.com/vetcoreplus/"><i class="bi bi-instagram"></i></a>
            <a href="https://vetcoreplus.com/" target="_blank"><i class="bi bi-globe"></i></a>
          </div>
        </div>

      </div>
    </div>

    <div class="container copyright text-center mt-4">
      <p>© <span>Copyright</span> <strong class="px-1 sitename">VetCore Plus</strong> <span>All Rights Reserved</span></p>
      <div class="credits">
        <!-- All the links in the footer should remain intact. -->
        <!-- You can delete the links only if you've purchased the pro version. -->
        <!-- Licensing information: https://bootstrapmade.com/license/ -->
        <!-- Purchase the pro version with working PHP/AJAX contact form: [buy-url] -->
        Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
      </div>
    </div>

  </footer>

  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{ asset('res/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('res/vendor/php-email-form/validate.js') }}"></script>
  <script src="{{ asset('res/vendor/aos/aos.js') }}"></script>
  <script src="{{ asset('res/vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('res/vendor/glightbox/js/glightbox.min.js') }}"></script>

  <!-- Main JS File -->
  <script src="{{ asset('res/js/main.js') }}"></script>

</body>

</html>