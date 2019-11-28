(function ($) {
  "use strict";

  $("#select_ukuran").change(function () {
    $(this).find("option:selected").each(function () {
      var optionValue = $(this).attr("value");
      if (optionValue) {
        $(".box_ukuran").not("#" + optionValue).hide();
        $("#" + optionValue).show();
      } else {
        $(".box_ukuran").hide();
      }
    });
  }).change();

  $("#select_warna").change(function () {
    $(this).find("option:selected").each(function () {
      var optionValue = $(this).attr("value");
      if (optionValue) {
        $(".box_warna").not("#" + optionValue).hide();
        $("#" + optionValue).show();
      } else {
        $(".box_warna").hide();
      }
    });
  }).change();

  $("#halaman_khusus_tombol").click(function () {

    var jml = document.getElementById('halaman_khusus').value;
    if (!jml.length || jml == 0) {
      alert(jml.value);
    } else {
      // Get template data


      for (var i = 0; i < jml; i++) {
        var div1 = document.createElement('div');
        div1.setAttribute("id", "hal_tambah");
        div1.setAttribute("class", "col-6 my-2");
        div1.innerHTML = document.getElementById('hal_khusus').innerHTML;
        document.getElementById('tambah_hal_khusus').appendChild(div1);
      }

      $("#halaman_khusus").prop('disabled', true);
      $(this).prop("disabled", true);
      $("#halaman_khusus_reset").removeClass("d-none");
    }
  });

  $("#halaman_khusus_reset").click(function () {
    var jml = document.getElementById('halaman_khusus').value;

    for (var i = 0; i < jml; i++) {
      $("#hal_tambah").remove();
    }

    $("#halaman_khusus").prop('disabled', false);
    $("#halaman_khusus").prop('value', "0");
    $("#halaman_khusus_tombol").prop("disabled", false);
    $(this).addClass("d-none");
  });

  $(document).on('click', 'body *', function () {
    var Total = 0;
    var JmlHal = 0;
    var JmlDupli = 0;
    var HrgUkuran = 0;
    var Wrn = 0;
    var JmlWrn = 0;
    var JmlWrnWrn = 0;
    var Htm = 0;
    var JmlHtm = 0;
    var HrgFitur = 0;
    JmlDupli = document.getElementById("jml_dupli").value;
    JmlHal = parseInt(document.getElementById("jml_halaman").value);

    if ($("#HLM0000002").is(':visible')) {
      var HlmAwal = parseInt(document.getElementById("halaman_awal").value);
      var HlmAkhir = parseInt(document.getElementById("halaman_akhir").value);

      if((HlmAkhir > JmlHal) || (HlmAwal > JmlHal)){
        alert("Masukkan Jumlah Halaman yang lebih kecil \ndari Jumlah halaman PDF anda");
        $("#halaman_awal").prop('value', '0');
        $("#halaman_akhir").prop('value', JmlHal);
      }else if(HlmAkhir < HlmAwal){
        alert("Masukkan Jumlah Halaman Akhir yang lebih kecil \ndari Jumlah halaman awal");
        $("#halaman_awal").prop("value", "0");
        $("#halaman_akhir").prop("value", JmlHal);
      }

      JmlHal = HlmAkhir - HlmAwal;
    } else if ($("#HLM0000003").is(':visible')) {
      var HlmSpec = parseInt(document.getElementById("halaman_khusus").value);

      if(HlmSpec > JmlHal){
        alert("Masukkan Jumlah Halaman yang lebih kecil \ndari Jumlah halaman PDF anda");
        $("#halaman_khusus").prop('value', '0');
      }

      JmlHal = HlmSpec;
    } else {
      JmlHal = 0;
      JmlHal = parseInt(document.getElementById("jml_halaman").value);
    }

    $("#select_warna").change(function () {
      $(this).find("option:selected").each(function () {
        Wrn = parseInt($(this).attr("aria-describedby"));
        Htm = Wrn;
      });
    }).change();

    $("#pilih_ukuran").change(function () {
      $(this).find("option:selected").each(function () {
        HrgUkuran = parseInt($(this).attr("aria-describedby"));
      });
    }).change();

    $("#check_fitur").change(function () {
      $(this).find("input:checked").each(function () {
        HrgFitur = parseInt($(this).attr("placeholder"));
      });
    }).change();

    JmlHtm = JmlHal;
    JmlWrn = JmlHal;
    if(document.getElementById('select_warna').value == "WRN0000001"){
      JmlHtm = 0;
      JmlWrn = JmlHal;
    }else if(document.getElementById('select_warna').value == "WRN0000002"){
      JmlHtm = JmlHal;
      JmlWrn = 0;
    }else if(document.getElementById('select_warna').value == "WRN0000003"){
      Htm = 50;
      Wrn = 850;
      JmlWrn = parseInt(document.getElementById("warna_khusus").value);
      
      if(JmlWrn > JmlHal){
        alert("Masukkan Jumlah Halaman Warna yang lebih kecil \ndari Jumlah halaman PDF anda");
        $("#warna_khusus").prop('value', JmlHal);
      }

      JmlHtm = JmlHal - JmlWrn;
    }

    Total = JmlDupli * (((HrgUkuran + Wrn) * JmlWrn) + ((HrgUkuran + Htm) * JmlHtm) + HrgFitur);

    $("#sub_total").prop('value', Total);

    var SubTot = 0;
    var SubTot = document.getElementById("sub_harga")[0].innerHTML;
    console.log(SubTot);

  });

})(jQuery); 
