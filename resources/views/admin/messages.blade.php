<x-layout>
  <x-slot:title>
    Messages
    </x-slot>

    @if (count($messages) <= 0)
      <div class="container p-5 d-flex flex-column justify-content-center align-items-center">
        <h2 class="fw-bolder">No Messages</h2>
        <p>There are no messages that have been sent!</p>
      </div>
    @else
      <div class="container my-3">
        <h1>Messages</h1>
        <div class="table-responsive">
          <table class="table table-dark table-striped table-hover">
            <thead>
              <tr>
                <th scope="col">From</th>
                <th scope="col">Email</th>
                <th scope="col">Subject</th>
                <th scope="col">Read Message</th>
              </tr>
            </thead>

            @foreach ($messages as $message)
              <tr>
                <th>{{ $message->name }}</th>
                <td>{{ $message->email }}</td>
                <td>{{ $message->msgTitle }}</td>
                <td><a href="/admin/message/{{ $message->id }}" class="btn btn-tertiary">Read Message</a></td>
              </tr>
            @endforeach
          </table>
        </div>
      </div>
    @endif

</x-layout>
