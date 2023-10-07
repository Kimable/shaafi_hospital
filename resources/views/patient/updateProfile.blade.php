<x-layout>
  <x-slot:title>
    Update Doctor Profile
    </x-slot>

    <!-- Add Doctor -->
    <div class="add-doctor form-container container py-5">
      <div class="row">
        <div class="col-3"></div>

        <div class="col-lg-6">
          @if ($errors->any())
            <div class="alert alert-danger">
              <p><strong>There were some problems with your input.</strong></p>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('update-profile.post', $user->id) }}" method="post">
            @csrf
            @method('put')

            <h3>Update Profile</h3>
            <div class="mb-3">
              <label class="form-label" for="first_name">First Name</label>
              <input type="text" class="form-control" name="first_name" id="first_name"
                value="{{ $user->first_name }}">
            </div>

            <div class="mb-3">
              <label class="form-label" for="last_name">Last Name</label>
              <input type="text" class="form-control" name="last_name" id="last_name" value="{{ $user->last_name }}">
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                required value="{{ $user->email }}">
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="text" class="form-control" name="phone" id="phone" required
                value="{{ $user->phone }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
          </form>
        </div>
      </div>
    </div>
</x-layout>
