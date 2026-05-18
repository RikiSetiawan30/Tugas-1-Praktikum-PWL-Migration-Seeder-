@if(session('success'))
    <div id="swal-success" data-message="{{ session('success') }}"></div>
@endif

@if(session('error'))
    <div id="swal-error" data-message="{{ session('error') }}"></div>
@endif

@push('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const success = document.getElementById('swal-success');
        const error = document.getElementById('swal-error');

        if (success) {
            Swal.fire({
                icon: 'success',
                title: 'Berhasil!',
                text: success.dataset.message,
                timer: 2000,
                showConfirmButton: false
            });
        }

        if (error) {
            Swal.fire({
                icon: 'error',
                title: 'Gagal!',
                text: error.dataset.message,
            });
        }
    });
</script>
@endpush