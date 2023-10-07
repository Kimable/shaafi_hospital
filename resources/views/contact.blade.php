<x-layout>
  <x-slot:title>
    Contact Us
    </x-slot>

    <div class="contact">
      <div class="hero">
        <div class="container text-center">
          <p class="subtitle">{{ __('Get in touch') }}</p>
          <h1 class="fw-bolder">{{ __('Contact Us') }}</h1>
        </div>
      </div>
    </div>

    <div class="container contact-form py-5">
      <div class="row">
        <div class="col-3"></div>
        <div class="col-lg-6">
          @if (session('success'))
            <p class="text-center fw-bolder p-3 bg-success-subtle text-success rounded-3">
              {{ session('success') }}</p>
          @endif
          <form action="{{ route('contact') }}" method="post">
            @csrf
            <h3>{{ __('Leave a Message') }}</h3>
            <div class="mb-3">
              <label class="form-label" for="name">{{ __('Name') }}</label>
              <input type="text" class="form-control" name="name" id="name" required>

            </div>
            <div class="mb-3">
              <label for="email" class="form-label">{{ __('Email address') }}</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                required>
            </div>
            <div class="mb-3">
              <label for="title" class="form-label">{{ __('Message Title') }}</label>
              <input type="text" name="msgTitle" class="form-control" id="title">
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">{{ __('Message') }}</label>
              <textarea class="form-control" name="message" id="message" style="height: 100px" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">{{ __('Send Message') }}</button>
          </form>
        </div>
      </div>
    </div>

    <!-- Maps Section -->
    <div class="container">
      <a href="https://goo.gl/maps/Vj1LAxZQRNiBFrYY6">
        <img src="img/shaafi-address.png" class="img-fluid" alt="">
      </a>
    </div>
    <!-- Contact Footer -->
    <x-contact-footer />
</x-layout>
