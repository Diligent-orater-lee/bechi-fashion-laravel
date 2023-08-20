import { environment } from './environment.js';

const ToggleFullscreen = () => {
    document.getElementById('ar-view-frame').requestFullscreen();
}

const ToggleSound = () => {
    console.log("Toggle Sound");
}

// Used to remove the 8th wall splash screen
window.addEventListener('message', function(event) {
    // Check the origin of the data!
    if (event.origin !== environment.AR_APP_URL) { // Replace with the origin of the embedded website
        return;
    }

    // Check the message data
    if (event.data === 'arLoaded') {
        splashScreenCompleted()
    }
});

function splashScreenCompleted() {
    const mainFrame = document.getElementById('ar-view-frame');
    mainFrame.style.opacity = 1;
}
