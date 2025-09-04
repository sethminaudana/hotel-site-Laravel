importScripts("https://www.gstatic.com/firebasejs/11.10.0/firebase-app-compat.js");
importScripts("https://www.gstatic.com/firebasejs/11.10.0/firebase-messaging-compat.js");

console.log("check 2");

firebase.initializeApp({
    apiKey: "AIzaSyB47mZhetThFrOR8mlQ99ymysfYDxwd_pU",
    authDomain: "nisalahotel-ee790.firebaseapp.com",
    projectId: "nisalahotel-ee790",
    storageBucket: "nisalahotel-ee790.firebasestorage.app",
    messagingSenderId: "104956357101",
    appId: "1:104956357101:web:750f8704acbab596d79fe4",
    measurementId: "G-8CDCBLM8MV"
});

const messaging = firebase.messaging();
console.log("out");
// alert('3');
messaging.onBackgroundMessage(function (payload) {
  console.log('[firebase-messaging-sw.js] Background message:', payload);

//   const notificationTitle = payload.data.title || 'New Notification';
  const notificationTitle = payload.data.title;
  const notificationOptions = {
    body: payload.data.body,
    icon: 'img/logo/favicon.png',
    badge: 'img/logo/favicon.png',
    data: {
      click_action: payload.notification.click_action || '/rooms'
    }
  };


  self.registration.showNotification(notificationTitle, notificationOptions);
});


self.addEventListener('notificationclick', function(event) {
  event.notification.close();
  const click_action = event.notification.data?.click_action || '/';
  event.waitUntil(clients.openWindow(click_action));
});