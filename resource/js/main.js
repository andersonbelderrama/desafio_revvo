// Error and success messages
setTimeout(function () {
  var errorMessage = document.getElementById('errorMessage');
  var successMessage = document.getElementById('successMessage');

  if (errorMessage && errorMessage.classList) {
      errorMessage.classList.remove('error-message');
      errorMessage.classList.add('hidden');
  }

  if (successMessage && successMessage.classList) {
      successMessage.classList.remove('success-message');
      successMessage.classList.add('hidden');
  }
}, 5000);



// Slider
document.addEventListener('DOMContentLoaded', function () {
    var currentSlide = 0;
    var totalSlides = window.totalSlides;

    var slidesContainer = document.getElementById('slides');
    var prevBtn = document.getElementById('prevBtn');
    var nextBtn = document.getElementById('nextBtn');
    var selectorDots = document.querySelectorAll('.slider-selector-dot');

    function updateSlider() {
      slidesContainer.style.transform = 'translateX(' + -currentSlide * 100 + '%)';

      selectorDots.forEach(function (dot, index) {
        dot.classList.toggle('slider-selector-dot-active', index === currentSlide);
      });
    }

    function nextSlide() {
      currentSlide = (currentSlide + 1) % totalSlides;
      updateSlider();
    }

    prevBtn.addEventListener('click', function () {
      currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
      updateSlider();
    });

    nextBtn.addEventListener('click', function () {
      nextSlide();
    });

    selectorDots.forEach(function (dot, index) {
      dot.addEventListener('click', function () {
        currentSlide = index;
        updateSlider();
      });
    });

    var timer = setInterval(nextSlide, 10000);

    slidesContainer.addEventListener('mouseenter', function () {
      clearInterval(timer);
    });

    slidesContainer.addEventListener('mouseleave', function () {
      timer = setInterval(nextSlide, 10000);
    });
  });


// Modal
document.addEventListener('DOMContentLoaded', function () {
  if (!localStorage.getItem('modalShow')) {

    document.getElementById('myModal').classList.remove('hidden');
    document.getElementById('myModal').classList.add('flex');
    document.getElementById('myModal').classList.add('items-center');
    document.getElementById('myModal').classList.add('justify-center');
    document.body.classList.add('overflow-hidden');

    localStorage.setItem('modalShow', 'true');
  }

  document.querySelector('.modal-close').addEventListener('click', function () {
    document.getElementById('myModal').classList.add('opacity-0');
    document.getElementById('myModal').classList.add('pointer-events-none');
    document.getElementById('myModal').classList.remove('flex');
    document.getElementById('myModal').classList.remove('items-center');
    document.getElementById('myModal').classList.remove('justify-center');
    document.getElementById('myModal').classList.add('hidden');
    document.body.classList.remove('overflow-hidden');
  });
});


// DropdownUser Header
function toggleDropdown() {
  var dropdownContent = document.getElementById('dropdownUserContent');
  dropdownContent.classList.toggle('hidden');
}

window.addEventListener('click', function (event) {
  var dropdownButton = document.getElementById('dropdownUserButton');
  var dropdownContent = document.getElementById('dropdownUserContent');

  if (event.target !== dropdownButton && event.target !== dropdownContent) {
    dropdownContent.classList.add('hidden');
  }
});