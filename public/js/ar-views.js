import { environment } from './environment.js';
import { SplashScreenCompleted, ToggleSound, ToggleFullscreen } from './ar-views-service.js';

// Used to remove the 8th wall splash screen
window.addEventListener('message', function(event) {
    // Check the origin of the data!
    if (event.origin !== environment.AR_APP_URL) { // Replace with the origin of the embedded website
        return;
    }

    // Check the message data
    if (event.data === 'arLoaded') {
        SplashScreenCompleted()
    }
});

const muteButton = document.getElementById('volume_stopBtn');
const fullscreenButton = document.getElementById('fullscreenBtn');

muteButton.addEventListener('click', ToggleSound);
fullscreenButton.addEventListener('click', ToggleFullscreen);
