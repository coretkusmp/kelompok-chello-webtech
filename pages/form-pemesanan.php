<!DOCTYPE html>
<html lang="en">
<!-- Ingat, lansia diskon 10% -->
 
<link rel="stylesheet" href="/style/form.css">
<link rel="stylesheet" href="/style/navbar.css">
<link rel="stylesheet" href="/style/base.css">

<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Document</title>
</head>

<body>
   <?php require __DIR__ . "/../components/navbar.php" ?>

   <form method="post" action="">
      <h3>Form Pemesanan</h3>
      <ul>

         <li>
            <div class="input-box">
               <label>Nama Lengkap</label> <input type="text">
            </div>
         </li>

         <li>
            <div class="input-box">
               <label>Nomor Identitas</label> <input type="text">
            </div>
         </li>

         <li>
            <div class="input-box">
               <label>No. HP</label> <input type="text">
            </div>
         </li>

         <li>
            <div class="input-box">
               <label>Kelas Penumpang</label>
               <select name="class" id="class">
                  <option value="economy">Economy</option>
                  <option value="bussiness">Bussiness</option>
                  <option value="executive">Executive</option>
               </select>
            </div>
         </li>

         <li>
            <div class="input-box">
               <label>Jadwal Keberangkatan</label> <input type="date">
            </div>
         </li>

         <li>
            <div class="input-box"><span>
                  <label>Jumlah Penumpang</label>
                  <label class="tiny-desc"><span>Bukan Lansia (Usia &lt; 60)</span></label>
               </span> <input type="text"></div>
         </li>

         <li>
            <div class="input-box"><span>
                  <label>Jumlah penumpang Lansia</label>
                  <p class="tiny-desc"><span>Usia 60 Tahun ke Atas</span></label>
               </span> <input type="text"></div>
         </li>

         <li>
            <div class="input-box">
               <label>Harga Tiket</label>
               <p id="ticket-price"></label>
            </div>
         </li>

         <li>
            <div class="input-box">
               <p id="total-price">Total Bayar</label>
            </div>
         </li>

      </ul>
      <br>
      <input type="checkbox">
   </form>
</body>

<script src="form.js"></script>

</html>