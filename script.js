/* PASSENGER COUNTER */
function change(id, value) {
  let input = document.getElementById(id);
  let current = parseInt(input.value);

  current += value;

  if (id === "adt" && current < 1) current = 1;
  if (id !== "adt" && current < 0) current = 0;

  input.value = current;
}

/* TRIP TYPE TOGGLE */
const buttons = document.querySelectorAll(".seg-btn");
const returnCol = document.getElementById("return-col");

buttons.forEach(btn => {
  btn.addEventListener("click", () => {
    buttons.forEach(b => b.classList.remove("active"));
    btn.classList.add("active");

    document.getElementById("trip_type").value = btn.dataset.trip;

    if (btn.datasettrip === "oneway") {
      returnCol.style.display = "none";
    } else {
      returnCol.style.display = "block";
    }
  });
});

/* FORM SUBMIT MESSAGE (Frontend feedback only) */
const form = document.getElementById("searchForm");
const message = document.getElementById("formMessage");

form.addEventListener("submit", () => {
  message.textContent = "Searching for available flights...";
});