
const firebaseConfig = {
  apiKey: "AIzaSyCA-YhrO1Ib9HB3hkJb-cbGh8tCSn9g4BY",
  authDomain: "leaves-guard.firebaseapp.com",
  projectId: "leaves-guard",
  storageBucket: "leaves-guard.appspot.com",
  messagingSenderId: "916579328793",
  appId: "1:916579328793:web:2ea8881bd061d8fd6bdb88"
};
const app = firebase.initializeApp(firebaseConfig);
// export default firebaseConfig;

// firebase.auth().onAuthStateChanged((user) => {
//         if (user) {
//           var uid = user.uid;
//           window.location.href = "../../pages/home.html";
          
//         } else {
//           window.location.href = "signin.html";
          
//         }
//       });