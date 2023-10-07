<x-layout>
  <x-slot:title>
    Doctors
    </x-slot>
    <div class="doctors">
      <div class="hero">
        <div class="container text-center">
          <div class="row">
            <div class="col-2"></div>
            <div class="col-md-8">
              <p class="subtitle text-center">We genuinely care</p>
              <h1 class="mb-2 fw-bolder">Meet Our Doctors</h1>
              <p class="mb-4">We are constantly adding new doctors with various expertise to make sure you always get
                quality healthcare.
              </p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Show Doctors -->
    <div class="container py-5">
      <div class="not-added">
        @if (count($doctors) <= 0)
          <div class="container p-5 d-flex flex-column justify-content-center align-items-center">
            <h2 class="fw-bolder">Doctors are yet to be Added</h2>
            <p>Doctors have not been added yet. Please try again later</p>
          </div>
        @endif
      </div>
      <div class="doc-container">
        <div class="row">
          @foreach ($doctors as $doctor)
            <div class="col-md-4">
              <div class="card doctor">
                <img src="{{ asset('uploads/' . $doctor->avatar) }}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title fw-bold">Dr. {{ $doctor->first_name }} {{ $doctor->last_name }}</h5>
                  <p class="card-text">{{ $doctor->specialty }}</p>

                </div>
                <div class="card-footer text-center">
                  <a href="/doctor/{{ $doctor->id }}" class="btn fw-bold">View Profile</a>
                </div>
              </div>

            </div>
          @endforeach
        </div>
      </div>
    </div>
    </div>

    <!-- Contact Footer -->
    <x-contact-footer />
</x-layout>
