
window.ReverbSocket = (() => {
    let socket;

    function connect() {
        if (!socket || socket.readyState === WebSocket.CLOSED) {
            socket = new WebSocket(`ws://localhost:8080/app/{{ env('REVERB_APP_KEY') }}?protocol=7&client=js&version=7.0.3`);

            socket.onopen = () => {
                console.log("✅ Connected to WebSocket server");

                socket.send(JSON.stringify({
                    event: "pusher:subscribe",
                    data: {
                        channel: "reservation-channel"
                    }
                }));
            };
        }

        return socket;
    }

    return {
        getSocket: () => socket || connect()
    };
})();

