@extends('layouts.master')

@section('header')
    @include('customer.common-views.heads.image-tracking')
@endsection

@section('content')

    <video hidden id="trackedVideo" muted playsinline loop autoplay src="{{ asset('/assets/videos/naruto_video_001.mp4') }}"></video>

    <script type="module">
        const targetImage = new URL("{{ asset('/assets/trackers/naruto_0001.zpt') }}", import.meta.url).href;

        // This class uses a THREE.Raycaster to detect when a user taps on
        // an object in 3D space. You can use `addMouseDownListener` to
        // register an object for callbacks when it's tapped.

        class InteractionHelper {
        constructor(camera, renderer) {
            this.camera = camera;
            this.raycaster = new THREE.Raycaster();
            this.mouse = new THREE.Vector2();
            this.domElement = renderer.domElement;
            this.domElement.addEventListener('mousedown', this.search.bind(this), false);
            this.objectCallbackPairs = [];
        }

        addMouseDownListener(object, callback) {
            this.objectCallbackPairs.push({
            object,
            callback,
            });
        }

        search(event) {
            // Set our Raycaster to point down the camera where the user tapped
            this.mouse.x = (event.clientX / this.domElement.clientWidth) * 2 - 1;
            this.mouse.y = -(event.clientY / this.domElement.clientHeight) * 2 + 1;
            this.raycaster.setFromCamera(this.mouse, this.camera);

            // eslint-disable-next-line no-restricted-syntax
            for (const pair of this.objectCallbackPairs) {
            const intersections = this.raycaster.intersectObject(pair.object);
            if (intersections.length > 0) pair.callback();
            }
        }
        }

        // The SDK is supported on many different browsers, but there are some that
        // don't provide camera access. This function detects if the browser is supported
        // For more information on support, check out the readme over at
        // https://www.npmjs.com/package/@zappar/zappar-threejs
        if (ZapparThree.browserIncompatible()) {
        // The browserIncompatibleUI() function shows a full-page dialog that informs the user
        // they're using an unsupported browser, and provides a button to 'copy' the current page
        // URL so they can 'paste' it into the address bar of a compatible alternative.
        ZapparThree.browserIncompatibleUI();

        // If the browser is not compatible, we can avoid setting up the rest of the page
        // so we throw an exception here.
        throw new Error('Unsupported browser');
        }

        // ZapparThree provides a LoadingManager that shows a progress bar while
        // the assets are downloaded. You can use this if it's helpful, or use
        // your own loading UI - it's up to you :-)
        const manager = new ZapparThree.LoadingManager();

        // Construct our ThreeJS renderer and scene as usual
        const renderer = new THREE.WebGLRenderer({ antialias: true });
        const scene = new THREE.Scene();
        document.body.appendChild(renderer.domElement);

        // As with a normal ThreeJS scene, resize the canvas if the window resizes
        renderer.setSize(window.innerWidth, window.innerHeight);
        window.addEventListener('resize', () => {
        renderer.setSize(window.innerWidth, window.innerHeight);
        });

        // Create a Zappar camera that we'll use instead of a ThreeJS camera
        const camera = new ZapparThree.Camera();

        // In order to use camera and motion data, we need to ask the users for permission
        // The Zappar library comes with some UI to help with that, so let's use it
        ZapparThree.permissionRequestUI().then((granted) => {
        // If the user granted us the permissions we need then we can start the camera
        // Otherwise let's them know that it's necessary with Zappar's permission denied UI
        if (granted) camera.start();
        else ZapparThree.permissionDeniedUI();
        });

        // The Zappar component needs to know our WebGL context, so set it like this:
        ZapparThree.glContextSet(renderer.getContext());

        // Set the background of our scene to be the camera background texture
        // that's provided by the Zappar camera
        scene.background = camera.backgroundTexture;

        // The InteractionHelper class let's us listen for when 3D objects
        // are tapped on screen. See interactionhelper.ts for its implementation
        const interactionHelper = new InteractionHelper(camera, renderer);

        // Set an error handler on the loader to help us check if there are issues loading content.
        manager.onError = (url) => console.log(`There was an error loading ${url}`);

        // Create a zappar image_tracker and wrap it in an image_tracker_group for us
        // to put our ThreeJS content into
        // Pass our loading manager in to ensure the progress bar works correctly
        const imageTracker = new ZapparThree.ImageTrackerLoader(manager).load(targetImage);
        const imageTrackerGroup = new ZapparThree.ImageAnchorGroup(camera, imageTracker);
        const contentGroup = new THREE.Group();

        // Add our image tracker group into the ThreeJS scene
        scene.add(imageTrackerGroup);

        const video = document.getElementById( 'trackedVideo' );
        const texture = new THREE.VideoTexture( video );

        // Create a plane geometry mesh for the background
        const plane = new THREE.Mesh(
        new THREE.PlaneGeometry(3.07, 2.05),
        new THREE.MeshBasicMaterial({map: texture}),
        );

        // add our content to the tracking group.
        contentGroup.add(plane);

        imageTrackerGroup.add(contentGroup);

        // when we lose sight of the camera, hide the scene contents.
        imageTracker.onVisible.bind(() => { scene.visible = true; });
        imageTracker.onNotVisible.bind(() => { scene.visible = false; });

        // Use a function to render our scene as usual
        function render() {
        // The Zappar camera must have updateFrame called every frame
        camera.updateFrame(renderer);

        // Draw the ThreeJS scene in the usual way, but using the Zappar camera
        renderer.render(scene, camera);

        // Call render() again next frame
        requestAnimationFrame(render);
        }

        // Start things off
        render();
    </script>
@endsection
