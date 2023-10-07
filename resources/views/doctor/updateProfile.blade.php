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
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('update-doctor-profile.post', $doctor->id) }}" method="post">
            @csrf
            @method('put')

            <h3>Update Profile</h3>
            <div class="mb-3">
              <label class="form-label" for="first_name">First Name</label>
              <input type="text" class="form-control" name="first_name" id="first_name"
                value="{{ $doctor->first_name }}">
            </div>

            <div class="mb-3">
              <label class="form-label" for="last_name">Last Name</label>
              <input type="text" class="form-control" name="last_name" id="last_name"
                value="{{ $doctor->last_name }}">
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                required value="{{ $doctor->email }}">
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="text" class="form-control" name="phone" id="phone" required
                value="{{ $doctor->phone }}">
            </div>

            <div class="mb-3">
              <label for="specialty" class="form-label">Specialty</label>
              <input type="text" name="specialty" class="form-control" id="specialty"
                value="{{ $doctor->specialty }}">
            </div>

            <div class="mb-3">
              <label for="qualifications" class="form-label">Qualifications</label>
              <input type="text" name="qualifications" class="form-control" id="qualifications"
                value="{{ $doctor->qualifications }}">
            </div>

            <div class="mb-3">
              <label for="languages" class="form-label">Languages</label>
              <input type="text" name="languages" class="form-control" id="languages"
                value="{{ $doctor->languages }}">
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" name="description" placeholder="Doctor Description" id="description"
                style="height: 100px" value="{{ $doctor->description }}"></textarea>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Change Password</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>

            <button type="submit" class="btn btn-primary">Update Profile</button>
          </form>
        </div>
      </div>
    </div>
</x-layout>
