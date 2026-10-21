document.addEventListener("DOMContentLoaded", () => {
 const form = document.querySelector("form");

 const ticketPrices = {
  economy: 100000,
  bussiness: 200000,
  executive: 300000
 };

 const passengerClass = document.getElementById("class");
 const ticketPrice = document.getElementById("ticket-price");
 const totalPrice = document.getElementById("total-price");

 const inputs = form.querySelectorAll("input");

 const nameInput = inputs[0];
 const identityInput = inputs[1];
 const phoneInput = inputs[2];
 const dateInput = inputs[3];
 const regularPassengerInput = inputs[4];
 const elderlyPassengerInput = inputs[5];
 const agreementCheckbox = inputs[6];

 const buttons = form.querySelectorAll(".buttons button");
 const calculateButton = buttons[0];
 const orderButton = buttons[1];
 const cancelButton = buttons[2];

 function formatRupiah(number) {
  return new Intl.NumberFormat("id-ID", {
   style: "currency",
   currency: "IDR",
   minimumFractionDigits: 0
  }).format(number);
 }

 function updateTicketPrice() {
  const selectedClass = passengerClass.value;
  const price = ticketPrices[selectedClass];

  ticketPrice.textContent = formatRupiah(price);

  calculateTotal();
 }

 function calculateTotal() {
  const selectedClass = passengerClass.value;
  const price = ticketPrices[selectedClass];

  const regularPassengers =
   parseInt(regularPassengerInput.value) || 0;

  const elderlyPassengers =
   parseInt(elderlyPassengerInput.value) || 0;

  const elderlyPrice = price * 0.9;

  const regularTotal = regularPassengers * price;
  const elderlyTotal = elderlyPassengers * elderlyPrice;

  const total = regularTotal + elderlyTotal;

  if (selectedClass === "none") {
   totalPrice.textContent = "Rp 0";
   ticketPrice.textContent = "Rp 0";
  } else {
   totalPrice.textContent = `${formatRupiah(total)}`;
  }

  // totalPrice.textContent = `${formatRupiah(total)}`;

  return total;
 }

 function validatePassengerInput(input) {
  let value = parseInt(input.value);

  if (isNaN(value) || value < 0) {
   input.value = 0;
  }
 }

 regularPassengerInput.addEventListener("input", () => {
  validatePassengerInput(regularPassengerInput);
  // calculateTotal();
 });

 btnTombolBayar.addEventListener("click", (event) => {
  event.preventDefault();
  updateTicketPrice();
  calculateTotal();
 });

 elderlyPassengerInput.addEventListener("input", () => {
  validatePassengerInput(elderlyPassengerInput);
  // calculateTotal();
 });

 passengerClass.addEventListener("change", () => {
  const selectedClass = passengerClass.value;
  const price = ticketPrices[selectedClass];

  if (selectedClass === "none") {
   ticketPrice.textContent = "-";
   classImage.style.display = "none";
  } else {
   ticketPrice.textContent = formatRupiah(price);
   classImage.style.display = "block";
  }

  if (selectedClass === "economy") {
   classImage.src =
    "https://www.ana.co.jp/www2/travel-information/cabin/a380-economy-class/small-01.jpg";
  } else if (selectedClass === "bussiness") {
   classImage.src =
    "https://statik.tempo.co/data/2021/11/16/id_1066782/1066782_720.jpg";
  } else if (selectedClass === "executive") {
   classImage.src =
    "https://awsimages.detik.net.id/customthumb/2014/11/13/1382/082709_seatoman.jpg?w=600&q=90";
  }
 });

 calculateButton.addEventListener("click", (event) => {
  event.preventDefault();

  // calculateTotal();
 });

 orderButton.addEventListener("click", (event) => {
  event.preventDefault();

  const name = nameInput.value.trim();
  const identity = identityInput.value.trim();
  const phone = phoneInput.value.trim();
  const date = dateInput.value;
  const regularPassengers =
   parseInt(regularPassengerInput.value) || 0;
  const elderlyPassengers =
   parseInt(elderlyPassengerInput.value) || 0;

  if (name === "") {
   alert("Nama Lengkap harus diisi!");
   nameInput.focus();
   return;
  }

  if (identity === "") {
   alert("Nomor Identitas harus diisi!");
   identityInput.focus();
   return;
  }

  if (phone === "") {
   alert("Nomor HP harus diisi!");
   phoneInput.focus();
   return;
  }

  if (date === "") {
   alert("Jadwal Keberangkatan harus dipilih!");
   dateInput.focus();
   return;
  }

  if (regularPassengers + elderlyPassengers <= 0) {
   alert("Jumlah penumpang minimal 1 orang!");
   regularPassengerInput.focus();
   return;
  }

  if (!agreementCheckbox.checked) {
   alert(
    "Anda harus menyetujui syarat dan ketentuan terlebih dahulu!"
   );
   agreementCheckbox.focus();
   return;
  }

  const total = calculateTotal();

  const selectedClass =
   passengerClass.options[passengerClass.selectedIndex].text;

  const confirmation = confirm(
   `Konfirmasi Pemesanan\n\n` +
   `Nama: ${name}\n` +
   `Kelas: ${selectedClass}\n` +
   `Tanggal: ${date}\n` +
   `Penumpang biasa: ${regularPassengers}\n` +
   `Penumpang lansia: ${elderlyPassengers}\n` +
   `Total Bayar: ${formatRupiah(total)}\n\n` +
   `Apakah data sudah benar?`
  );

  if (confirmation) {
   alert("Pemesanan tiket berhasil!");
  }
 });

 cancelButton.addEventListener("click", (event) => {
  event.preventDefault();

  const confirmation = confirm(
   "Apakah Anda yakin ingin membatalkan pemesanan?"
  );

  if (confirmation) {
   form.reset();

   ticketPrice.textContent = formatRupiah(
    ticketPrices[passengerClass.value]
   );

   totalPrice.textContent = "Total Bayar: Rp0";
  }
 });

 regularPassengerInput.addEventListener("keydown", (event) => {
  if (
   !/[0-9]/.test(event.key) &&
   event.key !== "Backspace" &&
   event.key !== "Delete" &&
   event.key !== "ArrowLeft" &&
   event.key !== "ArrowRight" &&
   event.key !== "Tab"
  ) {
   event.preventDefault();
  }
 });

 elderlyPassengerInput.addEventListener("keydown", (event) => {
  if (
   !/[0-9]/.test(event.key) &&
   event.key !== "Backspace" &&
   event.key !== "Delete" &&
   event.key !== "ArrowLeft" &&
   event.key !== "ArrowRight" &&
   event.key !== "Tab"
  ) {
   event.preventDefault();
  }
 });

 regularPassengerInput.value = 0;
 elderlyPassengerInput.value = 0;

 passengerClass.value = "none";
 classImage.style.display = "none";
 updateTicketPrice();
});