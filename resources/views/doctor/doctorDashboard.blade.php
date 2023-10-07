<x-layout>
  <x-slot:title>
    Doctor Dashboard
    </x-slot>

    <div class="container mt-3">
      <div class="row">
        <div class="col-sm-10"></div>
        <div class="col-sm-2">
          <button id="refreshButton fw-bold" style="font-size: 12px;" class="btn tertiary-color">Refresh</button>
        </div>
      </div>
    </div>

    <div class="admin-dashboard container mb-3">
      <div class="utility">
        <p class="subtitle">Welcome, <span class="fw-bold">Dr. {{ $doctor->first_name }}</span></p>
      </div>
      <h2>Doctor Dashboard</h2>
    </div>

    <div class="dashboard-items container mb-5">

      <div class="item">
        <a href="/doctors/manage-appointments">
          <p><i class="bi bi-calendar-date"></i></p>
          <h5>Manage Appointments <span class="message-notifications">{{ count($appointments) }}</h5>
        </a>
      </div>

      <div class="item">
        <a href="/doctor-profile">
          <p><i class="bi bi-person-circle"></i></p>
          <h5>Profile</h5>
        </a>
      </div>
    </div>

    <script>
      const refreshButton = document.getElementById('refreshButton');

      refreshButton.addEventListener('click', function() {
        location.reload();
      });
    </script>
</x-layout>
