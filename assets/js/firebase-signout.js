const signOutButton = document.getElementById('signOutButton');

signOutButton.addEventListener('click', () => {
    firebase.auth().signOut()
        .then(() => {
            console.log("Sign out berhasil");
            window.location.href = "../../pages/auth/signin.html";
        })
        .catch((error) => {
            console.error("Error saat sign out:", error);
        });
});
