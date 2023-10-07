<x-layout>
  <x-slot:title>
    User Dashboard
    </x-slot>

    <div class="admin-dashboard container my-3">
      <div class="utility">
        <p class="subtitle">Welcome, <span class="fw-bold">{{ $user->name }}</span></p>
        <button id="refreshButton" class="btn tertiary-color">Refresh Page</button>
      </div>

      <h2>More Features will be added soon</h2>
      <p>Hello, This is user dashboard</p>
    </div>

    <x-refresh />
</x-layout>
