$ = function(id) {
    return document.getElementById(id);
  }
  
  var show = function(id) {
      $(id).style.display ='block';
  }
  var hide = function(id) {
      $(id).style.display ='none';
  }


    const sizeButtons = document.querySelectorAll('.size-button');
    const selectedSize = document.querySelector('.selected-size');

    sizeButtons.forEach(button => {
        button.addEventListener('click', () => {
        const size = button.getAttribute('data-size');
        selectedSize.textContent = `Selected size: ${size}`;
        });
    });


