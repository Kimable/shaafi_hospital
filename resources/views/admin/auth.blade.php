<x-layout>
  <x-slot:title>
    User Dashboard
    </x-slot>

    <div class="container py-5 text-center">
      <h2 style="color: red;" class="fw-bolder">Unauthorized!</h2>
      <p>You must be logged in to view this page!</p>
      <a href="/admin/login" class="btn btn-primary">Login</a>
    </div>
</x-layout>
