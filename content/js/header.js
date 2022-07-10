window.addEventListener("load", (event) => {
  let btns = document.querySelectorAll(".nav__btn");
  let dropdowns = document.querySelectorAll(".nav__dropdown");
  
  btns.forEach((btn) => {
    btn.addEventListener("click", (event) => {
      let dropdown = event.target.nextElementSibling;
      dropdowns.forEach((dd) => !dd.classList.contains("hidden") && (dd.id != dropdown.id) ? dd.classList.add("hidden") : null);
      dropdown.classList.toggle("hidden");
    });
  });

  let stack = function(n) {
    
  }
});
