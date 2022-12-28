// Import the functions you need from the SDKs you need
import { initializeApp } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-app.js";
import { getAnalytics } from "https://www.gstatic.com/firebasejs/9.15.0/firebase-analytics.js";
// TODO: Add SDKs for Firebase products that you want to use
// https://firebase.google.com/docs/web/setup#available-libraries

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyAix36RQrdB9xNQN4750FapE2PqSJEPrQs",
  authDomain: "blueoceanshipping-f8b49.firebaseapp.com",
  projectId: "blueoceanshipping-f8b49",
  storageBucket: "blueoceanshipping-f8b49.appspot.com",
  messagingSenderId: "610734436548",
  appId: "1:610734436548:web:022aaf22bfeb294c159991",
  measurementId: "G-0FJFJ2EY8Y"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const analytics = getAnalytics(app);