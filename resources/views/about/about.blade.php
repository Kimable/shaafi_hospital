<x-layout>
  <x-slot:title>
    About Page
    </x-slot>

    <div class="about">
      <div class="hero">
        <div class="container text-center">
          <p class="subtitle">{{ __('Providing Exceptional Care') }}</p>
          <h1 class="fw-bolder">{{ __('About Us') }}</h1>
        </div>
      </div>
      <div class="content container my-5">
        <div class="row my-5">
          <div class="col-lg-5">
            <img src="img/covid-19-sm.jpg" alt="" class="img-fluid">
          </div>
          <div class="col-lg-7 d-flex flex-column">
            <h2 class="text-primary py-2">{{ __('Who We Are') }}</h2>
            <p>
              {{ __('At Shaafi Hospital, we are proud to be a leading healthcare institution dedicated to serving our community with integrity, compassion, and excellence. With a rich history spanning over 7 years, our hospital has evolved into a trusted healthcare provider known for its commitment to delivering exceptional care and empowering individuals to live healthier, happier lives.') }}
            </p>
          </div>
        </div>

        <div class="mission-container row">
          <div class="col-2"></div>
          <div class="col-md-8">
            <h3 class="fw-bolder">{{ __('Our Mission') }}</h3>
            <p>
              {{ __('Our mission is to provide comprehensive, patient-centered healthcare services of the highest quality, while fostering a culture of innovation, education, and community engagement. We strive to be at the forefront of medical advancements, ensuring that our patients receive the most advanced treatments and therapies available.') }}
            </p>
            <h3 class="fw-bolder">{{ __('Our Commitment to Excellence') }}</h3>
            <p>
              {{ __('Excellence is at the heart of everything we do. We continually invest in our medical staff, technologies, and facilities to ensure that we maintain the highest standards of healthcare delivery. Our team of highly skilled physicians, nurses, technicians, and support staff are committed to providing personalized care that meets the unique needs of each patient.') }}
            </p>
          </div>
        </div>
        <!-- Doctor List -->
        <x-doctor :$doctors />
      </div>

    </div>

    <!-- Contact Footer -->
    <x-contact-footer />
</x-layout>
