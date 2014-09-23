/*
 * Created by Satz(sathish.thi@gmail) for prestashop
 * 
 */

$(document).ready(function() {
    $('body').on('click','.close',function(){
        var $that = $(this);
        $that.parents("#msg").fadeOut();
    });

    $('body').on('click', '.codpincode', function(e) {
        e.preventDefault();
        var $cod = $(this).closest("form").find("input[name='codpincode']").val();
        if ($cod.length === 0 || $cod === '') {
            $(this).closest("form").find("input[name='codpincode']").prop('placeholder', 'required');
            $(this).closest("form").find("input[name='codpincode']").css('border-color', 'red');
        }
        else {
            $(this).closest("form").find("input[name='codpincode']").css('border-color', 'rgb(189, 194, 201)');
            var $pincdoe=  $(this).closest("form").find("input[name='codpincode']").val();
            var $url =baseDir + 'modules/CODPincode/ajax.php';
              var $div = $(this).closest('form').find('#msg');
            $.getJSON($url, {pincode:$pincdoe})
                    .done(function(json) {
                      var $parse=JSON.parse(json);  
                      if($parse.result===false){
                       $($div).addClass('alert-warning').removeClass('alert-success').fadeIn();
                       $($div).find('.msgd').text($parse.msg);
                      }
                      else{
                          $($div).addClass('alert-success').removeClass('alert-warning').fadeIn();
                       $($div).find('.msgd').text($parse.msg);
                      }
                    })
                    .fail(function(jqxhr, textStatus, error) {
                        var err = textStatus + ", " + error;
                        console.log("Request Failed: " + err);
                    });
        }
    });

});