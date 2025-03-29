<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Bootstrap -->
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    rel="stylesheet"
    crossorigin="anonymous"
  />

  <!-- FontAwesome -->
  <link
    rel="stylesheet"
    href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
  />

  <!-- Boxicons -->
  <link
    href="https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css"
    rel="stylesheet"
  />

  <!-- Main Stylesheet -->
  <link rel="stylesheet" href="{{asset('theme_asset/home/css/home.css')}}" />
 


  <!-- Title -->
  <title>{{$title ?? "VetCore Plus"}}</title>
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
                <a href="{{ route('products.browse') }}">Home</a>
      
                <!-- Categories as Individual Links -->
                @foreach ($categories as $category)
                  <a href="{{ route('category.show', $category->id) }}">{{ $category->name }}</a>
                @endforeach
      
                <!-- Auth Links -->
                @auth
                  <a href="{{ route('cart') }}">Cart</a>
                  <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <a href="#" onclick="event.preventDefault(); this.closest('form').submit();" class="logout-link">
                      Logout
                    </a>
                  </form>
                @else
                  <a href="{{ route('login') }}">Login</a>
                @endauth
              </div>
      
              <!-- Mobile Menu Toggle -->
              <div class="nav-toggler">
                <i class="bx bx-menu-alt-right"></i>
              </div>
            </div>

            <a href=" {{ route('profile.edit')}}">
              <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0"/>
                <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1"/>
              </svg>
            </a>
          </nav>
        </div>
      </div>
    </header>
    
    

   
<!-- Main Content (Dynamic Slot) -->
<div id="content" class="container py-5">
  {{$slot}}
</div>



<!-- Footer -->
<footer id="footer" style="background-color: #CC7722; padding: 50px 0; box-shadow: 0px -4px 10px rgba(0, 0, 0, 0.2); border-top: 4px solid #aa5e1d;">
  <div class="container text-white">
    <div class="row">
      
      <!-- Brand Info -->
      <div class="col-lg-6 mb-5 mb-lg-0">
        <a href="#!" class="logo">
          <img src="{{asset('theme_asset/home/img/logoss.png')}}" style="width: 220px;" alt="Vet Core Plus Logo">
        </a>
        <p class="footer-desc fs-5 fw-bold mt-3" style="line-height: 1.6; text-align: justify;">
          Vet Core Plus is a virtual retailer brand dedicated to pets in the Philippines!  
          Now, pet lovers all over the country can enjoy the 
          convenience of shopping at their fingertips.  
          Your pet deserves the very best the industry has to offer,
          and we are here to provide it for you—hassle-free!
        </p>
      </div>

      <!-- Categories -->
      <div class="col-lg-3 mb-5 mb-lg-0">
        <h2 class="title fs-4 fw-bold text-uppercase mb-3">Categories</h2>
        <ul class="footer-list list-unstyled">
          @foreach (isset($categories) ? $categories : [] as $category)
            <li class="fs-5 mb-2">
              <a class="text-white text-decoration-none" href="{{route('category.show', $category->id)}}">{{$category->name}}</a>
            </li>
          @endforeach
        </ul>
      </div>

      <!-- Legal Links -->
      <div class="col-lg-3 mb-5">
        <h2 class="title fs-4 fw-bold text-uppercase mb-3">Legals</h2>
        <ul class="footer-list list-unstyled">
          <li class="fs-5 mb-2"><a class="text-white text-decoration-none" href="#!">Contact</a></li>
          <li class="fs-5 mb-2"><a class="text-white text-decoration-none" href="#!">Privacy Policy</a></li>
          <li class="fs-5 mb-2"><a class="text-white text-decoration-none" href="#!">Cookie Policy</a></li>
          <li class="fs-5"><a class="text-white text-decoration-none" href="#!">Terms &amp; Conditions</a></li>
        </ul>
      </div>

    </div>
  </div>
</footer>

<div class="backdrop-filter"></div>

<!-- JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
  // Enable smooth scrolling for anchor links
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener("click", function (e) {
      e.preventDefault();
      const target = document.querySelector(this.getAttribute("href"));
      if (target) {
        target.scrollIntoView({ behavior: "smooth" });
      }
    });
  });
</script>




<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="{{asset('theme_asset/home/js/home.js')}}"></script>
@livewireScripts
