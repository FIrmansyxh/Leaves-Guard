document.addEventListener('DOMContentLoaded', function() {
    // firebase.auth().onAuthStateChanged((user) => {
    //     if (user) {
    //       var uid = user.uid;
          
    //     } else {
    //     }
    //   });
      
    const email = document.querySelector("#remail2");
    const password = document.querySelector("#rcpass");

    const registerBtn = document.querySelector(`[data-button="register"]`);
    const loginBtn = document.querySelector(`[data-button="login"]`);
    const forgotBtn = document.querySelector(`[data-button="forgot"]`);

    // registerBtn.addEventListener('click', () => {
    //     firebase.auth().createUserWithEmailAndPassword(email.value, password.value)
    //     .then((cred) => {
    //         alert(`Berhasil Membuat Akun ${cred.user.uid}`);
    //     })
    //     .catch((error) => {
    //         alert(error.message);
    //     });
    // });

    // loginBtn.addEventListener('click', () => {
    //     firebase.auth().signInWithEmailAndPassword(email.value, password.value)
    //     .then((cred) => {
    //         alert(`Selamat Datang Akun: ${cred.user.uid}`);
    //     })
    //     .catch((error) => {
    //         alert(error.message);
    //     });
    // });
});
