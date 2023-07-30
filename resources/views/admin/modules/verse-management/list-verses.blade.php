@extends('layouts.master')

@section('header')
    @include('admin.partials.head')

    <script type="text/javascript">
        $(document).ready(function () {
            $(() => {
                $('#gridContainer').dxDataGrid({
                    dataSource: [{id: "test", CompanyName: "Test", City: "Test", State: "Test", Phone: "Test", Fax: "Test"}],
                    keyExpr: 'id',
                    columns: ['CompanyName', 'City', 'State', 'Phone', 'Fax'],
                    showBorders: true,
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
