const db = firebase.firestore();
        // Mendapatkan informasi pengguna yang sedang login
        firebase.auth().onAuthStateChanged((user) => {
            if (user) {


                db.collection("users").doc(user.uid).get()
                    .then((doc) => {
                        if (doc.exists) {
                            const data = doc.data();
                            document.getElementById("username").textContent = data.username;
                            console.log(data.username);
                        } else {
                            console.log("Data tidak ditemukan!");
                        }
                    })
                    .catch((error) => {
                        console.error("Error getting data:", error);
                    });

            } else {
                console.log("Tidak ada pengguna yang masuk!");
            }
        });