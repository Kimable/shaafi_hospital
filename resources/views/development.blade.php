<x-layout>
  <x-slot:title>
    Under Development
    </x-slot>

    <div class="container p-5 d-flex flex-column justify-content-center align-items-center">
      <h1 class="fw-bolder">{{ __('Page Coming Soon!') }}</h1>
      <p class="text-center">
        {{ __('This page is still being developed and it will be available soon. Thank you for your patience!') }}</p>
      <a href="/" class="btn btn-primary">{{ __('Go to the Homepage') }}</a>
    </div>
    <!-- Contact Footer -->
    <x-contact-footer />
</x-layout>
