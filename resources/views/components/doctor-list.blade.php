<div class="table-responsive">
  <table class="table table-bordered">
    <thead>
      <tr>
        <th>First Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Specialty</th>
        <th>Qualifications</th>
        <th>Image</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>
    <tbody>
      @foreach ($doctors as $doctor)
        <tr>
          <td>{{ $doctor->first_name }}</td>
          <td>{{ $doctor->email }}</td>
          <td>{{ $doctor->phone }}</td>
          <td>{{ $doctor->specialty }}</td>
          <td>{{ $doctor->qualifications }}</td>
          <td>
            @if ($doctor->avatar)
              <img src="{{ $doctor->avatar }}" alt="Doctor Image" class="img-thumbnail">
            @else
              No Image
            @endif
          </td>
          <td><a href="{{ $doctor->id }}" class="btn btn-primary">Edit</a></td>
          <td>
            <form action="{{ $doctor->id }}" method="POST"
              onsubmit="return confirm('Are you sure you want to delete this doctor?')">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-danger">Delete</button>
            </form>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
