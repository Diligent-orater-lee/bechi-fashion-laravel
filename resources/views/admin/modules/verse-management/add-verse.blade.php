@extends('layouts.master')

@section('header')
    @include('admin.partials.head')

    <script>
        $(() => {
            const arAvailableContainer = $('#ar-available-container');
            const switchDefaultValue = true;
            const arAvailableSwitchHandler = (value) => {
                if (value) {
                    arAvailableContainer.removeClass('d-none');
                } else {
                    arAvailableContainer.addClass('d-none');
                }
            }
            arAvailableSwitchHandler(switchDefaultValue);

            $("#is_ar_available").dxSwitch({
                elementAttr: {
                    name: "is_ar_available",
                },
                value: switchDefaultValue,
                switchedOffText: "No",
                switchedOnText: "Yes",
                onValueChanged: value => arAvailableSwitchHandler(value.value)
            });

            $('#verse_name').dxTextBox({
                value: '',
                inputAttr: { 'name': 'verse_name' },
            }).dxValidator({
                validationRules: [
                    {
                        type: 'required',
                        message: 'Required',
                    },
                ]
            });
            $('#verse_description').dxTextBox({
                value: '',
                inputAttr: { 'name': 'verse_description' },
            }).dxValidator({
                validationRules: [
                    {
                        type: 'required',
                        message: 'Required',
                    },
                ]
            });
            $('#verse_handle').dxTextBox({
                value: '',
                inputAttr: { 'name': 'verse_handle' },
            }).dxValidator({
                validationRules: [
                    {
                        type: 'required',
                        message: 'Required',
                    },
                ]
            });
            $('#ar_project_url').dxTextBox({
                value: '',
                inputAttr: { 'name': 'ar_project_url' },
            }).dxValidator({
                validationRules: [
                    {
                        type: 'required',
                        message: 'Required',
                    },
                ]
            });
            $('#ar_permissions').dxTagBox({
                value: ['CAMERA'],
                items: [
                    'CAMERA',
                    'LOCATION',
                    'MICROPHONE',
                ],
                inputAttr: { 'name': 'ar_permissions[]' },
            }).dxValidator({
                validationRules: [
                    {
                        type: 'required',
                        message: 'Required',
                    },
                ]
            });
            // $('#verse_audio_url').dxTextBox({
            //     value: '',
            //     inputAttr: { 'name': 'verse_audio_url' },
            // }).dxValidator({
            //     validationRules: [
            //         {
            //             type: 'required',
            //             message: 'Required',
            //         },
            //     ]
            // });
            $('#submit-button').dxButton({
                stylingMode: 'contained',
                text: 'Submit',
                type: 'success',
                width: 120,
                onClick: () => submitForm(),
            });

            const arAvailableSwitch = $('#is_ar_available').dxSwitch('instance');

            function submitForm() {
                $('#is_ar_available_input').prop('checked', arAvailableSwitch.instance().option("value"));

                $('form').submit();
            }
        });
    </script>
@endsection


@section('content')
    @include('admin.partials.navbar')

    <div class="container">
        <div class="row h-100 align-content-center">
            @if($errors->any())
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 pt-4">
                            <div class="alert alert-danger">
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li class="mb-0">{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Add a verse
                    </div>
                    <div class="card-body">
                        <form action="{{ route('admin.verses.add') }}" method="POST" >
                            @csrf
                            <div class="dx-field">
                                <div class="dx-field-label">Verse name</div>
                                <div class="dx-field-value">
                                    <div id="verse_name"></div>
                                </div>
                            </div>
                            <div class="dx-field">
                                <div class="dx-field-label">Verse description</div>
                                <div class="dx-field-value">
                                    <div id="verse_description"></div>
                                </div>
                            </div>
                            <div class="dx-field">
                                <div class="dx-field-label">Is AR available</div>
                                <div class="dx-field-value">
                                    <div id="is_ar_available"></div>
                                    <input id="is_ar_available_input" hidden name="is_ar_available" type="checkbox">
                                </div>
                            </div>
                            <div id="ar-available-container">
                                <div class="dx-field">
                                    <div class="dx-field-label">Verse handle name</div>
                                    <div class="dx-field-value">
                                        <div id="verse_handle"></div>
                                    </div>
                                </div>
                                <div class="dx-field">
                                    <div class="dx-field-label">8th wall project URL</div>
                                    <div class="dx-field-value">
                                        <div id="ar_project_url"></div>
                                    </div>
                                </div>
                                <div class="dx-field">
                                    <div class="dx-field-label">Project permissions</div>
                                    <div class="dx-field-value">
                                        <div id="ar_permissions"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-3 text-center">
                                <div id="submit-button"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
