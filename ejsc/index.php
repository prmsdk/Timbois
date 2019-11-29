<?php
  include 'includes/config.php';
  require 'includes/header.php';
?>

  <!-- Header -->
  <header class="masthead">
    <div class="container">
      <div class="intro-text">
        <div class="intro-lead-in">Buah Print</div>
        <div class="intro-heading text-uppercase">Cetak Cepet Tanpa Ribet</div>
        <a class="btn btn-primary text-dark btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>
      </div>
    </div>
  </header>

  <!-- Services -->
  <section class="page-section" id="services">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Pelayanan</h2>
          <!--<h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>-->
        </div>
      </div>
      <div class="row text-center">
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <!--<i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-shopping-cart fa-stack-1x fa-inverse"></ i>--><img src="img/macet1.png">
          </span>
          <h4 class="service-heading">Mudah</h4>
          <p class="text-muted">Anda dapat dengan mudah mencetak dokumen, hanya dengan mengirim file ke Buah Print dan sekaligus melakukan transaksi didalamnya.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <!--<i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-laptop fa-stack-1x fa-inverse"></i>--><img src="img/cepat1.png">
          </span>
          <h4 class="service-heading">Cepat</h4>
          <p class="text-muted">Anda dapat memantau secara realtime melalui browser, dan datang ke tempat mencetak dokumen jika proses di Buah Print telah selesai.</p>
        </div>
        <div class="col-md-4">
          <span class="fa-stack fa-4x">
            <!--<i class="fas fa-circle fa-stack-2x text-primary"></i>
            <i class="fas fa-lock fa-stack-1x fa-inverse"></i>--><img src="img/aman1.png">
          </span>
          <h4 class="service-heading">Aman</h4>
          <p class="text-muted">Anda mendapat jaminan bahwa dokumen yang anda kirim, sampai ke mitra Buah Print, dan perangkat penyimpanan anda akan aman dari virus.</p>
        </div>
      </div>
    </div>
  </section>

  <!-- Portfolio Grid -->
  <section class="bg-light page-section" id="portfolio">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Produk</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-md-4 col-sm-6 portfolio-item">
          <div class="portfolio-link">
            <img class="img-fluid" src="img/portfolio/produk4.jpg" alt="">
          </div>
          <div class="portfolio-caption">
            <!--<p class="text-muted"></p>-->
            <a href="#team" class="btn btn-primary btn-block text-uppercase js-scroll-trigger">Pesan</a>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link" href="#portfolioModal2">
              <div class="portfolio-hover-content">
                <!--<i class="fas fa-plus fa-3x"></i>-->
              </div>
            <img class="img-fluid" src="img/portfolio/produkdokumen.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <a href="#team" class="btn btn-primary btn-block text-uppercase js-scroll-trigger">Pesan</a>
          </div>
        </div>
        <div class="col-md-4 col-sm-6 portfolio-item">
          <a class="portfolio-link"  href="#portfolioModal3">
              <div class="portfolio-hover-content">
                <!--<i class="fas fa-plus fa-3x"></i>-->
              </div>
            <img class="img-fluid" src="img/portfolio/produkkertas.jpg" alt="">
          </a>
          <div class="portfolio-caption">
            <a href="#team" class="btn btn-primary btn-block text-uppercase js-scroll-trigger">Pesan</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- About -->
  <section class="page-section" id="about">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Cara Pemesanan</h2>
          <h3 class="section-subheading text-muted"></h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <ul class="timeline">
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/1.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="subheading">Kunjungi Website</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Kunjungi website Buah Print di www.buahprint.com, anda dapat membuat akun di Buah Print sebelum login. 
                  Anda diberikan hak untuk dapat melihat profil mitra yang telah bergabung.</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/2.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="subheading">Pesan</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Pemesanan dapat dilakukan kepada mitra Buah Print, dengan cara mengunggah file yang ingin dicetak beserta deskripsi. 
                  Anda dapat memilih jenis ketas, warna, pilihan halaman, dan fitur tambahan lainnya.</p>
                </div>
              </div>
            </li>
            <li>
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/3.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="subheading">Bayar</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Demi kenyamanan bersama kami sarankan anda melakukan pembayaran dengan saldo. Anda dapat mengisi saldo buah print melalui mitra Buah Print. 
                  Buah Print juga memberikan kemudahan pada transaksi tunai, dengan jaminan foto KTP, SIM atau KTM.</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <img class="rounded-circle img-fluid" src="img/about/4.jpg" alt="">
              </div>
              <div class="timeline-panel">
                <div class="timeline-heading">
                  <h4 class="subheading">Ambil</h4>
                </div>
                <div class="timeline-body">
                  <p class="text-muted">Anda dapat melihat antrian, waktu tunggu dan waktu proses cetak dokumen anda. Anda juga akan menerima notifikasi jika dokumen anda selesai dicetak. 
                  Segera ambil dokumen anda, dan berikan rating serta komentar atas pelayan mitra Buah Print</p>
                </div>
              </div>
            </li>
            <li class="timeline-inverted">
              <div class="timeline-image">
                <h4>Be Part
                  <br>Of Our
                  <br>Story!</h4>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </div>
  </section>

  <!-- Team -->
  <section class="bg-light page-section" id="team">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="mt-0 text-uppercase">Pilih Mitra</h2>
        </div>
      </div>
      <div class="row justify-content-center">
        <div class="col-md-10 text-center">
          <select id="select_mitra" name="select_mitra" class="custom-select text-center mx-auto w-50 mb-3 custom-select">
            <option placeholder="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.4008053365583!2d113.71077901414725!3d-8.162311784041313!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd69435769695b7%3A0x5dddfddd9a95434e!2sBakorwil%20V%20Jember!5e0!3m2!1sid!2sid!4v1574911414476!5m2!1sid!2sid" selected>Pilih Mitra</option>
            <?php
            $result_mitra = mysqli_query($con, "SELECT * FROM mitra WHERE
            mitra.STATUS_MITRA = 2");
            while($data_mitra = mysqli_fetch_assoc($result_mitra)){
            $iframe = $data_mitra['LOCATION_MITRA'];
            $id_mitra = $data_mitra['ID_MITRA'];
            $nama_mitra = $data_mitra['NAMA_MITRA'];
            ?>
            <option 
            <?php
            $result_count = mysqli_query($con, "SELECT COUNT(*) FROM transaksi, mitra, detail_pemesanan
            WHERE
            transaksi.ID_TRANSAKSI = detail_pemesanan.ID_TRANSAKSI AND
            transaksi.ID_MITRA = mitra.ID_MITRA AND
            mitra.ID_MITRA = '$id_mitra'");
            $data_count = mysqli_fetch_assoc($result_count);
            $count = $data_count['COUNT(*)'];
            ?>
            placeholder="<?=$iframe?>" count="<?=$count?>" value="<?=$id_mitra?>"><?=$nama_mitra?></option>
            <?php }?>
          </select><br>
          <label>Estimasi Waktu Antrian : </label>
          <label id="estimasi"></label>
          <iframe id="iframe" src="" width="800" height="350" frameborder="0" style="border:0;" class="border" allowfullscreen=""></iframe><br>
          <a href="" id="link_mitra" class="mt-2 btn btn-outline-primary btn-lg text-dark" >Pilih Mitra</a>
        </div>
      </div>
      <!-- <div class="row">
        <div class="col-lg-8 mx-auto text-center">
          <p class="large text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aut eaque, laboriosam veritatis, quos non quis ad perspiciatis, totam corporis ea, alias ut unde.</p>
        </div>
      </div> -->
    </div>
  </section>

  <!-- Contact -->
  <section class="page-section" id="contact">
    <div class="container">
      <div class="row">
        <div class="col-lg-12 text-center">
          <h2 class="section-heading text-uppercase">Contact Us</h2>
          <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
        </div>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <form id="contactForm" name="sentMessage" novalidate="novalidate">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group">
                  <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address.">
                  <p class="help-block text-danger"></p>
                </div>
                <div class="form-group">
                  <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number.">
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                  <p class="help-block text-danger"></p>
                </div>
              </div>
              <div class="clearfix"></div>
              <div class="col-lg-12 text-center">
                <div id="success"></div>
                <button id="sendMessageButton" class="btn btn-primary text-dark btn-xl text-uppercase" type="submit">Send Message</button>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>

<?php
  require 'includes/footer.php';
?>