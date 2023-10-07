<x-layout>
  <x-slot:title>
    Appointments
    </x-slot>

    <div class="container my-5">
      @if (count($appointments) === 0)
        <div class="my-3 text-center">
          <h2>No Appointments</h2>
          <p>You havent made any appointmets yet!</p>
        </div>
      @else
        <h2>Your Appointments</h2>
        <div class="table-responsive">
          <table class="table table-dark table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">Date</th>
                <th scope="col">Time</th>
                <th scope="col">Medical Issue</th>
                <th scope="col">View Appointement</th>
              </tr>
            </thead>
            @foreach ($appointments as $appointment)
              <tr>
                <td>{{ $appointment->date }}</td>
                <td>{{ $appointment->time }}</td>
                <td>{{ $appointment->inquiry }}</td>
                <td>
                  <a href="/user/appointment/{{ $appointment->id }}" class="btn btn-tertiary">View Appointment</a>
                </td>
              </tr>
            @endforeach
          </table>
        </div>
        <div class="my-2">
          <a href="/appointment" class="btn btn-primary">Book an Appointment</a>
        </div>
    </div>
    @endif
    </div>
</x-layout>
