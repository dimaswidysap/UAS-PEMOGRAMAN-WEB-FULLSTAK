const inputRoom = document.getElementById("search-room");
const cards = document.querySelectorAll(".container-room");
// Ambil elemen pesan kosong yang tadi dibuat
const noMatchMessage = document.getElementById("no-match-message");

inputRoom.addEventListener("input", function () {
    let input = this.value.toLowerCase();

    // Variabel untuk menghitung berapa card yang cocok
    let matchCount = 0;

    cards.forEach(function (card) {
        let cardText = card.textContent.toLowerCase();

        if (cardText.includes(input)) {
            card.style.display = "";
            matchCount++; // Tambah 1 jika ada card yang cocok
        } else {
            card.style.display = "none";
        }
    });

    // Jika matchCount tetap 0 setelah looping selesai, artinya tidak ada data yang cocok
    if (matchCount === 0) {
        noMatchMessage.style.display = "block"; // Tampilkan pesan "Oops..."
    } else {
        noMatchMessage.style.display = "none"; // Sembunyikan pesan jika ada data
    }
});
