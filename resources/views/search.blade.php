@extends('partials/base')
@section('content')
<div class="container-fluid bg-primary">
    <div class="big-element">
        <h1 class="text-white text-center">Vyhľadať v databáze obcí</h1>
        <input type="text" name="search" id="search" class="form-control" placeholder="Zadajte názov"/>
        <div id="search-results" class="list-group"></div>
    </div>
</div>
@endsection

@section('scripts')
    @parent
    <script>
        $(document).ready(function () {
            $("#search").on("keyup", function () {
                $("#search-results").html('');
                let value = $(this).val();

                if (value.length > 2) {
                    setTimeout(getApiResults(value), 1000);
                }
            });

            function getApiResults(value) {
                $.post({
                    url: "/",
                    data: {name: value},
                    success: function (result) {
                        $.each(result.result.data, function () {
                            $("#search-results").append(`
                                <a class="list-group-item" href="/settlements/${this.id}">
                                    ${this.name}
                                </a>
                            `);
                        });
                    }
                });
            }
        });
    </script>
@endsection
