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
          <div class="fotoClassPenumpang">
            <img id="classImage" style="width: 700px;" src="https://www.ana.co.jp/www2/travel-information/cabin/a380-economy-class/small-01.jpg" alt="Class Image">
          </div>
         </li>

         <li>
            <div class="input-box">
               <label>Jadwal Keberangkatan</label> <input type="date">
            </div>
         </li>

         <li>
            <div class="input-box"><span>
                <div class="label-wrapper">
                  <label>Jumlah Penumpang</label>
                  <label class="tiny-desc"><span>Bukan Lansia (Usia &lt; 60)</span></label>
                  </div>
                </span> <input type="text"></div>
         </li>

         <li>
            <div class="input-box"><span>
                <div class="label-wrapper">
                  <label>Jumlah penumpang Lansia</label>
                  <label class="tiny-desc"><span>Usia 60 Tahun ke Atas</span></label>
                  </div>
                </span> <input type="text"></div>
         </li>

         <li>
            <div class="input-box">
               <label>Harga Tiket</label>
               <label id="ticket-price"></label>
            </div>
         </li>

         <li>
            <div class="input-box">
               <label>Total Bayar</label>
               <label id="total-price"></label>
            </div>
         </li>

      </ul>
      <br>
      <div class="checkbox-style">
         <input type="checkbox"> 
         <label>Saya dan&#47atau rombongan telah membaca, memahami, dan setuju berdasarkan syarat dan ketentuan yang telah ditetapkan</label>
      </div>

      <div class="buttons">
         <a href="#"><button class="btn">Hitung Total Bayar</button></a>
         <a href="#"><button class="btn">Pesan Tiket</button></a>
         <a href="#"><button class="btn">Cancel</button></a>
         <a href="#"><button id="btnTombolBayar">Hitung Total Bayar</button></a>
         <a href="#"><button>Pesan Tiket</button></a>
         <a href="#"><button>Cancel</button></a>
      </div>

   </form>
</body>

<script src="/script/form.js"></script>

</html>