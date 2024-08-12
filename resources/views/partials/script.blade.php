<!-- Core -->
<script src="{{ asset('admin/vendor/@popperjs/core/dist/umd/popper.min.js') }}"></script>
<script src="{{ asset('admin/vendor/bootstrap/dist/js/bootstrap.min.js') }}"></script>

<!-- Vendor JS -->
<script src="{{ asset('admin/vendor/onscreen/dist/on-screen.umd.min.js') }}"></script>

<!-- Slider -->
<script src="{{ asset('admin/vendor/nouislider/distribute/nouislider.min.js') }}"></script>

<!-- Smooth scroll -->
<script src="{{ asset('admin/vendor/smooth-scroll/dist/smooth-scroll.polyfills.min.js') }}"></script>

<!-- Charts -->
<script src="{{ asset('admin/vendor/chartist/dist/chartist.min.js') }}"></script>
<script src="{{ asset('admin/vendor/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>

<!-- Datepicker -->
<script src="{{ asset('admin/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

<!-- Sweet Alerts 2 -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- Moment JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>

<!-- Vanilla JS Datepicker -->
<script src="{{ asset('admin/vendor/vanillajs-datepicker/dist/js/datepicker.min.js') }}"></script>

<!-- Notyf -->
<script src="{{ asset('admin/vendor/notyf/notyf.min.js') }}"></script>

<!-- Simplebar -->
<script src="{{ asset('admin/vendor/simplebar/dist/simplebar.min.js') }}"></script>

<!-- Github buttons -->
<script async defer src="https://buttons.github.io/buttons.js"></script>

<!-- Volt JS -->
<script src="{{ asset('admin/assets/js/volt.js') }}"></script>

<script>
        //message with sweetalert
        @if(session('success'))
            Swal.fire({
                icon: "success",
                title: "BERHASIL",
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @elseif(session('error'))
            Swal.fire({
                icon: "error",
                title: "GAGAL!",
                text: "{{ session('error') }}",
                showConfirmButton: false,
                timer: 2000
            });
        @endif

    </script>