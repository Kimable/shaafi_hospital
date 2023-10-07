<x-layout>
  <x-slot:title>
    View Message
    </x-slot>

    @if (!$message)
      <div class="container p-5 d-flex flex-column justify-content-center align-items-center">
        <h2 class="fw-bolder mb-2">No Message</h2>
        <p>There is no message here!</p>
      </div>
    @else
      <div class="container my-3">

        <div class="row">
          <div class="col-3"></div>
          <div class="col-md-6">
            <h2 class="mb-3">Message</h2>
            <div class="card view-appointment">
              <div class="card-body">
                <h5 class="fw-bold">Subject: <span class="tertiary-color">{{ $message->msgTitle }}</span></h5>

                <hr>

                <p class="fw-bold">From: <span class="tertiary-color">{{ $message->name }}</span></p>
                <p class="fw-bold">Email: <span class="tertiary-color">{{ $message->email }}</span></p>
                <p class="fw-bold">Message: <span class="tertiary-color">{{ $message->message }}</span></p>

                <a href="" class="btn btn-tertiary">Reply Message</a>
              </div>
            </div>
          </div>
        </div>

      </div>
    @endif

</x-layout>
