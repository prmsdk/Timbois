<?php
include 'includes/config.php'; //mengoneksikan dengan database

if($_POST['edit_profil_user']) {

  $id_user = $_POST['id_user'];
    $nama_user = $_POST['nama_user'];
    $email_user = $_POST['email_user'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];
    $username = $_POST['username'];

  if($_FILES['foto_diri']['name']==null){

    $query = mysqli_query($con, "UPDATE user SET 
    NAMA_USER ='$nama_user', 
    EMAIL_USER = '$email_user', 
    NO_HP_USER = '$no_hp', 
    ALAMAT_USER = '$alamat',
    USERNAME_USER = '$username' where ID_USER = '$id_user'");

    if($query){
        header("location:ubah_profile.php");
    }

  }else{
    $id_user = $_POST['id_user'];
    $ekstensi_boleh = array('png','jpg','jpeg'); //ekstensi file yang boleh diupload
    $nama = $_FILES['foto_diri']['name']; //menunjukkan letak dan nama file yang akan di upload
    $ex = explode ('.',$nama); //explode berfungsi memecahkan/memisahkan string sesuai dengan tanda baca yang ditentukan
    $ekstensi = strtolower(end($ex)); //end = mengambil nilai terakhir dari ex, dtrtolower = memanipulasi string menjadi huruf kecil 
    $ukuran = $_FILES['foto_diri']['size']; //untuk mendapatkan ukuran file yang diupload
    $file_temporary = $_FILES['foto_diri']['tmp_name']; //untuk mendapatkan temporary file yang di upload
        if(in_array($ekstensi,$ekstensi_boleh)===true){
            if($ukuran < 3132210){ 
                move_uploaded_file($file_temporary, 'img/foto_diri/'.$nama); //untuk upload file
                // $query = mysqli_query ($koneksi, "SELECT * FROM user");
                        $query = mysqli_query($con, "UPDATE user SET 
                        NAMA_USER ='$nama_user', 
                        EMAIL_USER = '$email_user', 
                        NO_HP_USER = '$no_hp', 
                        ALAMAT_USER = '$alamat',
                        USERNAME_USER = '$username',
                        FOTO_IDENTITAS = '$nama',
                        STATUS_USER = '1'
                        where ID_USER = '$id_user'");

                        if($query){
                            header("location:ubah_profile.php");
                        }else{
                        echo "MAAF...., UPLOAD GAGAL";
                    }
            }else{
                echo "UKURAN FILE TERLALU BESAR";
            }
        }else{
            echo "FILE TIDAK SESUAI DENGAN EKSTENSI YANG DIBERIKAN";
        }
      }
}

?>