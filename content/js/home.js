// Select all slides

window.onload = function () {
  const slides = document.querySelectorAll(".slide");
  const indicators = document.querySelectorAll(".slide__indicator__item");

  let curSlide = -1;
  let maxSlide = slides.length - 1;

  slides.forEach((slide) => (slide.classList.toggle = "hidden"));

  // hiển thị lần lượt các slide và reset lại khi đến slide cuối cùng
  const reset = () => {
    curSlide = curSlide === maxSlide ? 0 : curSlide + 1;

    // di chuyển indicator
    indicators[curSlide].classList.toggle("active");
    indicators.forEach((ind, i) =>
      i === curSlide
        ? ind.classList.add("active")
        : ind.classList.remove("active")
    );

    // di chuyển slide
    slides.forEach((slide, i) => {
      if (i === curSlide) {
        slide.style.transform = "translateX(0)";
        slide.style.opacity = "1";
      } else {
        slide.style.transform = "translateX(-100%)";
        slide.style.opacity = "0";
      }
    });
  };

  reset();
  setInterval(reset, 5000);

  // hiển thị slide khi click vào nút
  indicators.forEach((ind, i) => {
    ind.addEventListener("click", () => {
      curSlide = i - 1;
      reset();
    });
  });
};
