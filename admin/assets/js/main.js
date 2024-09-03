$(document).ready(function() {
  $('.dropdown').hover(
    function() {
      $(this).find('.dropdown-menu').stop(true, true).slideDown(300).css('opacity', 1).css('transform', 'translateY(0)');
    },
    function() {
      $(this).find('.dropdown-menu').stop(true, true).slideUp(300).css('opacity', 0).css('transform', 'translateY(10px)');
    }
  );

  $(document).click(function(event) {
    if (!$(event.target).closest('.dropdown').length) {
      $('.dropdown-menu').stop(true, true).slideUp(300).css('opacity', 0).css('transform', 'translateY(10px)');
    }
  });

  $('.dropdown').click(function(event) {
    event.stopPropagation();
  });
});
