<x-layout>
  <x-slot:title>
    Delete Doctor
    </x-slot>

    <div class="container my-5 text-center">
      @if ($doctor)
        <div class="row">
          <div class="col-3"></div>
          <div class="card p-3 col-md-6">
            <h1>Delete Doctor</h1>
            <form action="{{ route('admin/delete-doctor.post', $doctor->id) }}" method="POST">
              @csrf
              <p>Are you sure you want to delete <strong>Dr. {{ $doctor->first_name }}</strong>?</p>

              <button type="submit" class="btn btn-danger">Delete</button>
              <a href="/admin/manage-doctors" class="btn btn-secondary">Cancel</a>
            </form>
          </div>
        </div>
      @else
        <h2 class="text-primary">This doctor does not exist.</h2>
        <p>Sorry! it appears this doctor doesn't exist or has been deleted from the database.</p>
        <a href="/dashboard" class="btn btn-primary">Go back to the dashboard</a>
      @endif

    </div>
</x-layout>
