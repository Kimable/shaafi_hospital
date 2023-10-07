<x-layout>
  <x-slot:title>
    Talk to A Doctor
    </x-slot>

    <div class="contact">
      <div class="hero">
        <div class="container text-center">
          <p class="subtitle">Always Here to Listen</p>
          <h1 class="fw-bolder">Talk To A Doctor</h1>
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
          <form action="{{ route('user/talk.post') }}" method="post">
            @csrf
            <h3>Send A Message</h3>
            <div class="mb-3">
              <label class="form-label" for="doctor">Select Doctor</label>
              <select name="doctor" class="form-select" id="doctor">
                <option value="">--Select Doctor--</option>
                @foreach ($doctors as $doctor)
                  <option value="{{ $doctor->id }}">{{ $doctor->first_name }} ({{ $doctor->specialty }})</option>
                @endforeach
              </select>
            </div>
            <div class="mb-3">
              <label for="title" class="form-label">Message Title</label>
              <input type="text" name="msgTitle" class="form-control" id="title">
            </div>
            <div class="mb-3">
              <label for="message" class="form-label">Message</label>
              <textarea class="form-control" name="message" placeholder="Leave your message here" id="message" style="height: 100px"
                required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Send Message</button>
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
