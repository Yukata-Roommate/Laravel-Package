@if (is_string($success))
    <div class="alert alert-success d-flex flex-column" role="alert">
        <div class="d-flex h3">
            <i class="bi bi-check2-circle"></i>

            <p class="mb-0 ms-3">
                Success
            </p>
        </div>

        {!! $success !!}
    </div>
@endif

@if (is_string($failure))
    <div class="alert alert-danger d-flex flex-column" role="alert">
        <div class="d-flex h3">
            <i class="bi bi-exclamation-triangle"></i>

            <p class="mb-0 ms-3">
                Failure
            </p>
        </div>

        {!! $failure !!}
    </div>
@endif
