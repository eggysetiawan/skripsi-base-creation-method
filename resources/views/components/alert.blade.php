<div class="row justify-content-center">
    <div class="col-md-9">
        @if (session()->has('success'))
            <div class="alert alert-success" role="alert">
                {{ session()->get('success') }}
            </div>
        @endif
    </div>
</div>
