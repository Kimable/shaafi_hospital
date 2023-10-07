<x-layout>
  <x-slot:title>
    Home Page
    </x-slot>
    <!-- Hero Section -->
    <div class="he">
      <div id="myCarousel" class="carousel slide mb-6" data-bs-ride="carousel" data-bs-theme="light">
        <div class="carousel-indicators">
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true"
            aria-label="Slide 1"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="3" aria-label="Slide 4"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="4" aria-label="Slide 5"></button>
          <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="5" aria-label="Slide 6"></button>
        </div>
        <div class="carousel-inner">

          <div class="carousel-item active">
            <img src="img/hospital-bed-sm.jpg" width="100%" height="100%">
            <div class="container">
              <div class="carousel-caption text-center">
                <h5 class="subtitle fw-bolder">{{ __('Your Health, Our Priority') }}</h5>
                <h1 class="fw-bolder">{{ __('Leaders in Medical Execellence') }}</h1>
                <p class="opacity-75">
                  {{ __('At Shaafi Hospital, we are committed to providing exceptional healthcare services to our community.') }}
                </p>
                <p><a class="btn btn-lg btn-primary" href="/about">{{ __('Learn More') }}</a></p>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <img src="img/shaafi-mobile-app-sample-min.png" width="100%" height="100%">
            <div class="container">
              <div class="carousel-caption">
                <h1 class="fw-bolder">{{ __('Book an appointment with our App') }}</h1>
                <p>
                  {{ __('You can manage your appointments and your profile easily using our app. It will be available soon on google playstore and Apple app store') }}
                </p>
                <p><a class="btn btn-lg btn-primary" href="/contact">{{ __('Join The Waiting List') }}</a></p>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <img src="img/stethoscope-sm.jpg" width="100%" height="100%">
            <div class="container">
              <div class="carousel-caption text-center">
                <h1 class="fw-bolder"> {{ __('We are Commitment to You') }}</h1>
                <p>{{ __('Get to know us a little better and how we value making sure your health is our priority.') }}
                </p>
                <p><a class="btn btn-lg btn-primary" href="/our-story">{{ __('Learn More') }}</a></p>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <img src="img/ambulance.jpg" width="100%" height="100%">
            <div class="container">
              <div class="carousel-caption text-center">
                <h1 class="fw-bolder"> {{ __('For Emergency, Talk to Us Immediately') }}</h1>
                <p>{{ __('Call us any time and we will be ready to come to your aid.') }}</p>
                <p><a class="btn btn-lg btn-primary" href="tel:+252 612877778">
                    <i class="bi bi-telephone-inbound"></i> +252 612877778</a></p>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <img src="img/appointment.jpg" width="100%" height="100%">
            <div class="container">
              <div class="carousel-caption text-center">
                <h1 class="fw-bolder">{{ __('Book an Appointment Today') }}</h1>
                <p>{{ __('Email us: info@shaafihospital.so or call us: +252 612877778') }}</p>
                <p><a class="btn btn-lg btn-primary" href="/appointment">
                    {{ __('Book An Appointment') }}</a></p>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <img src="img/doctor.png" width="100%" height="100%">
            <div class="container">
              <div class="carousel-caption text-center">
                <h1 class="fw-bolder">{{ __('Meet our Doctors') }}</h1>
                <p>{{ __('Get to know our exceptional doctors, who take your health matters seriously.') }}</p>
                <p><a class="btn btn-lg btn-primary" href="/doctors">
                    {{ __('Our Doctors') }}</a></p>
              </div>
            </div>
          </div>

        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="visually-hidden">Next</span>
        </button>
      </div>
    </div>
    <!-- Hero Section End -->

    <!-- Search Filter -->
    <x-search-filter :$doctors />

    <!-- Doctors -->
    <div class="doctors-section py-5">
      <div class="container">
        <div class="text-center row">
          <div class="col-2"></div>
          <div class="col-md-8">
            <p class="subtitle text-center">{{ __('We genuinely care') }}</p>
            <h2 class="mb-2 fw-bolder text-primary text-center">{{ __('Meet Our Doctors') }}</h2>
            <p class="mb-4">
              {{ __('We are constantly adding new doctors with various expertise to make sure you always get quality healthcare.') }}
            </p>
          </div>
          <!-- Doctors Component -->
          <x-doctor :$doctors />
          <div class="text-center">
            <a href="/doctors" class="btn btn-primary">{{ __('Load More Doctors') }}</a>
          </div>
        </div>
      </div>
    </div>

    <x-pop-up />

    <div class="container">
      <div class="row">
        <div class="col-2"></div>
        <div class="col-md-8 d-flex justify-content-center align-items-center flex-column my-5">
          <p class="text-uppercase subtitle fw-bolder">{{ __('Welcome to Shaafi hospital') }}</p>
          <h2 class="text-capitalize fw-bolder text-center text-primary">{{ __('A Great Place to receive Care') }}
          </h2>
          <p class="text-center">
            {{ __('At Shaafi Hospital, we are committed to providing exceptional healthcare services to our community. With a dedicated team of highly skilled medical professionals, state-of-the-art facilities, and a patient-centered approach, we strive to deliver comprehensive and compassionate care to every individual who walks through our doors.') }}
          </p>
          <div class="icon"> <a class="link icon-link icon-link-hover" href="/about">{{ __('Learn More') }} <i
                class="bi bi-arrow-right"></i></a></div>

        </div>
        <div class="col-2"></div>
      </div>
    </div>

    <!-- --------Why Choose Us--------- -->
    <div class="mb-5 choose">
      <div class="container">
        <img src="img/doctor-sm.jpg" alt="">

        <div class="mt-5 d-flex flex-column align-items-center gap-2">
          <div class="row">
            <div class="col-2"></div>
            <div class="col-md-8">
              <p class="text-uppercase subtitle fw-bolder text-center">{{ __('Care you can believe in') }}</p>
              <h2 class="text-capitalize fw-bolder text-center text-primary">{{ __('Why Choose Us') }}</h2>
              <p class="text-center">
                {{ __('At Shaafi Hospital, your health and well-being are at the core of everything we do. We are here to provide exceptional medical care, promote wellness, and support you in achieving a healthier life.') }}
              </p>
            </div>
          </div>
        </div>

        <div class="choose-reason">
          <div class="row">
            <div class=" col-md-4">
              <div class="choose-item">
                <p class="choose-title fw-bolder">87+</p>
                <span class="choose-text fw-bold">{{ __('Beds') }}</span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="choose-item">
                <p class="choose-title  fw-bolder">40+</p>
                <span class="choose-text fw-bold">{{ __('Doctors') }}</span>
              </div>
            </div>
            <div class="col-md-4">
              <div class="choose-item">
                <p class="choose-title  fw-bolder">25+</p>
                <span class="choose-text fw-bold">{{ __('Specialists') }}</span>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6 mb-3 mb-sm-0">
            <div class="card">
              <div class="card-body">
                <!-- Icon -->
                <span class="icon-container">
                  <i class="bi bi-heart-pulse-fill icon-style"></i>
                </span>
                <h5 class="card-title fw-bolder">{{ __('Excellence in Healthcare') }}</h5>
                <p class="card-text">
                  {{ __('Our hospital is renowned for its commitment to excellence in healthcare. We have a team of experienced doctors, nurses, and support staff who work together to ensure the highest standards of medical care. From routine check-ups to complex surgeries, we are equipped to handle a wide range of medical conditions.') }}
                </p>
              </div>
            </div>
          </div>
          <div class="col-sm-6 mb-3">
            <div class="card">
              <div class="card-body">
                <!-- Icon -->
                <div class="icon-container">
                  <i class="bi bi-peace-fill icon-style"></i>
                </div>
                <h5 class="card-title fw-bolder">{{ __('Compassionate Approach') }}</h5>
                <p class="card-text">
                  {{ __("We understand that visiting a hospital can be a stressful experience. That's why our team is dedicated to creating a warm and supportive environment where patients feel heard, respected, and cared for. Our healthcare professionals are not just experts in their fields; they are also compassionate individuals who are committed to your well-being.") }}
                </p>
              </div>
            </div>
          </div>

          <div class="col-sm-6 mb-3">
            <div class="card">
              <div class="card-body">
                <!-- Icon -->
                <div class="icon-container">
                  <i class="bi bi-hospital-fill icon-style"></i>
                </div>
                <h5 class="card-title fw-bolder">{{ __('Advanced Facilities') }}</h5>
                <p class="card-text">
                  {{ __("We understand that the right infrastructure plays a crucial role in delivering quality healthcare. That's why we have invested in advanced medical equipment and cutting-edge technology to support accurate diagnosis, effective treatments, and minimally invasive procedures. Our facilities are designed to provide a comfortable and healing environment for our patients.") }}
                </p>
              </div>
            </div>
          </div>

          <div class="col-sm-6 mb-3">
            <div class="card">
              <div class="card-body">
                <!-- Icon -->
                <div class="icon-container">
                  <i class="bi bi-lungs-fill icon-style"></i>
                </div>
                <h5 class="card-title fw-bolder">{{ __('Comprehensive Services') }}s</h5>
                <p class="card-text">
                  {{ __('Shaafi Hospital offers a comprehensive range of medical services to address all your healthcare needs. Whether you require emergency care, specialized treatment, or preventive health screenings, our multidisciplinary team is here to provide personalized and evidence-based care. We prioritize patient education and empower individuals to make informed decisions about their health') }}
                </p>
              </div>
            </div>
          </div>

          <div class="col-sm-6">
            <div class="card">
              <div class="card-body">
                <!-- Icon -->
                <div class="icon-container">
                  <i class="bi bi-postcard-heart-fill icon-style"></i>
                </div>
                <h5 class="card-title fw-bolder">{{ __('Community Engagement') }}</h5>
                <p class="card-text">
                  {{ __('As a community hospital, we actively engage with our local community through health awareness programs, educational workshops, and preventive care initiatives. We believe in fostering long-lasting relationships with our patients and being a trusted partner in their healthcare journey.') }}
                </p>
              </div>
            </div>
          </div>

        </div>
      </div>

    </div>

    <!-- Services -->
    <div class="services container my-5">

      <div class="row d-flex align-items-center">

        <div class="col-lg-5 d-flex align-items-center">
          <div class="services-intro">

            <p class="subtitle fw-bolder">{{ __('Our Services') }}</p>
            <h2 class="fw-bolder">{{ __('Services You Can Trust') }}</h2>
            <img src="img/stethoscope.jpg" alt="">
            <p>
              {{ __('At Shaafi Hospital, we offer a wide range of services designed to address all your healthcare needs. Our dedicated team of medical professionals and state-of-the-art facilities are equipped to provide exceptional care across various specialties and disciplines.') }}
            </p>
            <a href="/services" class="btn btn-primary my-2">{{ __('Learn More') }}</a>
          </div>
        </div>

        <div class="col-lg-3">
          <p class="service-item">{{ __('Primary care') }}</p>
          <p class="service-item">{{ __('Specialty care') }}</p>
          <p class="service-item">{{ __('Surgical Services') }}</p>
          <p class="service-item">{{ __('Diagnostic Imaging') }}</p>

        </div>

        <div class="col-lg-4">
          <p class="service-item">{{ __('Rehabilitation and Therapy') }}</p>
          <p class="service-item">{{ __("Maternity and Women's Health") }}</p>
          <p class="service-item">{{ __('Wellness and Preventive Care') }}</p>
        </div>

      </div>
    </div>
    <!-- Appointment -->
    <div class="doctors-section py-5 container">
      <div class="row">
        <div class="col-2"></div>
        <div class="col-md-8 d-flex justify-content-center align-items-center flex-column">
          <p class="subtitle">{{ __('Always here for you') }}</p>
          <h2 class="mb-3 tex-primary">{{ __('Book An Appointment') }}</h2>
          <p class="text-center">
            {{ __('Please schedule your appointments online, you can visit our website and use our secure online appointment booking system. Simply visit shaafihospital.so and follow the easy steps to book your appointment at your preferred date and time.') }}.
          </p>
          <a href="/appointment" class="btn btn-primary">{{ __('Book Appointment') }}</a>
        </div>

      </div>
    </div>

    <!-- Contact Footer -->
    <x-contact-footer />
</x-layout>

