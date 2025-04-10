<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        crossorigin="anonymous" />

    <!-- FontAwesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" />

    <!-- Boxicons -->
    <link href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css" rel="stylesheet" />

    <!-- Main Stylesheet -->
    <link rel="stylesheet" href="{{ asset('theme_asset/home/css/home.css') }}" />

    <!-- Main CSS File -->
    <link href="{{ asset('res/css/main.css') }}" rel="stylesheet">


    <!-- Favicons -->
    <link href="{{ asset('res/img/favicon.png') }}" rel="icon">
    <link href="{{ asset('res/img/apple-touch-icon.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset('res/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('res/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('res/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('res/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">
    <link href="{{ asset('res/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <!-- Title -->
    <title>{{ $title ?? 'VetCore Plus' }}</title>
    @livewireStyles
</head>


<body>

    <header id="header">
        <div class="container">
            <div class="nav-bar">
                @php $categories = App\Models\Category::all(); @endphp

                <nav class="navmenus d-flex justify-content-between w-100">
                    <div>
                        <div class="nav-links">
                            <a href="{{ url('/') }}"  class="h4">Home</a>


                            <!-- Categories as Individual Links -->
                            @foreach ($categories as $category)
                                <a href="{{ route('category.show', $category->id) }}"  class="h4">{{ $category->name }}</a>
                            @endforeach

                            <!-- Auth Links -->
                            @auth
                                <a href="{{ route('cart') }}" class="h4">Cart</a>
                                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                                    @csrf
                                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();"
                                        class="logout-link h4">
                                        Logout
                                    </a>
                                </form>
                            @else
                                <a href="{{ route('login') }} "  class="h4">Login</a>
                            @endauth
                        </div>

                        <!-- Mobile Menu Toggle -->
                        <div class="nav-toggler">
                            <i class="bx bx-menu-alt-right"></i>
                        </div>
                    </div>

                    <a href=" {{ route('profile.edit') }}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                    </a>
                </nav>
            </div>
        </div>
    </header>




    <!-- Main Content (Dynamic Slot) -->
    <div id="content" class="container py-5">
        {{ $slot }}
    </div>



    <!-- Footer -->

    <footer id="footer" class="footer bg-white">
        <style>
          #footer {
            color: black;
          }
          
          #footer a {
            color: black;
          }
      
          #footer .footer-contact p,
          #footer .footer-links a,
          #footer .social-links a {
            color: black;
          }
      
          #footer .copyright p {
            color: black;
          }
        </style>
      
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
                <p>Camella Springville Heights Phase 3, Bacoor, Cavite, South Luzon</p>
                <p>Landmark: Casa Veronica</p>
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
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      
      </footer>
      



    <div class="backdrop-filter"></div>

    <!-- JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        // Enable smooth scrolling for anchor links
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener("click", function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute("href"));
                if (target) {
                    target.scrollIntoView({
                        behavior: "smooth"
                    });
                }
            });
        });
    </script>




    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('theme_asset/home/js/home.js') }}"></script>
    @livewireScripts
