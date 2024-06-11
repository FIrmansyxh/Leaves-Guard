// Menunggu status autentikasi pengguna
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

// Mendapatkan referensi ke elemen di HTML untuk menampilkan data
var dataList = document.getElementById('dataList');
console.log(dataList);

// Fungsi untuk mendapatkan data dari Firestore
async function getData() {
    try {
        const user = await waitForAuthState();
        const uploadRef = firebase.firestore().collection('data').doc(user.uid).collection('upload');

        const snapshot = await uploadRef.get();
        // console.log(snapshot);
        // Mengosongkan daftar data sebelum menambahkan data baru
        dataList.innerHTML = '';
        snapshot.forEach(doc => {
            const data = doc.data();
            const docId = doc.id;
            const timestamp = data.timestamp ? new Date(data.timestamp.toDate()).toLocaleDateString('en-GB', { day: 'numeric', month: 'long', year: 'numeric' }) : 'Invalid Date';
            dataList.innerHTML += `
                <div class="ticket-card radius-8">
                    <div class="card-title d-flex align-items-center justify-content-between">
                        <p>${timestamp}</p>
                    </div>
                    <div class="card-item d-flex align-items-center gap-16 w-100">
                        <div class="image shrink-0 overflow-hidden radius-8">
                            <img src="${data.fotoURL}" alt="Place" class="img-fluid w-100 h-100 object-fit-cover">
                        </div>
                        <div class="content flex-grow">
                            <h4>${data.label}</h4>
                            <p class="d-flex align-items-center gap-04 location mt-04">
                                Sehat
                            </p>
                        </div>
                    </div>
                    <div class="card-footer d-flex align-items-center">
                        <div class="a1">
                            <a href="upload-hasil.html">Detail</a>
                        </div>
                        <div class="a2">
                            <a data-bs-toggle="modal" data-bs-target="#exampleModal-${docId}">Delete</a>
                        </div>
                    </div>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal-${docId}" tabindex="-1" aria-labelledby="exampleModalLabel-${docId}" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fw-bold fs-5" id="exampleModalLabel-${docId}">Peringatan</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p>Apakah anda ingin menghapus history <b>${data.label}</b>?</p>
                            </div>
                            <div class="modal-footer">
                                <div class="text-center">
                                    <button type="button" class="btn btn-danger" onclick="deleteData('${docId}', '${data.fotoURL}')">Ya</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            `;
        });

    } catch (error) {
        console.error('Error saat mengambil data:', error);
    }
}
async function deleteData(docId, fotoURL) {
    try {
        const user = await waitForAuthState();
        const docRef = firebase.firestore().collection('data').doc(user.uid).collection('upload').doc(docId);
        await docRef.delete();
        const storageRef = firebase.storage().refFromURL(fotoURL);
        await storageRef.delete();

        location.reload();
    } catch (error) {
        console.error('Error saat menghapus data:', error);
    }
}

getData();
