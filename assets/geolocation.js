document.getElementById("getLocation").addEventListener("click", function () {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(
      function (position) {
        const latitude = position.coords.latitude;
        const longitude = position.coords.longitude;

        // Display inside the input fields
        document.getElementById("lat").value = latitude;
        document.getElementById("long").value = longitude;

      },
      function (error) {
        document.getElementById("location").innerText = "Error getting location: " + error.message;
      }
    );
  } else {
    document.getElementById("location").innerText = "Geolocation is not supported by this browser.";
  }
});