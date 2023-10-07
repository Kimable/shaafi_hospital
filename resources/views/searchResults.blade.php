<x-layout>
  <x-slot:title>
    Search Results
    </x-slot>
    <!-- Display search results here -->
    <div class="container search_results my-5">
      <h2>Search Results</h2>
      @if ($doctors->isEmpty())
        <p>No doctors found.</p>
      @else
        <div class="doc-container">
          <div class="row">
            @foreach ($doctors as $doctor)
              <div class="col-md-4">
                <div class="card doctor">
                  <img src="{{ asset('uploads/' . $doctor->avatar) }}" class="card-img-top" alt="...">
                  <div class="card-body">
                    <h5 class="card-title fw-bold">Dr. {{ $doctor->first_name }} {{ $doctor->last_name }}</h5>
                    <p class="card-text">{{ $doctor->specialty }}</p>

                  </div>
                  <div class="card-footer text-center">
                    <a href="/doctor/{{ $doctor->id }}" class="btn fw-bold">View Profile</a>
                  </div>
                </div>

              </div>
            @endforeach
          </div>
        </div>
      @endif
    </div>
</x-layout>
