<x-layout>
  <x-slot:title>
    View Doctor
    </x-slot>
    <div class="my-5">
      <div class="container">
        @foreach ($doctor as $d)
          <div class="row">
            <div class="col-3"></div>
            <div class="col-md-6">

              <x-flash-messages />

              <h3 class="text-primary">Dr. {{ $d->first_name }} {{ $d->last_name }}</h3>
              <img class="doctor-avatar" src="{{ asset('uploads/' . $d->avatar) }}" width="300px"
                alt="Dr. {{ $d->first_name }}">

              <div class="doctor-details">
                <p>Specialty: <strong class="tertiary-color">{{ $d->specialty }}</strong></p>
                <p>Qualifications: <strong class="tertiary-color">{{ $d->qualifications }}</strong></p>
                <p>Email: <strong class="tertiary-color">{{ $d->email }}</strong></p>
                <p>Phone Number: <strong class="tertiary-color">{{ $d->phone }}</strong></p>
                <a href="/appointment/{{ $d->id }}" class="btn btn-primary">Book Appointment</a>
                <a href="/contact" class="btn btn-primary">Message Doctor</a>
              </div>
            </div>
          </div>
        @endforeach
      </div>
    </div>
</x-layout>
