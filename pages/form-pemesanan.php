<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="/style/navbar.css">
<link rel="stylesheet" href="/style/base.css">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php require __DIR__ . "/../components/navbar.php"?>

    <form method="post" action="">
        <h3>Form Pemesanan</h3>
        <ul>
            <li><div class="input-box"><p>Nama Lengkap</p> <input type="text"></div></li>
            <li><div class="input-box"><p>Nomor Identitas</p> <input type="text"></div></li>
            <li><div class="input-box"><p>No. HP</p> <input type="text"></div></li>
            <li><div class="input-box"><p>Kelas Penumpang</p> 
                                        <select name="class" id="class">
                                            <option value="economy">Economy</option>
                                            <option value="bussiness">Bussiness</option>
                                            <option value="executive">Executive</option>
                                        </select>
                </div></li>
            
            <li><div class="input-box"><p>Jadwal Keberangkatan</p> <input type="date"></div></li>
            <li><div class="input-box"><span><p>Jumlah Penumpang</p> <p class="tiny-desc">Bukan Lansia()</p></span> <input type="text"></div></li>
            <li><div class="input-box"><span><p>Jumlah penumpang Lansia</p> <p class="tiny-desc"></p></span> <input type="text"></div></li>
        </ul>
    </form>
</body>
<script src="form.js"></script>
</html>