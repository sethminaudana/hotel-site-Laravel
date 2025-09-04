document.addEventListener("visibilitychange", function () {
    if (document.hidden) {
        console.log("🔕 Admin tab is now in background or minimized");
    } else {
        console.log("🔔 Admin tab is now active (foreground)");
    }
});
