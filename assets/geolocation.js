document.getElementById("getLocation").addEventListener("click", function () {
    const xhr = new XMLHttpRequest();
    xhr.open("GET", "http://ip-api.com/json/", true);
    xhr.onload = function () {
      if (xhr.status === 200) {
        const data = JSON.parse(xhr.responseText);
        const latitude = data.lat;
        const longitude = data.lon;

        //display inside the input fields
        document.getElementById("lat").value = latitude;
        document.getElementById("long").value = longitude;

        //display outside
        // document.getElementById("location").innerText = `Latitude: ${latitude}, Longitude: ${longitude}`;
      } else {
        document.getElementById("location").innerText = "Unable to retrieve location.";
      }
    };
    xhr.onerror = function () {
      document.getElementById("location").innerText = "Request failed.";
    };
    xhr.send();
  });