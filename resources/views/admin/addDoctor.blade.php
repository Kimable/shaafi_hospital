<x-layout>
  <x-slot:title>
    Add Doctors
    </x-slot>

    <!-- Add Doctor -->
    <div class="add-doctor form-container container py-5">
      <div class="row">
        <div class="col-3"></div>
        <div class="col-lg-6">
          @if (session('success'))
            <div>
              <p class="text-center fw-bolder p-3 bg-success-subtle text-success rounded-3">{{ session('success') }} <a
                  href="/admin/manage-doctors">Manage Doctors</a></p>
            </div>
          @endif

          @if ($errors->any())
            <div class="alert alert-danger">
              <strong>Whoops!</strong> There were some problems with your input.<br><br>
              <ul>
                @foreach ($errors->all() as $error)
                  <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>
          @endif

          <form action="{{ route('admin/add-doctor.post') }}" method="post">
            @csrf
            <h3>Add a Doctor</h3>
            <div class="mb-3">
              <label class="form-label" for="first_name">First Name</label>
              <input type="text" class="form-control" name="first_name" id="first_name">
            </div>

            <div class="mb-3">
              <label class="form-label" for="last_name">Last Name</label>
              <input type="text" class="form-control" name="last_name" id="last_name">
            </div>

            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp"
                required>
            </div>

            <div class="mb-3">
              <label for="phone" class="form-label">Phone Number</label>
              <input type="text" class="form-control" name="phone" id="phone" required>
            </div>

            <div class="mb-3 specialty">
              <label for="specialty" class="form-label">Specialty</label>
              <select name="specialty" class="form-select" id="specialty">
                <option selected>--Select Specialty--</option>
                <option value="Orthopaedic Surgery">Orthopaedic Surgery</option>
                <option value="Orthopaedics and Spinal Surgery">Orthopaedics and Spinal Surgery</option>
                <option value="Otorhinolaryngology, Head and Neck Surgery">Otorhinolaryngology, Head and Neck Surgery
                </option>
                <option value="Paediatric Surgery">Paediatric Surgery</option>
                <option value="Paediatrics">Paediatrics</option>
                <option value="Plastic Surgery">Plastic Surgery</option>
                <option value="Anaesthesiology">Anaesthesiology</option>
                <option value="Cardiology">Cardiology</option>
                <option value="Electrophysiology">Electrophysiology</option>
                <option value="Internal Medicine">Internal Medicine</option>
                <option value="Cardiothoracic Surgery">Cardiothoracic Surgery</option>
                <option value="Clinical Psychology">Clinical Psychology</option>
                <option value="Dentistry">Dentistry</option>
                <option value="Dermatology">Dermatology</option>
                <option value="Diabetology">Diabetology</option>
                <option value="Endocrinology">Endocrinology</option>
                <option value="Emergency Medicine">Emergency Medicine</option>
                <option value="Gastroenterology">Gastroenterology</option>
                <option value="Colorectal Surgery">Colorectal Surgery</option>
                <option value="Thoracic Surgery">Thoracic Surgery</option>
                <option value="General Surgery">General Surgery</option>
                <option value="Gynaecological Oncology">Gynaecological Oncology</option>
                <option value="Internal Medicine">Internal Medicine</option>
                <option value="Rheumatology">Rheumatology</option>
                <option value="Nephrology">Nephrology</option>
                <option value="Neuro-Behavioural Medicine">Neuro-Behavioural Medicine</option>
                <option value="Neurology">Neurology</option>
                <option value="Neurosurgery">Neurosurgery</option>
                <option value="Nuclear Medicine">Nuclear Medicine</option>
                <option value="Obstetrician">Obstetrician</option>
                <option value="Gynaecology">Gynaecology</option>
                <option value="Occupational Health">Occupational Health</option>
                <option value="Preventive Medicine">Preventive Medicine</option>
                <option value="Oncology">Oncology</option>
                <option value="Ophthalmology">Ophthalmology</option>
                <option value="Oral-Maxillofacial Surgery">Oral-Maxillofacial Surgery</option>
                <option value="Orthodontics">Orthodontics</option>
                <option value="67">Orthopaedic</option>
                <option value="Orthopaedic Oncology">Orthopaedic Oncology</option>
                <option value="Preventive Medicine">Preventive Medicine</option>
                <option value="Radiology">Radiology</option>
                <option value="Urogynaecology">Urogynaecology</option>
                <option value="Urology">Urology</option>
                <option value="Wellness">Wellness</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="qualifications" class="form-label">Qualifications</label>
              <input type="text" name="qualifications" class="form-control" id="qualifications">
            </div>

            <div class="mb-3">
              <label for="languages" class="form-label">Languages</label>
              <input type="text" name="languages" class="form-control" id="languages">
            </div>

            <div class="mb-3">
              <label for="description" class="form-label">Description</label>
              <textarea class="form-control" name="description" placeholder="Doctor Description" id="description"
                style="height: 100px"></textarea>
            </div>

            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>

            <button type="submit" class="btn btn-primary">Add Doctor</button>
          </form>
        </div>
      </div>
    </div>
</x-layout>
