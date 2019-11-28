(function ($) {
  "use strict"; // Start of use strict

  $('.check_produk').change(function(){
    if ($('.check_produk').is(':checked')){
        var Val = document.getElementsByName('check_produk');
        console.log(Val);
    } else {
        $('#txtNumHours').val('').prop('disabled', false);
        console.log('unchecked');
    }
  });

  var total = 0;
  var list = document.getElementsByName("sub_harga");
  console.log(list);
  var values = [];
  for(var i = 0; i < list.length; ++i) {
      values.push(parseFloat(list[i].value));
  }
  total = values.reduce(function(previousValue, currentValue, index, array){
      return previousValue + currentValue;
  });
  console.log(total);
  document.getElementById("total").innerHTML = "Rp. " + total;   
  $("#total_trs").attr("value", total);  


})(jQuery);