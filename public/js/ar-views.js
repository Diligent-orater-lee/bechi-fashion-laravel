const ToggleFullscreen = () => {
    document.getElementById('my-iframe').requestFullscreen();
}

const ToggleSound = () => {
    console.log("Toggle Sound");
}

window.addEventListener('message', function(event) {
    console.log("Message received: " + event);
    // Check the origin of the data!
    if (event.origin !== "http://8thwall.app") { // Replace with the origin of the embedded website
        console.log("Message received from unknown origin: " + event.origin);
        return;
    }

    // Check the message data
    if (event.data === 'arLoaded') {
        console.log("AR View loaded");
    }
});
