$(document).ready(function () {


  if (!$.cookie('theme')) {
    $.cookie('theme', 'day');
  }

  if ($.cookie('theme') == 'night') {
    $('html, body, header,.mainT, li').addClass('night');
    $('.btn').addClass('btnN');
  }

  $('.dn').click(function () {

    if ($.cookie('theme') == 'night') {
      $.cookie('theme', 'day');
      $('html, body, header,.mainT, li').removeClass('night');
      $('.btn').removeClass('btnN');
    }
    else {
      $.cookie('theme', 'night');
      $('html, body, header,.mainT, li').addClass('night');
      $('.btn').addClass('btnN');
    }

  });

  $('#btn3').click(function () {
    $(this).hide();
    $('.delF').show();
  });
  $('#btn5').click(function () {
    $('.delF').hide();
    $('#btn3').show();
  });

  $('#login').click(function () {
    $("#log").slideDown(600);
    $(this).hide();
  });

  $("#otmena").click(function () {
    $("#log").slideUp(600);
    $('#login').show()
  });

  $('#btn6').click(function () {
    $('.searchF').show();
    $(this).hide();
  });

  $('#btn7').click(function () {
    $('.searchF').hide();
    $('#btn6').show();
  });



});

