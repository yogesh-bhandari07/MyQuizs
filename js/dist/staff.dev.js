"use strict";

function preview_image(event) {
  var reader = new FileReader();

  reader.onload = function () {
    var output = document.getElementById('output_img');
    output.src = reader.result;
  };

  reader.readAsDataURL(event.target.files[0]);
}