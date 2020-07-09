$(function () {
  $('[data-toggle="tooltip"]').tooltip();
});

$(document).ready(function () {
  $(".sideMenuToggler").on("click", function () {
    $(".wrapper").toggleClass("active");
    $(".expandView").toggleClass("fa-chevron-circle-left");
    $(".expandView").toggleClass("fa-chevron-circle-right");
  });

  var adjustSidebar = function () {
    $(".sidebar").slimScroll({
      height:
        document.documentElement.clientHeight - $(".navbar").outerHeight(),
    });
  };

  adjustSidebar();
  $(window).resize(function () {
    adjustSidebar();
  });
});

let formData = (formId) => {
  let form = new FormData(document.getElementById(formId));

  let params = {};
  for (var pair of form.entries()) {
    params[pair[0]] = pair[1];
  }

  const data = Object.keys(params)
    .map(
      (key) => `${encodeURIComponent(key)}=${encodeURIComponent(params[key])}`
    )
    .join("&");

  return data;
};

let ajaxPost = (url, data, callback) => {
  var request = new XMLHttpRequest();
  request.open("POST", url, true);
  request.onload = function () {
    if (this.status >= 200 && this.status < 400) {
      // Success!
      let response;
      try {
        response = JSON.parse(request.responseText);
      } catch (err) {
        swal("Error", err.message + " in " + request.responseText, "error");
      }
      callback(response);
    } else {
      // We reached our target server, but it returned an error
      swal(`error ${this.status}`, this.statusText, "error");
    }
  };
  request.setRequestHeader(
    "Content-Type",
    "application/x-www-form-urlencoded; charset=UTF-8"
  );
  request.send(data);
};
