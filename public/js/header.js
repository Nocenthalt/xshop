

window.addEventListener('load', (event) => {
    
    let dropdownNav = document.querySelector('.nav__dropdown');
    dropdownNav.addEventListener('click', (event) => {
        let dropdownMenu = document.querySelector('.nav__dropdown__menu');
        dropdownMenu.classList.toggle('hidden');
    })
  });