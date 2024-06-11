const firebaseConfig = {
    apiKey: "AIzaSyCA-YhrO1Ib9HB3hkJb-cbGh8tCSn9g4BY",
    authDomain: "leaves-guard.firebaseapp.com",
    projectId: "leaves-guard",
    storageBucket: "leaves-guard.appspot.com",
    messagingSenderId: "916579328793",
    appId: "1:916579328793:web:2ea8881bd061d8fd6bdb88"
  };
firebase.initializeApp(firebaseConfig);
document.addEventListener('DOMContentLoaded', () => {

    const db = firebase.firestore();

    const registerForm = document.getElementById('registerForm');

    registerForm.addEventListener('submit', (e) => {
        e.preventDefault();
        const username = registerForm['fname'].value;
        const email = registerForm['remail2'].value;
        const password = registerForm['rcpass'].value;

        // Register the user with email and password
        firebase.auth().createUserWithEmailAndPassword(email, password)
            .then((userCredential) => {
                // Add username to Firestore
                return db.collection('users').doc(userCredential.user.uid).set({
                    username: username,
                    email: email
                });
            })
            .then(() => {
                console.log('User registered successfully!');
                alert('User registered successfully!');
                // Redirect to login page or dashboard
                window.location.href = "signin.html";
            })
            .catch((error) => {
                console.error('Error registering user:', error);
            });
    });
});
