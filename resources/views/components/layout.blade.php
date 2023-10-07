<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Favicons -->

  <link rel="icon" type="image/png" href="{{ url('favicon/android-icon-192x192.png') }}">
  <!-- Favicons end -->
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

  <!-- Google fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Montaga&family=Work+Sans&display=swap" rel="stylesheet">
  <!-- Bootstrap-icons -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

  <!-- Custom Css -->
  <link rel="stylesheet" href="{{ url('css/style.css') }}">
  <title>{{ $title . ' | Shaafi Hospital' ?? 'Shaafi Hospital' }}</title>

</head>

<body>

  <!-- Navbar -->
  <div class="nav-header">
    <div class="container d-flex justify-content-between align-items-center py-3">
      <div class="logo">
        <a class="navbar-brand" href="/">
          <img src="{{ url('img/shaafi-logo-text.png') }}" alt="Logo">
        </a>
      </div>
      <div class="emergency-contact">
        <p><span style="color: #ec1c24; font-weight: 700; "><i style="margin-right: 0.6rem;"
              class="bi bi-telephone-forward"></i>{{ __('Call Us 24/7') }}</span><a href="tel:+252612877778">
            +252 61 2877778</a></p>
      </div>
    </div>
  </div>

  <nav class="navbar navbar-expand-lg">
    <div class="container">
      <div class="logo">
        <a class="navbar-brand" href="/">
          <img src="{{ url('img/shaafi-logo-text.png') }}" alt="Logo">
        </a>
      </div>
      <button class="navbar-toggler shadow-none border-0" type="button" data-bs-toggle="offcanvas"
        data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="sidebar offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar"
        aria-labelledby="offcanvasNavbarLabel">
        <div class="offcanvas-header">
          <div id="offcanvasNavbarLabel" class="navbar-logo">
            <img src="img/logo-shaafi.png" alt="">
          </div>
          <button type="button" class="btn-close btn-close-white shadow-none border-0" data-bs-dismiss="offcanvas"
            aria-label="Close"></button>
        </div>
        <div class="offcanvas-body">

          @if (auth()->guard('doctor')->check())
            <ul class="navbar-nav justify-content-center align-items-center flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/doctor-profile">Profile</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/doctor-dashboard">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/doctors/manage-appointments">Appointments</a>
              </li>
            </ul>
            <div class="d-flex flex-column">
              <a class="appointment-btn" href="/doctors/logout">Logout</a>
            </div>
          @elseif(auth()->guard('admin')->check())
            <ul class="navbar-nav justify-content-center align-items-center flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/admin/dashboard">Dashboard</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/admin/manage-doctors">Manage Doctors</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/admin/add-doctor">Add Doctor</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/admin/messages">Messages</a>
              </li>
            </ul>
            <div class="d-flex flex-column">
              <a class="appointment-btn" href="/logout">Logout</a>
            </div>
          @else
            <ul class="navbar-nav justify-content-center align-items-center">
              <li class="nav-item">
                <a class="nav-link" aria-current="page" href="/">{{ __('Home') }}</a>
              </li>
              <!-- About Dropdown -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  {{ __('About') }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/about">{{ __('About Us') }}</a></li>
                  <li><a class="dropdown-item" href="/our-story">{{ __('Our Story') }}</a></li>
                  <li><a class="dropdown-item" href="/development">{{ __('Awards and Accredation') }}</a></li>
                </ul>
              </li>
              <!-- Clinical Services Dropdown -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  {{ __('Clinical Services') }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li class="nav-item">
                    <a class="dropdown-item" aria-current="page" href="/services">{{ __('General Services') }}</a>
                  </li>

                  <li class="nav-item dropend">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      {{ __('Center of Excellence') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/development">{{ __('Heart Center') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Oncology Center') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Research Center') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Lifestyle Center') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Renal & Care Center') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Dental Care Center') }}</a></li>
                    </ul>
                  </li>

                  <li class="nav-item dropend">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      {{ __('Specialties & Categories') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/development">{{ __('Brain') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Cancer') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Bone and Joint') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Eye') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('General Surgery') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Internal Medicine') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Intervention Radiology') }}</a></li>
                    </ul>
                  </li>

                  <li class="nav-item dropend">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      {{ __('Multidisciplinary Team') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/development">{{ __('Lung Cancer') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Bone and Soft Tissues') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Breast Cancer') }}</a></li>
                    </ul>
                  </li>

                  <li class="nav-item dropend">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      {{ __('Anciliary Services') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/development">{{ __('Physiotherapy') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Laboratory & Blood Bank') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Diabetic Services') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Clinical Research Services') }}</a>
                      </li>
                      <li><a class="dropdown-item" href="/development">{{ __('Pharmacy') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Speech-language Therapy') }}</a></li>
                    </ul>
                  </li>

                  <li class="nav-item dropend">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      {{ __('Medical Check Up') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item" href="/development">{{ __('Vaccination') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Wellness Check Up') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Screening') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Lifestyle') }}</a></li>
                    </ul>
                  </li>

                </ul>
              </li>
              <!-- End Clinical Services Dropdown -->

              <!-- Community Services Dropdown -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  {{ __('Community Services') }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/development">{{ __('Community') }}</a></li>
                  <li><a class="dropdown-item" href="/development">{{ __('Charity') }}</a></li>
                  <li><a class="dropdown-item" href="/development">{{ __('Support Group') }}</a></li>
                  <li class="nav-item dropend">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                      data-bs-toggle="dropdown" aria-expanded="false">
                      {{ __('Training & Classes') }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                      <li><a class="dropdown-item"
                          href="/life-support-training">{{ __('Life Support Training') }}</a></li>
                      <li><a class="dropdown-item" href="/development">{{ __('Pre-natal Classes') }}</a></li>
                    </ul>
                  </li>

                </ul>
              </li>
              <!-- End Community Services Dropdown -->

              <li class="nav-item">
                <a class="nav-link" href="/patient-guide">{{ __('Patient Guide') }}</a>
              </li>
              <!--
              <li class="nav-item">
                <a class="nav-link" href="/doctors">Doctors</a>
              </li> -->

              <li class="nav-item">
                <a href="/appointment" class="nav-link">{{ __('Appointment') }}</a>
              </li>
              <!-- Get In Touch -->
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  {{ __('Get In Touch') }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  <li><a class="dropdown-item" href="/contact">{{ __('Contact Us') }}</a></li>
                  <li><a class="dropdown-item" href="/development">{{ __('Careers') }}</a></li>
                  <li><a class="dropdown-item" href="/development">{{ __('Volunteer Opportunity') }}</a></li>
                </ul>
              </li>
              <!-- End Get In Touch -->

              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                  data-bs-toggle="dropdown" aria-expanded="false">
                  {{ __('Language') }}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                  @foreach (config('app.locales') as $locale => $language)
                    <a class="dropdown-item" href="{{ route('setLocale', $locale) }}">{{ $language }}</a>
                  @endforeach
                </ul>
              </li>

            </ul>
          @endif
        </div>
      </div>
    </div>
  </nav>
  <!-- Navbar End -->

  <!-- Content -->
  {{ $slot }}
  <!-- Content End -->

  <!-- Footer -->
  <div class="footer">
    <footer class="container py-5">
      <div class="row">
        <div class="col-6 col-md-3 mb-3">
          <img src="{{ url('img/shaafi-logo-text.png') }}" alt="Logo">
          <p class="mt-3">{{ __('Leading the Way in Medical Excellence and Trusted Care.') }}</p>
        </div>

        <div class="col-6 col-md-2 mb-3">
          <h5>{{ __('Explore') }}</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><a href="/appointment" class="nav-link p-0">{{ __('Appointment') }}</a></li>
            <li class="nav-item mb-2"><a href="/services" class="nav-link p-0">{{ __('Services') }}</a></li>
            <li class="nav-item mb-2"><a href="/doctors" class="nav-link p-0">{{ __('Doctors') }}</a></li>
            <li class="nav-item mb-2"><a href="/about" class="nav-link p-0">{{ __('About Us') }}</a></li>
          </ul>
        </div>

        <div class="contact col-6 col-md-2 mb-3">
          <h5> {{ __('Contact Us') }}</h5>
          <ul class="nav flex-column">
            <li class="nav-item mb-2"><span><i class="bi bi-telephone-forward"></i> {{ __('Call Us') }}</span><a
                href="tel:+252612877778" class="nav-link p-0"> +252 61 2877778</a></li>
            <li class="nav-item mb-2"><span><i class="bi bi-envelope"></i> {{ __('Email') }}</span> <a
                href="mailto:info@shaafihospital.so" class="nav-link p-0">info@shaafihospital.so</a></li>
            <li class="nav-item mb-2"><span><i class="bi bi-geo-alt"></i> {{ __('Visit Us') }}</span><a
                href="#" class="nav-link p-0">
                {{ __('Dagmada Hodon Mogadishu Banaadir, Somalia') }}</a></li>
          </ul>
        </div>

        <!-- Newsletter -->
        <div class="col-md-4 offset-md-1 mb-3">
          <form>
            <h5> {{ __('Subscribe to our newsletter') }}</h5>
            <p> {{ __("Monthly digest of what's new and exciting from us.") }}</p>
            <div class="d-flex flex-column flex-sm-row w-100 gap-2">
              <label for="newsletter1" class="visually-hidden"> {{ __('Email address') }}</label>
              <input id="newsletter1" type="text" class="form-control" placeholder="Email address">
              <button class="btn btn-primary" type="button"> {{ __('Subscribe') }}</button>
            </div>
          </form>
        </div>
      </div>

      <div class="social d-flex flex-column flex-sm-row justify-content-between py-4 my-4 border-top">
        <p>&copy; <span class="year"></span> {{ __('Shaafi Hospital. All rights reserved.') }}</p>
        <ul class="list-unstyled d-flex">
          <li class="ms-3"><a class="link-body-emphasis" href="https://wa.me/+252612877778"><i
                class="bi bi-whatsapp"></i></a></li>
          <li class="ms-3"><a class="link-body-emphasis" href="https://www.facebook.com/IsbitaalkaShaafi/"><i
                class="bi bi-facebook"></i></a></li>
        </ul>
      </div>
    </footer>

  </div>
  <!-- Footer End-->
  <!-- .Sticky Navbar bottom -->
  <div class="bottom-nav">
    <div class="container">
      <div class="fixed-bottom d-flex justify-content-center align-items-center">
        <div class="item">
          <a href="/appointment"><i class="bi bi-calendar-check"></i></a>
          <a class="link-text" href="/appointment">Appointment</a>
        </div>
        <div class="item">
          <a href="/doctors"><i class="bi bi-person-badge"></i></a>
          <a class="link-text" href="/doctors">Find Doctor</a>
        </div>
        <div class="item">
          <a href="/contact"><i class="bi bi-hospital"></i></a>
          <a class="link-text" href="/contact">Emergency</a>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  <script>
    const year = document.querySelector('.year');
    const dateObj = new Date().getFullYear();
    year.textContent = dateObj;
  </script>
</body>

</html>
