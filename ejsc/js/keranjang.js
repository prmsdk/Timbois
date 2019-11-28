(function ($) {
  "use strict"; // Start of use strict

  $("#select_metode").change(function () {
    $(this).find("input:checked").each(function () {
      var optionValue = $(this).attr("value");
      if (optionValue) {
        $(".box_ukuran").not("#" + optionValue).hide();
        $("#" + optionValue).show();
      } else {
        $(".box_ukuran").hide();
      }
    });

    if((status_user == '0') && ($("#metode_cash").is(':checked'))){
      alert("Mohon Lengkapi data diri anda (FOTO KTP)\n agar dapat melanjutkan transaksi secara Tunai");
      document.getElementById("metode_saldo").checked = true;
      $("#MBY0000001").show();
    }

  }).change();

  var total = 0;
  var list = document.getElementsByName("sub_harga");
  var values = [];
  var saldo = 0;
  var sisa_saldo = 0;
  var status_user = '';

  for(var i = 0; i < list.length; ++i) {
      values.push(parseFloat(list[i].value));
  }
  total = values.reduce(function(previousValue, currentValue, index, array){
      return previousValue + currentValue;
  });

  
  document.getElementById("total").innerHTML = "Rp. " + total;   
  $("#total_trs").attr("value", total);  
  saldo = document.getElementById("saldo_user").value;
  sisa_saldo = saldo - total;

  if(sisa_saldo < 0){
    alert("Saldo anda kurang dari harga yang akan dibayar");
    document.getElementById("metode_cash").checked = true;
    $("#sisa_saldo").attr("value", "0");
  }else{
    document.getElementById("sisa_saldo").innerHTML = "Rp. " + sisa_saldo;
    $("#sisa_saldo").attr("value", sisa_saldo);
  }

  status_user = document.getElementById("status_user").value;
  if((status_user == '0') && ($("#metode_cash").is(':checked'))){
    alert("Mohon Lengkapi data diri anda (FOTO KTP)\n agar dapat melanjutkan transaksi secara Tunai");
    document.getElementById("metode_saldo").checked = true;
    $("#MBY0000001").show();
  }

})(jQuery);