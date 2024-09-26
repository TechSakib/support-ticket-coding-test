{{--JQUERY--}}
<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

{{--Bootstrap--}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

{{--Custom Scripts--}}
<script>
    // REQUIRED INPUT LABEL MODIFICATION
    $('[required]').closest('div')
        .find('label')
        .append("<span class='text-danger'> *</span>")

    // TOOLTIP INITIALIZING
    $(document).ready(function () {
        $('[data-bs-toggle="tooltip"]').tooltip();
    });
</script>

{{--Page Scripts--}}
@stack('js')
