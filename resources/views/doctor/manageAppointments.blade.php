<x-layout>
  <x-slot:title>
    Manage Appointments
    </x-slot>
    @if (count($appointments) == 0)
      <div class="container p-5 d-flex flex-column justify-content-center align-items-center">
        <h2 class="fw-bolder">No Appointments</h2>
        <p>There are no appointments that have been made yet!</p>
      </div>
    @else
      <div class="container my-5">
        <h2>Manage Appointments</h2>
        <table class="table table-dark table-striped table-hover">
          <thead>
            <tr>
              <th scope="col">From</th>
              <th scope="col">Email</th>
              <th scope="col">Medical Issue</th>
              <th scope="col">View Appointment</th>
            </tr>
          </thead>

          @foreach ($appointments as $appointment)
            <tr>
              <th>{{ $appointment->full_name }}</th>
              <td>{{ $appointment->email }}</td>
              <td>{{ $appointment->inquiry }}</td>
              <td><a href="/doctors/appointment/{{ $appointment->id }}" class="btn btn-tertiary">View Appointment</a></td>
            </tr>
          @endforeach
        </table>
      </div>
    @endif
</x-layout>
