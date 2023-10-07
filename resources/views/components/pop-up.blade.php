<style>
  .popup {
    display: none;
    position: fixed;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    padding: 20px;
    background-color: #2e3191;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    z-index: 10000;
    border-radius: 10px;
    height: 400px;
    color: white;
    justify-content: center;
    align-items: center;
    flex-direction: column;
  }

  .popup h2 {
    color: white;
  }

  .popup-content {
    text-align: center;
  }

  #closeBtn {
    display: inline-block;
    margin-left: 2px;
  }

  .close-icon {
    position: absolute;
    left: 85%;
    top: 5%;
    font-size: 22px;
    font-weight: bold;
    cursor: pointer;
  }

  @media (max-width:600px) {
    .popup {
      width: 95%;
      height: 65%;
      top: 50%;
      left: 50%;
      transform: translate(-50%, -50%);
    }
  }
</style>

<div class="popup" id="popup">
  <div class="row">
    <div class="col-10"></div>
    <div class="col-2 close-icon">
      <i class="bi bi-x-lg"></i>
    </div>
  </div>
  <div class="popup-content">
    <h2>{{ __('Get up to 30% off!') }}</h2>
    <p>{{ __('Book an appointment through our website and enjoy serious discounts on your next hospital visit.') }}</p>
    <a href="/appointment" class="btn btn-primary">{{ __('Book Appointment') }}</a>

  </div>
</div>

<script>
  const popup = document.getElementById("popup");
  const closeIcon = document.querySelector(".close-icon");

  const POPUP_STORAGE_KEY = "popupClosed";

  window.addEventListener("scroll", () => {
    if (!hasPopupClosed() && window.scrollY > 500) {
      popup.style.display = "flex";
    }
  });

  closeIcon.addEventListener("click", () => {
    closePopup();
  });

  document.addEventListener("click", (event) => {
    if (!popup.contains(event.target) && event.target !== closeIcon) {
      closePopup();
    }
  });

  function hasPopupClosed() {
    return localStorage.getItem(POPUP_STORAGE_KEY) === "true";
  }

  function closePopup() {
    popup.style.display = "none";
    localStorage.setItem(POPUP_STORAGE_KEY, "true");
  }

  window.addEventListener("beforeunload", () => {
    resetPopupState();
  });

  function resetPopupState() {
    localStorage.setItem(POPUP_STORAGE_KEY, "false");
  }
</script>
