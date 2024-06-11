// Fungsi untuk menunggu status autentikasi pengguna
async function waitForAuthState() {
    return new Promise((resolve, reject) => {
      const unsubscribe = firebase.auth().onAuthStateChanged((user) => {
        unsubscribe(); // Berhenti mendengarkan perubahan status autentikasi
        if (user) {
          resolve(user); // Pengguna masuk
        } else {
          reject(new Error('Tidak ada pengguna yang masuk')); // Tidak ada pengguna yang masuk
        }
      });
    });
  }
  
// Mendapatkan referensi ke elemen form dengan ID 'uploadForm'
var form = document.getElementById('uploadForm');

// Tambahkan event listener untuk submit form
form.addEventListener('submit', async (e) => {
    e.preventDefault();

    try {
        // Menunggu status autentikasi pengguna
        const user = await waitForAuthState();

        // Membuat objek FormData dari form
        var formData = new FormData(form);

        // Mengambil nilai dari input 'foto'
        var file = formData.get('photoFile');

        // Upload file ke Firebase Storage
        if (file) {
            const db = firebase.firestore();
            // Membuat referensi untuk menyimpan file ke Firebase Storage
            const storageRef = firebase.storage().ref('images/' + file.name);
            storageRef.put(file)
            .then((snapshot) => {
                // Mendapatkan URL file yang diunggah
                return snapshot.ref.getDownloadURL();
            })
            .then((downloadURL) => {
                // Menyimpan data ke Firestore
                return db.collection('data').doc(user.uid).collection('upload').doc(formData.get('photoLabel')).set({
                  label: formData.get('photoLabel'),
                  fotoURL: downloadURL, // Menyimpan URL foto
                  timestamp: firebase.firestore.FieldValue.serverTimestamp() // Menyimpan timestamps
              });
            })
            .then(() => {
                // Menampilkan pesan upload sukses
                document.getElementById('uploadStatus').innerText = 'Upload sukses!';
                form.reset();
            })
            .catch((error) => {
                // Menampilkan pesan upload gagal
                document.getElementById('uploadStatus').innerText = 'Upload gagal. Silakan coba lagi.';
                console.error('Error saat upload:', error);
            });
        }
    } catch (error) {
        // Tidak ada pengguna yang masuk
        console.log(error.message);
    }
});
