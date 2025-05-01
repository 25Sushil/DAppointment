//modified
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




// document.getElementById("getLocation").addEventListener("click", function () {
//     const xhr = new XMLHttpRequest();
//     xhr.open("GET", "http://ip-api.com/json/", true);
//     xhr.onload = function () {
//       if (xhr.status === 200) {
//         const data = JSON.parse(xhr.responseText);
//         const latitude = data.lat;
//         const longitude = data.lon;

//         //display inside the input fields
//         document.getElementById("lat").value = latitude;
//         document.getElementById("long").value = longitude;

//         //display outside
//         // document.getElementById("location").innerText = `Latitude: ${latitude}, Longitude: ${longitude}`;
//       } else {
//         document.getElementById("location").innerText = "Unable to retrieve location.";
//       }
//     };
//     xhr.onerror = function () {
//       document.getElementById("location").innerText = "Request failed.";
//     };
//     xhr.send();
//   });

// document.getElementById("getLocation").addEventListener("click", function () {
//   if (navigator.geolocation) {
//     navigator.geolocation.getCurrentPosition(
//       function(position) {
//         // Success callback
//         const latitude = position.coords.latitude;
//         const longitude = position.coords.longitude;

//         // Update input fields
//         document.getElementById("lat").value = latitude;
//         document.getElementById("long").value = longitude;

//         // Optional: Display coordinates
//         // document.getElementById("location").innerText = `Latitude: ${latitude}, Longitude: ${longitude}`;
//       },
//       function(error) {
//         // Error callback
//         let errorMessage;
//         switch(error.code) {
//           case error.PERMISSION_DENIED:
//             errorMessage = "User denied geolocation permission.";
//             break;
//           case error.POSITION_UNAVAILABLE:
//             errorMessage = "Location information unavailable.";
//             break;
//           case error.TIMEOUT:
//             errorMessage = "Location request timed out.";
//             break;
//           default:
//             errorMessage = "Unknown error occurred.";
//         }
//         document.getElementById("location").innerText = errorMessage;
//       }
//     );
//   } else {
//     document.getElementById("location").innerText = "Geolocation is not supported by your browser.";
//   }
// });
