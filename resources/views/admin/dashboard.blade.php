<x-layout>
  <x-slot:title>
    Admin Dashboard
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
        <p class="subtitle">Welcome, <span class="fw-bold">{{ $user->name }}</span></p>
      </div>
      <h2>Admin Dashboard</h2>

    </div>
    <div class="dashboard-items container my-2">
      <div class="item">
        <a href="/admin/manage-doctors">
          <p><i class="bi bi-person-badge"></i></p>
          <h5>Manage Doctors</h5>
        </a>
      </div>

      <div class="item">
        <a href="/admin/add-doctor">
          <p><i class="bi bi-person-add"></i></p>
          <h5>Add Doctors</h5>
        </a>
      </div>

      <div class="item">
        <a href="/admin/manage-appointments">
          <p><i class="bi bi-calendar-date"></i></p>
          <h5>Manage Appointments <span class="message-notifications">{{ $appointments->count() }}</h5>
        </a>
      </div>

      <div class="item">
        <a href="/admin/messages">
          <p><i class="bi bi-chat"></i></p>
          <h5>Messages <span class="message-notifications">{{ $messages->count() }}</span>
          </h5>
        </a>
      </div>
    </div>

    <x-refresh />
</x-layout>
