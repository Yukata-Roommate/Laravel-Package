@if ($errors->any())
    <div class="alert alert-danger d-flex flex-column" role="alert">
        <div class="d-flex h3">
            <i class="bi bi-exclamation-triangle-fill"></i>

            <p class="mb-0 ms-3">
                Failure
            </p>
        </div>

        <ul class="m-0 p-0 text-left">
            @foreach ($errors->all() as $error)
                <li class="list-group-item-danger d-block mb-1">
                    {!! $enl2br($error) !!}
                </li>
            @endforeach
        </ul>
    </div>
@endif
