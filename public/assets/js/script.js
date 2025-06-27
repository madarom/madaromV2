$(document).ready(function () {
  $(".ville-ala-une").slick({
    slidesToShow: 3,
    slidesToScroll: 1,
    centerMode: true,
    arrows: true,
    swipeToSlide: true,
    dots: false,
    infinite: false,
    prevArrow: `
      <button class='btn btn-rounded btn-prev'>
        <svg id="i-left-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492 492">
          <path d="M198.608 246.104L382.664 62.04c5.068-5.056 7.856-11.816 7.856-19.024 0-7.212-2.788-13.968-7.856-19.032l-16.128-16.12C361.476 2.792 354.712 0 347.504 0s-13.964 2.792-19.028 7.864L109.328 227.008c-5.084 5.08-7.868 11.868-7.848 19.084-.02 7.248 2.76 14.028 7.848 19.112l218.944 218.932c5.064 5.072 11.82 7.864 19.032 7.864 7.208 0 13.964-2.792 19.032-7.864l16.124-16.12c10.492-10.492 10.492-27.572 0-38.06L198.608 246.104z" />
        </svg>
      </button>`,
    nextArrow: `
      <button class='btn btn-rounded btn-next'>
        <svg id="i-left-arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 492 492">
        <path d="M382.678 226.804L163.73 7.86C158.666 2.792 151.906 0 144.698 0s-13.968 2.792-19.032 7.86l-16.124 16.12c-10.492 10.504-10.492 27.576 0 38.064L293.398 245.9l-184.06 184.06c-5.064 5.068-7.86 11.824-7.86 19.028 0 7.212 2.796 13.968 7.86 19.04l16.124 16.116c5.068 5.068 11.824 7.86 19.032 7.86s13.968-2.792 19.032-7.86L382.678 265c5.076-5.084 7.864-11.872 7.848-19.088.016-7.244-2.772-14.028-7.848-19.108z" />
        </svg>
      </button>`,
    responsive: [
      {
        breakpoint: 993,
        settings: {
          slidesToShow: 2,
        },
      },
      {
        breakpoint: 702,
        settings: {
          slidesToShow: 1,
        },
      },
      {
        breakpoint: 425,
        settings: {
          slidesToShow: 1,
          centerMode: false,
        },
      },
    ],
  });
  $(".ville-ala-une").slick("slickGoTo", 2);
});

var slideIndex = 1;
carousel();

function plusDivs(n) {
  showDivs(slideIndex += n);
}

function showDivs(n) {
  var i;
  var x = document.getElementsByClassName("mySlides");
  if (n > x.length) {slideIndex = 1}
  if (n < 1) {slideIndex = x.length} ;
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  x[slideIndex-1].style.display = "block";
}

function carousel() {
  var i;
  var x = document.getElementsByClassName("mySlides");
  for (i = 0; i < x.length; i++) {
    x[i].style.display = "none";
  }
  slideIndex++;
  if (slideIndex > x.length) {slideIndex = 1}
  x[slideIndex-1].style.display = "block";
  setTimeout(carousel, 4000); // Change image every 2 seconds
}
