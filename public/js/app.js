$(document).ready(function () {
  var owl = $(".owl-carousel");
  owl.owlCarousel({
    items: 4,
    loop: true,
    margin: 10,
    autoplay: false,
    autoplayTimeout: 1000,
    autoplayHoverPause: true,
    responsive: {
      0: {
        items: 1,
      },
      600: {
        items: 3,
      },
      1000: {
        items: 4,
      },
    },
  });
  $(".play").on("click", function () {
    owl.trigger("play.owl.autoplay", [1000]);
  });
  $(".stop").on("click", function () {
    owl.trigger("stop.owl.autoplay");
  });

  $(".slick-sanpham").slick({
    speed: 300,
    slidesToShow: 4,
    slidesToScroll: 1,
    vertical: false,
    infinite: false,
    autoplay: false,
    autoplaySpeed: 1000,
    arrows: false,
  });
});
