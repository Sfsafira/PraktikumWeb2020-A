<!--Tag pembuka HTML-->
<html lang="en">
<!--Tag untuk menuliskan tag-tag yang akan dibaca oleh mesin-->
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--Untuk menampilkan judul di title bar browser -->
  <title>Data Mahasiswa</title>
  <!--Untuk menghubungkan halaman web ke halaman css berjudul style.css -->
  <link rel="stylesheet" href="style.css"/>
</head>
<!--Untuk mendefinisikan badan dokumen dan wadah untuk semua konten yang terlihat-->
<body>
  <!--Sebagi judul dari form pada halaman-->
  <h1 align="center">DATA MAHASISWA</h1>
<?php
    //Untuk set error
    ini_set("error_reporting", 0);
    //Untuk memulai sesi
    session_start();
    //Untuk menimpan data setelah user mengklik submit
    if(isset($_POST['submit'])){
        //Untuk menampung data dan nilai dari form
        $data = array();
        $data['nama'] = $_POST['nama'];
        $data['nim'] = $_POST['nim'];
        $data['jurusan'] = $_POST['jurusan'];
        $data['semester'] = $_POST['semester'];
        $data['nilai1'] = $_POST['nilai1'];
        $data['nilai2'] = $_POST['nilai2'];
        $data['nilai3'] = $_POST['nilai3'];
        $data['nilai4'] = $_POST['nilai4'];
        $data['rata2'] = $_POST['rata2'];
        
        $data['total'] = $data['nilai1'] + $data['nilai2'] + $data['nilai3'] + $data['nilai4'];
        $data['rata2'] = $data['total'] / 4;

        //Untuk membaca dan memasukkan data ke session
        if($_SESSION['data_mahasiswa']){
            $data_mahasiswa = $_SESSION['data_mahasiswa'];
            array_push($data_mahasiswa,$data);
            $_SESSION['data_mahasiswa'] = $data_mahasiswa;
        }else{
            $_SESSION['data_mahasiswa'][] = $data;
        }
        header("location: ./index.php");
    }
    if($_SESSION['data_mahasiswa']){ 
?>
    <!--Buntton untuk menambah data-->
    <button class="button"><a href='?act=add'>TAMBAHKAN DATA</a><br></button>
    <br><br>
    <!--Tabel untuk mencetak hasil data mahasiswa-->
    <table align="center" border="1" width="100%">
        <tr bgcolor="red">
            <th>No</th>
            <th>Nama Mahasiswa</th>
            <th>NIM</th>
            <th>Jurusan</th>
            <th>Semester</th>
            <th>Nilai 1</th>
            <th>Nilai 2</th>
            <th>Nilai 3</th>
            <th>Nilai 4</th>
            <th>Rata-Rata Nilai</th>
            <th colspan="2">Hapus Data</th>
       </tr>
    <!--Untuk memberikan dan membaca nilai pada setiap baris sesuai dengan urutan kolom-->
    <?php $no=0; foreach ($_SESSION['data_mahasiswa'] as $key => $value) { $no++; ?>
        <tr align="center">
            <td><?php echo $no;?></td>
            <td><?php echo $value['nama'];?></td>
            <td><?php echo $value['nim'];?></td>
            <td><?php echo $value['jurusan'];?></td>
            <td><?php echo $value['semester'];?></td>
            <td><?php echo $value['nilai1'];?></td>
            <td><?php echo $value['nilai2'];?></td>
            <td><?php echo $value['nilai3'];?></td>
            <td><?php echo $value['nilai4'];?></td>
            <td><?php echo $value['rata2'];?></td>
            <!--Button untuk menghapus baris data pada tabel-->
            <td><button class="button" type="button" onclick="window.location='index.php?act=delete&id=<?php echo $key;?>'">Hapus</button></td>
        </tr>
    <?php } ?> 
    <!--Tag penutup tabel-->
    </table>

    <?php 
    }else{?>
        <p align="center">DATA MASIH KOSONG, SILAHKAN TAMBAHKAN DATA</p>
        <br>
        <!--Button untuk menambahkan data mahasiswa-->
        <button class='button'><a href='?act=add'>TAMBAHKAN DATA</a></button>
    <?php
    }
    
    //Sebagi menu untuk menambah dan menghapus data
    switch($_GET['act']){
        //Menu untuk menginputkan data
        case "add":
            $form = "<p><form action='' method='post'>";
            $form .= "Nama Mahasiswa : <input type='text' name='nama'>";
            $form .= "NIM : <input type='text' name='nim'>";
            $form .= "Jurusan : <input type='text' name='jurusan'>";
            $form .= "Semester : <input type='text' name='semester'>";
            $form .= "Nilai 1 : <input type='number' name='nilai1'>";
            $form .= "Nilai 2 : <input type='number' name='nilai2'>";
            $form .= "Nilai 3 : <input type='number' name='nilai3'>";
            $form .= "Nilai 4 : <input type='number' name='nilai4'>";
            $form .= "<input type='submit' name='submit'></form>";
            echo $form;
        break;
        //Menu untuk menghapus data
        case "delete":
            $id = $_GET['id'];
            unset($_SESSION['data_mahasiswa'][$id]);
            header("location: ./index.php");
        break;

        case "default":
        break;
    }
    ?>
</body>
</html>