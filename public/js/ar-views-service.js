export function SplashScreenCompleted() {
    const mainFrame = document.getElementById('ar-view-frame');
    mainFrame.style.opacity = 1;
}

export function ToggleSound() {
    console.log("Toggle Sound");
}

export function ToggleFullscreen() {
    document.getElementById('ar-view-frame').requestFullscreen();
}
