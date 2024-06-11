const db = firebase.firestore();
        // Mendapatkan informasi pengguna yang sedang login
        firebase.auth().onAuthStateChanged((user) => {
            if (user) {
                const urlParams = new URLSearchParams(window.location.search);
                const docId = urlParams.get('id');

                db.collection("users").doc(user.uid).get()
                    .then((doc) => {
                        if (doc.exists) {
                            const data = doc.data();
                            document.getElementById("username").value = data.username;
                            if(data.fotoProfile){
                                document.getElementById("img-profile").src = data.fotoProfile;
                            }
                        } else {
                            console.log("Data tidak ditemukan!");
                        }
                    })
                    .catch((error) => {
                        console.error("Error getting data:", error);
                    });

                document.getElementById("editForm").addEventListener("submit", (e) => {
                    e.preventDefault();
                    const username = document.getElementById("username").value;
                    

                    db.collection("users").doc(user.uid).update({
                        username: username
                    })
                    .then(() => {
                        console.log("Data successfully updated!");
                        window.location.href = "user-profile.html";
                    })
                    .catch((error) => {
                        console.error("Error updating data: ", error);
                    });
                });
            } else {
                console.log("Tidak ada pengguna yang masuk!");
            }
        });