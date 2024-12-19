let currentLvl=parseInt(localStorage.getItem("currentLvl"))||0;

let gambarSoal = document.getElementById('gambar-soal');
let lvl= document.getElementById('level');

class Soal {
    constructor(level, gambar, jawaban) {
        this.level = level;
        this.gambar = gambar; 
        this.jawaban = jawaban;
    }
  
    cekJawaban() {
        let jawaban = document.getElementById('jawab').value;
        jawaban = jawaban.toUpperCase();

        if (jawaban === this.jawaban) {
            window.location.href = "benar.php";
        } else {
            window.location.href = "salah.php";
        }
    }
  }

  function lvlBaru() {
    const soal = daftarSoal[currentLvl];
    gambarSoal.src= soal.gambar;
    lvl.textContent=soal.level;
    document.getElementById('jawab').value = '';
    
  }

  function submit() {
    daftarSoal[currentLvl].cekJawaban();
  }

function nextLvl() {
    currentLvl++;
    localStorage.setItem("currentLvl", currentLvl);
    window.location.href = "bermain.html";

}

function confirmDelete() {
  if (confirm("Are you sure you want to delete your account? This action cannot be undone.")) {
      window.location.href = "<?= base_url('page/deleteAccount') ?>";
  }
}

lvlBaru();
