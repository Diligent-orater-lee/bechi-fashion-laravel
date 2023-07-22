@extends('common-views.master')

@section('header')
    @include('common-views.heads.homepage-head')
@endsection

@section('content')
    {{-- The top level nav bar  --}}
    @include('common-views.partial-headers.home-page-header')
    {{-- The top level nav bar end --}}

    {{-- The first page video  --}}
    <div data-server-rendered="true" id="__nuxt">
        <div id="__layout" style="margin-top: -209px;">
            <main id="main" role="main" class="lv-default-layout__content">
                <div class="lv-homepage">
                    <div class="lv-homepage__push lv-homepage-push -header-is-transparent -is-main">
                        <div class="lv-homepage-push__wrapper">
                            <div class="lv-homepage-push__media -video">
                                <div class="lv-video-loop is-loaded">
                                    <div class="lv-smart-picture is-loaded" style="opacity: 0;">
                                        <picture>
                                            <source media="(min-width: 150rem)"
                                                srcset="https://player.louisvuitton.com/media/img/poster/video/2400x1350/1482/1482273.jpg">
                                            <source media="(min-width: 120rem)"
                                                srcset="https://player.louisvuitton.com/media/img/poster/video/1920x1080/1482/1482273.jpg">
                                            <source media="(min-width: 100rem)"
                                                srcset="https://player.louisvuitton.com/media/img/poster/video/1600x900/1482/1482273.jpg">
                                            <source media="(min-width: 80rem)"
                                                srcset="https://player.louisvuitton.com/media/img/poster/video/1280x720/1482/1482273.jpg">
                                            <source media="(min-width: 64rem)"
                                                srcset="https://player.louisvuitton.com/media/img/poster/video/1024x576/1482/1482273.jpg">
                                            <source media="(min-width: 44rem)"
                                                srcset="https://player.louisvuitton.com/media/img/poster/video/704x396/1482/1482273.jpg">
                                            <img alt="" class="lv-smart-picture__object"
                                                srcset="https://player.louisvuitton.com/media/img/poster/video/640x360/1482/1482273.jpg"
                                                src="data:image/gif;base64,R0lGODlhAQABAAAAACH5BAEKAAEALAAAAAABAAEAAAICTAEAOw==">
                                        </picture><noscript></noscript>
                                    </div>
                                    <video playsinline="" src="{{ asset('/assets/homepage-video.mp4') }}" loop="loop" autoplay="true" muted
                                        tabindex="-1" aria-hidden="true" class="lv-video-loop__video"
                                        style="opacity: 1;"></video>
                                    <div class="lv-nosized v-portal" style="display: none;"></div>
                                </div>
                            </div>
                            <div class="lv-homepage-push__content" style="--gradient-opacity: 0.5;"> <!---->
                                <h2 class="lv-homepage-push__title">Men's Fall-Winter 2023</h2>
                                <div class="lv-homepage-push__content-links"><a
                                        href="./bechi-verse.html"
                                        class="lv-smart-link lv-button -secondary -light lv-homepage-push__content-link">
                                        Discover the Collection
                                    </a>
                                </div>
                            </div>
                            <div class="lv-homepage-push__portal vue-portal-target"><button aria-label=""
                                    aria-pressed="false"
                                    class="lv-video-loop__sound-button lv-button -only-icon -size-s"><svg
                                        focusable="false" aria-hidden="true" class="lv-icon">
                                        <use
                                            xlink:href="/_nuxt/83a21858.icons.svg#sprite-controls-volume-off-filled">
                                        </use>
                                    </svg></button> <button type="button"
                                    class="lv-play-pause-button lv-video-loop__play-pause lv-button -only-icon -size-s"
                                    aria-label="Stop all animations" aria-pressed="false"><svg focusable="false"
                                        aria-hidden="true" class="lv-icon">
                                        <use xlink:href="/_nuxt/83a21858.icons.svg#sprite-controls-pause"></use>
                                    </svg></button></div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    {{-- The first page video end  --}}

    {{-- The products category and lists --}}



@endsection
