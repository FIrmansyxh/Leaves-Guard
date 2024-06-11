// firebase.auth().onAuthStateChanged((user) => {
//         if (user) {
//           var uid = user.uid;
//           window.location.href = "../pages/home.html";
          
//         } else {
//           window.location.href = "signin-email.html";
          
//         }
//       });
const loginForm = document.getElementById('loginForm');

      loginForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const email = loginForm['lemail2'].value;
        const password = loginForm['lpass'].value;
        console.log(email);

        // Sign in user with email and password
        firebase.auth().signInWithEmailAndPassword(email, password)
          .then((userCredential) => {
            console.log('User logged in successfully:', userCredential.user.uid);
            // Redirect to dashboard
            window.location.href = "../../pages/home.html";
          })
          .catch((error) => {
            console.error('Error signing in:', error);
          });
      });