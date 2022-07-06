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

  let carts = document.querySelectorAll(".cart-action");
  let productCard = document.querySelectorAll(".prod-item");
  let isWidgetHidden = false;
  carts.forEach((cart) => {
    cart.addEventListener("click", cartAction);
  });

  function cartAction(e) {
    e.preventDefault();
    let widgets = e.target.parentNode.parentNode;
    let parentCard = widgets.parentNode;

    e.target.style.transform = "scale(1.45) translateY(5%)";
    // giấu các icon khác
    widgets.childNodes.forEach((item) => {
      if (item.className != "cart-action") {
        if (item.style) {
          item.classList.toggle("cart-action__hidden");
        }
      }
    });

    let popupContainer = document.createElement("div");
    let popupAmount = document.createElement("button");
    let popupIncrease = document.createElement("span");
    let popupDecrease = document.createElement("span");
    let cardAmount = 1;

    popupContainer.classList.add("cart-popup", "popupFade", "title-2");
    popupAmount.innerHTML = cardAmount;
    popupAmount.classList.add("btn", "title-2");

    popupIncrease.innerHTML = "+";
    popupDecrease.innerHTML = "-";
    popupIncrease.className = "popup-increase";
    popupDecrease.className = "popup-decrease";
    popupContainer.append(popupDecrease, popupAmount, popupIncrease);
    parentCard.append(popupContainer);

    popupContainer.addEventListener("click", cartPopupHandler);

    function cartPopupHandler(e) {
      e.preventDefault();
      let classes = e.target.classList;
      if (classes.contains("popup-increase")) {
        popupAmount.innerHTML = ++cardAmount;
      }
      if (classes.contains("popup-decrease")) {
        cardAmount = --cardAmount == 0 ? (cardAmount = 1) : cardAmount;
        popupAmount.innerHTML = cardAmount;
      }
    }
  }
};
