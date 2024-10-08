$(document).ready(function() {

  // Close sidebar when clicking outside
  $(document).on('click', function(event) {
      if (!$(event.target).closest('.sidebar, .openbtn').length) {
          $('.sidebar').removeClass('open');
          $('body').removeClass('overlay-active'); // Re-enable scrolling
      }
  });

  // Prevent sidebar from closing when clicking inside it
  $('.sidebar').on('click', function(event) {
      event.stopPropagation();
  });
  
  // Handle dropdown toggle
  $('.dropdown').on('click', function() {
      $(this).find('.dropdown-menu').toggleClass('show');
  });
  
  // Close dropdown when clicking outside
  $(document).on('click', function(event) {
      if (!$(event.target).closest('.dropdown').length) {
          $('.dropdown-menu').removeClass('show');
      }
  });
});