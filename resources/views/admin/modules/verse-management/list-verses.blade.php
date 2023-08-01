@extends('layouts.master')

@section('header')
    @include('admin.partials.head')

    <script type="text/javascript">
        $(document).ready(function () {
            $(() => {
                $('#gridContainer').dxDataGrid({
                    dataSource: @json($verses),
                    keyExpr: 'id',
                    columns: [
                        {
                            caption: "Verse name",
                            dataField: "verse_name",
                        },
                        {
                            caption: "Description",
                            dataField: "verse_description",
                        },
                        {
                            caption: "AR included",
                            dataField: "is_ar_available",
                            dataType: "boolean",
                        },
                        {
                            caption: "Handle",
                            dataField: "verse_handle",
                        },
                        {
                            caption: "8th wall URL",
                            dataField: "ar_project_url",
                        },
                        {
                            caption: "Audio file",
                            dataField: "verse_audio_url",
                        },
                    ],
                    showBorders: true,
                    rowAlternationEnabled: true,
                    hoverStateEnabled: true,
                    toolbar: {
                        items: [
                            {
                                location: 'before',
                                widget: 'dxButton',
                                options: {
                                    icon: 'plus',
                                    text: 'Add new category',
                                    onClick() {
                                        window.location.href = "{{ route('admin.verses.addView') }}";
                                    },
                                },
                            }
                        ]
                    },
                });
            });
        });
    </script>
@endsection


@section('content')
    @include('admin.partials.navbar')
    <div class="container">
        <div class="row">
            <div class="col-md-12 pt-4">
                <div id="gridContainer"></div>
            </div>
        </div>
    </div>
@endsection
