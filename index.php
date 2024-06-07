<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Rental Motor</title>
</head>
<body>
   <center>
      <h2>Rental Motor</h2>
      <table>
            <form action="" method="post">
               <tr>
                  <td>Nama Pelanggan</td>
                  <td>:</td>
                  <td><input type="text" name="nama"></td>
               </tr>
               <tr>
                  <td>Lama Waktu Rental (per hari)</td>
                  <td>:</td>
                   <td><input type="text" name="lamaRental"></td>
               </tr>
               <tr>
                  <td>Jenis Motor</td>
                  <td>:</td>
                  <td>
                     <select name="jenis" required>
                        <option value="Beat">Motor Beat</option>
                        <option value="Vario"> Motor Vario</option>
                        <option value="Aerox">Motor Aerox</option>
                        <option value="Scoopy">Motor Scoopy</option>
                     </select>
                  </td>
               </tr>
               <tr>
                  <td></td>
                  <td></td>
                  <td><input type="submit" value="Submit" name="submit"></td>
               </tr>
            </form>
      </table>
      <div style="border: 1px solid black; width: 40%; padding: 10px; margin: 10px;">
      <?php 
      include 'logic.php';
      $proses = new Rental();
      $proses->setHarga(50000, 100000, 120000, 150000);
      if(isset($_POST['submit'])){
         $proses->member = $_POST['nama'];
         $proses->jenis = $_POST['jenis'];
         $proses->waktu = $_POST['lamaRental'];

         $proses->pembayaran();;
      }
      ?>
      </div>
   </center>
</body>
</html>