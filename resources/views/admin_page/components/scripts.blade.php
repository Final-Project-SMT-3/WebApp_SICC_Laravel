<script src="{{ asset('admin_page') }}/libs/jquery/dist/jquery.min.js"></script>
<script src="{{ asset('admin_page') }}/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('admin_page') }}/js/sidebarmenu.js"></script>
<script src="{{ asset('admin_page') }}/js/app.min.js"></script>
<script src="{{ asset('admin_page') }}/libs/apexcharts/dist/apexcharts.min.js"></script>
<script src="{{ asset('admin_page') }}/libs/simplebar/dist/simplebar.js"></script>
<script src="{{ asset('admin_page') }}/js/dashboard.js"></script>
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $("#dataTables").DataTable()
    // new DataTable('#dataTables', {
    //     "columnDefs": [
    //         { "orderable": false, "targets": 1 },
    //         { "orderable": false, "targets": 2 },
    //         { "orderable": false, "targets": 3 },
    //         { "orderable": false, "targets": 4 }
    //     ],
    //     info: false
    // });
    var loadFile = function(event) {
        var output = document.getElementById('output');
        output.src = URL.createObjectURL(event.target.files[0]);
        output.onload = function() {
            URL.revokeObjectURL(output.src) // free memory
        }
    };

    function showConfirmationModal(action, id) {
        var finalRoute = "";

        switch (action) {
            case 'Accept':
                finalRoute = "pengajuanBimbingan/updateAccept/" + id;
                break;
            case 'Decline':
                finalRoute = "pengajuanBimbingan/updateDecline/" + id;
                break;
            default:
                break;
        }

        Swal.fire({
            title: 'Konfirmasi',
            text: `Apakah Anda yakin ingin ${action} kelompok ini?`,
            icon: 'warning',
            allowOutsideClick: false,
            allowEscapeKey: false,
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = finalRoute;
            }
        });
    }

    @if (Session::has('success'))
        Swal.fire('Sukses', '{{ Session::get('success') }}', 'success');
    @endif

    @if (Session::has('error'))
        Swal.fire('Error', '{{ Session::get('error') }}', 'error');
    @endif
</script>
</body>

</html>
