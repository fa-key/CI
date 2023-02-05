$(document).ready(function() {
      // $.get()
      $.get('ajax/seventeen.php?keyword=' + $('#keyword').val(), function(data){
  
        $('#container').html(data);
        $('.loader').hide();
      });
  
    });

  