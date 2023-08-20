import { environment } from "./environment.js";

export function SplashScreenCompleted() {
    setTimeout(() => {
        const ourSplashScreen = document.getElementById('bechi-splash-screen');
        const mainFrame = document.getElementById('ar-view-frame');

        ourSplashScreen.style.display = 'none';
        mainFrame.style.opacity = 1;
    }, 100)
}

export function ToggleSound() {
    console.log("Toggle Sound");
}

export function ToggleFullscreen() {
    document.getElementById('ar-view-frame').requestFullscreen();
}

export function PlaySplashScreen(playedOnce) {
    const splashScreen = document.getElementById('bechi-splash-video');
    if (playedOnce) {
        // Set the video's current time to your desired start time (e.g., 5 seconds)
        splashScreen.currentTime = environment.SPLASH_SCREEN_REPEAT_TIME;
    }
    splashScreen.play();
}
