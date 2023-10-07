<style>
  .slider-container {
    position: relative;
    margin: 0 auto;
    overflow: hidden;
  }

  .doctor-slider {
    display: flex;
    transition: transform 0.3s ease-in-out;
  }

  .slide-item {
    flex: 0 0 33.33%;
    max-width: 33.33%;
    padding: 10px;
    box-sizing: border-box;
  }

  img {
    max-width: 100%;
    height: auto;
  }

  .prev-btn,
  .next-btn {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    background-color: #bfd2f8;
    border-radius: 8px;
    border: none;
    cursor: pointer;
  }

  .prev-btn i,
  .next-btn i {
    font-size: 30px;
    color: #2e3191;
  }

  .prev-btn {
    left: 0;
  }

  .next-btn {
    right: 0;
  }

  /* Two images for medium screens */
  @media (max-width: 768px) {
    .slide-item {
      flex: 0 0 50%;
      max-width: 50%;
    }
  }

  /* One image for small screens */
  @media (max-width: 560px) {
    .slide-item {
      flex: 0 0 100%;
      max-width: 100%;
    }
  }
</style>

<div class="container py-2">
  @if (count($doctors) <= 0)
    <div class="container p-5 d-flex flex-column justify-content-center align-items-center">
      <h2 class="fw-bolder">Doctors are yet to be Added</h2>
      <p>Doctors have not been added yet. Please try again later</p>
    </div>
  @endif
</div>
<div class="slider-container">
  <div class="doctor-slider">
    @foreach ($doctors as $doctor)
      <div class="slide-item">
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
  <button class="prev-btn">
    <i class="bi bi-arrow-left-circle-fill"></i>
  </button>
  <button class="next-btn">
    <i class="bi bi-arrow-right-circle-fill"></i>
  </button>
</div>
</div>
<script>
  const slider = document.querySelector(".doctor-slider");
  const prevBtn = document.querySelector(".prev-btn");
  const nextBtn = document.querySelector(".next-btn");
  let currentIndex = 0;

  prevBtn.addEventListener("click", () => {
    currentIndex =
      (currentIndex - 1 + slider.children.length) % slider.children.length;
    updateSliderPosition();
  });

  nextBtn.addEventListener("click", () => {
    currentIndex = (currentIndex + 1) % slider.children.length;
    updateSliderPosition();
  });

  function updateSliderPosition() {
    const slideWidth = slider.children[0].offsetWidth;
    const newPosition = -currentIndex * slideWidth;
    slider.style.transform = `translateX(${newPosition}px)`;
  }

  window.addEventListener("resize", updateSliderPosition);
  updateSliderPosition();
</script>
