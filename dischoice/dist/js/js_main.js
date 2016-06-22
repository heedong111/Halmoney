$(document).ready(function () {
  var trigger = $('.hamburger'),
      overlay = $('.overlay'),
     isClosed = false;

    trigger.click(function () {
      hamburger_cross();      
    });

    function hamburger_cross() {

      if (isClosed == true) {          
        overlay.hide();
        trigger.removeClass('is-open');
        trigger.addClass('is-closed');
        isClosed = false;
      } else {   
        overlay.show();
        trigger.removeClass('is-closed');
        trigger.addClass('is-open');
        isClosed = true;
      }
  }
  
  $('[data-toggle="offcanvas"]').click(function () {
        $('#wrapper').toggleClass('toggled');
  });  
});

$('.row').on('click', function() {
  
   // Clicking on the parent row will toggle the child check box
   $('input[type=checkbox]', this).prop('checked', function(i, checked){
      return !checked
   })

  // Add selected class when box is checked
  if($('input[type=checkbox]', this).prop('checked'))
    $(this).addClass('selected');
  else
    $(this).removeClass('selected');
});