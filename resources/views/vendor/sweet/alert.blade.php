@if (Session::has('sweet_alert.alert'))
    <script>
        swal({!! Session::get('sweet_alert.alert') !!});
    </script>
@endif

@if ($errors->any())
    @foreach($errors->all() as $error)
        <script>
            var n = noty({
                text: '{{ $error }}',
                layout: 'bottomRight',
                theme: 'relax',
                type: 'error',
            });

            $.noty.get(n);
        </script>
    @endforeach
@endif