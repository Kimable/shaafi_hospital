<x-layout>
  <x-slot:title>
    Dashboard
    </x-slot>

    <div class="container my-3 text-center">
      <h2>Dashboard</h2>
    </div>

    <div class="patient-dashboard-container container my-3">

      <div class="patient-dashboard text-center">
        <div>
          @if ($user->avatar === null)
            <img class="user-avatar" src="{{ asset('img/avatar-min.jpg') }}" alt="User avatar">
          @else
            <img class="user-avatar" src="{{ asset('uploads/' . $user->avatar) }}" alt="{{ $user->first_name }}">
          @endif
        </div>
        <div>
          <h5>Hello <span class="fw-bold">{{ $user->first_name }}</span>, How are you feeling today?</h5>
        </div>
      </div>
    </div>
    <div class="dashboard-items container my-2">
      <div class="item">
        <a href="/profile">
          <p><i class="bi bi-person-badge"></i></p>
          <h5>Manage Profile</h5>
        </a>
      </div>

      <div class="item">
        <a href="/appointments">
          <p><i class="bi bi-person-add"></i></p>
          <h5>Your Appointmets</h5>
        </a>
      </div>

      <div class="item">
        <a href="/user/talk">
          <p><i class="bi bi-calendar-date"></i></p>
          <h5>Talk to a Doctor</h5>
        </a>
      </div>

    </div>
</x-layout>
