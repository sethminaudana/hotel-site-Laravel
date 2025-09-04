document.addEventListener('DOMContentLoaded', function () {

    flatpickr("#checkin_picker", {
      enableTime: true,
      dateFormat: "Y-m-d H:i",
      //minDate: new Date(), // or use a PHP-injected min date
      minDate: document.getElementById('checkin_picker').dataset.mindate,
      time_24hr: false,
      theme: "dark" // only applies if you include dark.css
    });
  });

  document.addEventListener("DOMContentLoaded", function () {
        if (window.location.hash === "#success-message") {
            document.getElementById("success-message")?.scrollIntoView({ behavior: "smooth" });
        }
    });

    
