<x-layout>
  <x-slot:title>
    Profile
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
            <h2 class="mb-3">Your Profile</h2>
            <img class="user-avatar" src="{{ asset('uploads/' . $user->avatar) }}" alt="{{ $user->first_name }}">

            <form class="mx-2" action="{{ route('upload', $user->id) }}" method="post" enctype="multipart/form-data">
              @csrf
              <div>
                <input class="form-control" type="file" id="fileInput" name="image" required>
                <button class="btn btn-primary mt-1 mb-3 btn-sm" type="submit">Update Image</button>
              </div>
            </form>

          </div>

          <div class="card doctor-profile">

            <div class="card-body">

              <h5 class="fw-bold">Full Name: <span class="tertiary-color">{{ $user->first_name }}
                  {{ $user->last_name }}</span></h5>

              <hr>
              <p class="fw-bold">Email: <span class="tertiary-color">{{ $user->email }}</span></p>
              <p class="fw-bold">Phone: <span class="tertiary-color">{{ $user->phone }}</span></p>
              <a href="/update-profile/{{ $user->id }}" class="btn btn-tertiary">Update Profile</a>
            </div>
          </div>
        </div>
      </div>

    </div>
</x-layout>
