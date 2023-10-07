<x-layout>
  <x-slot:title>
    Doctor Profile
    </x-slot>

    <div class="container my-5">

      <div class="row">
        <div class="col-3"></div>
        <div class="col-md-6">
          @if (session('success'))
            <p class="text-center fw-bolder p-3 bg-success-subtle text-success rounded-3">
              {{ session('success') }}</p>
          @endif

          <div class="doctor-profile-header">
            <h2 class="mb-3">Doctor Profile</h2>
            <img class="doctor-avatar" src="{{ asset('uploads/' . $doctor->avatar) }}" alt="{{ $doctor->first_name }}">

            <form class="my-2" action="{{ route('upload', $doctor->id) }}" method="post"
              enctype="multipart/form-data">
              @csrf
              <div class="mb-3">
                <input class="form-control" type="file" id="formFile" name="image" required>
                <button class="btn btn-primary mt-2" type="submit">Update Image</button>
              </div>
            </form>

          </div>

          <div class="card doctor-profile">

            <div class="card-body">

              <h5 class="fw-bold">Name: <span class="tertiary-color">Dr. {{ $doctor->first_name }}
                  {{ $doctor->last_name }}</span></h5>

              <hr>
              <p class="fw-bold">Email: <span class="tertiary-color">{{ $doctor->email }}</span></p>
              <p class="fw-bold">Phone: <span class="tertiary-color">{{ $doctor->phone }}</span></p>
              <p class="fw-bold">Specialty: <span class="tertiary-color">{{ $doctor->specialty }}</span></p>
              <p class="fw-bold">Qualifications: <span class="tertiary-color">{{ $doctor->qualifications }}</span>
              </p>
              <p class="fw-bold">Languages: <span class="tertiary-color">{{ $doctor->languages }}</span></p>
              <p class="fw-bold">Description: <span class="tertiary-color">{{ $doctor->description }}</span></p>
              <a href="/update-doctor-profile/{{ $doctor->id }}" class="btn btn-tertiary">Update Profile</a>
            </div>
          </div>
        </div>
      </div>

    </div>
</x-layout>
