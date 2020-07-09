let systemSelect = document.querySelector("#systemSelect");
systemSelect.addEventListener("change", () => {
  window.location = `${baseUrl}/session/${systemSelect.value}`;
});
