<x-layout>
  <x-slot:title>
    Manage Doctors
    </x-slot>

    <div class="container my-5">
      @if (session('success'))
        <p class="text-center fw-bolder p-3 bg-success-subtle text-success rounded-3">
          {{ session('success') }}</p>
      @endif
      <h2 class="mb-3">Manage Doctors</h2>
      <div class="table-responsive">
        <table class="table table-dark table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">First Name</th>
              <th scope="col">Email</th>
              <th scope="col">Specialty</th>
              <th scope="col">View Doctor</th>
              <th scope="col">Edit Doctor</th>
              <th scope="col">Delete Doctor</th>
            </tr>
          </thead>

          @foreach ($doctors as $doctor)
            <tr>
              <th>Dr. {{ $doctor->first_name }}</th>
              <td>{{ $doctor->email }}</td>
              <td>{{ $doctor->specialty }}</td>
              <td><a href="/doctor/{{ $doctor->id }}" class="btn btn-tertiary">View</a></td>
              <td><a href="/admin/edit-doctor/{{ $doctor->id }}" class="btn btn-tertiary">Edit</a></td>
              <td>
                <a href="/admin/delete-doctor/{{ $doctor->id }}" class="btn text-danger">Delete</a>
              </td>
            </tr>
          @endforeach
        </table>
      </div>
      <div class="my-2">
        <a href="/admin/add-doctor" class="btn btn-primary">Add A Doctor</a>
      </div>
    </div>
</x-layout>
