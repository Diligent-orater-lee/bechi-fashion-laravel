<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<link rel="stylesheet" href="{{ asset('/styles/ar-views.css') }}?version={{ env('APP_CACHE_VERSION') }}">
<script type="module" src="{{ asset('/js/ar-views.js') }}?version={{ env('APP_CACHE_VERSION') }}"></script>

{{-- Here we manage the user permissions while the assets are loading to speed up the content behaviour --}}
<script>
    window.addEventListener('load', async () => {
        if (@json($versePermissions).includes("CAMERA")) {
            const res = await navigator.permissions.query({ name: "camera" });
        }
        if (@json($versePermissions).includes("LOCATION")) {
            const res = await navigator.permissions.query({ name: "geolocation" });
        }
        if (@json($versePermissions).includes("MICROPHONE")) {
            const res = await navigator.permissions.query({ name: "microphone" });
        }
    });
</script>
