@if (session('success'))
  <div class="alert alert-success">
    <p>{{ session('success') }}</p>
  </div>
@endif

@if ($errors->any())
  <div class="alert alert-danger">
    <p class="fw-bolder">Ooops! An error occurred!</p>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
