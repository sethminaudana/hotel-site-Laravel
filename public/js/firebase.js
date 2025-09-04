const firebaseConfig = {
    apiKey: "AIzaSyB47mZhetThFrOR8mlQ99ymysfYDxwd_pU",
    authDomain: "nisalahotel-ee790.firebaseapp.com",
    projectId: "nisalahotel-ee790",
    storageBucket: "nisalahotel-ee790.firebasestorage.app",
    messagingSenderId: "104956357101",
    appId: "1:104956357101:web:750f8704acbab596d79fe4",
    measurementId: "G-8CDCBLM8MV"
};


firebase.initializeApp(firebaseConfig);
const messaging = firebase.messaging();

async function initFirebaseMessagingRegistration() {
    try{
        const permission = await Notification.requestPermission();

        if(permission == "granted"){
            const token = await messaging.getToken({
                vapidKey : "BBpkU9w2skygavPx9bv7HSXUEzayMOd3HuWV7yncMDOBFbTscWwC9RBp8P_TbGWIDz9d1DLM1BBhFCaUrCu1dOw"
            });

            // await fetch("/update-device-token", {
            //     method: "PUT",
            //     headers: {
            //         "Content-Type" : "application/json",
            //         "X-CSRF-TOKEN" : document.querySelector('meta[name="csrf-token"]').content,
            //     },
            //     body: JSON.stringify({fcm_token: token})
            // });


            await fetch("/subscribe-to-topic", {
                method:"POST",
                headers: {
                    "Content-Type" : "application/json",
                    "X-CSRF-TOKEN" : document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    token: token,
                    topic: "admin-reservations",
                })
            });

            console.log("FCM Token registered: ", token); //checking purpose
        }else{
            console.log("Permission not granted for notifications");
        }
    }catch(error){
        console.log("Token Error: ", error);
    }
    
}

initFirebaseMessagingRegistration();


if (Notification.permission !== "granted") {
    Notification.requestPermission().then(permission => {
        console.log("Notification permission:", permission);
    });
}


let isTabHidden = document.hidden;

document.addEventListener("visibilitychange", function() {
    isTabHidden = document.hidden;
});


//Received message when admin is on page
messaging.onMessage((payload) => {
    console.log("Message received: ", payload);


    if(window.handleFirebaseMessage){
        console.log('true');
        window.handleFirebaseMessage(payload);
    }

    const { title, body } = payload.data;

    if(isTabHidden){
        new Notification(title, {
            body: body,
            icon: '/img/logo/favicon.png'
        });

    }else{

        //audio file
        const audio = new Audio('/sounds/notification-sound.mp3');
        audio.play().catch(err => console.log("sound error ", err));

        console.log("📢 Admin is active, showing in-app message:", title);
        Swal.fire({
            icon:'info',
            title: title,
            text: body,
            toast: true,
            position: 'top-end',
            timer: 8000,
            showConfirmButton: false,
        });

    }

});



async function removeFirebaseTokenOnLogout() {
    try{
        const currentToken = await messaging.getToken();

        if(currentToken){
            //delete token from firebase
            await messaging.deleteToken(currentToken);

            // console.log("FCM Token deleted from client");


            // await fetch('/remove-device-token', {
            //     method: 'PUT',
            //     headers: {
            //         'Content-Type': 'application/json',
            //         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
            //     },
            // });

            // console.log("FCM Token removed from backend");


            await fetch('/unsubscribe-from-topic', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                },
                body: JSON.stringify({
                    token: currentToken,
                    topic: 'admin-reservations',
                })
            });

            console.log("unsubscribed to the topic");
        }
    }catch(error){
        console.log("Error removing FCM token", error);
    }
    
}

