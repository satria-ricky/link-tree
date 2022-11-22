<!DOCTYPE html>
<html>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>{{ $title }}</title>

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font-awesome/css/font-awesome.css') }}" rel="stylesheet">

    <link href="{{ asset('css/plugins/dataTables/datatables.min.css') }}" rel="stylesheet">

    <link href="{{ asset('css/animate.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="{{ asset('js/alert.js') }}"></script>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>

</head>

<body>
    <div id="wrapper">
        @include('template.sidebar')

        <div id="page-wrapper" class="gray-bg">
            @include('template.header')
            <div class="wrapper wrapper-content">
                @yield('content')
            </div>
            <div class="footer">
                {{-- <div class="float-right">
                    10GB of <strong>250GB</strong> Free.
                </div> --}}
                <div>
                    <strong>Copyright</strong> Link - Tree &copy; 2022
                </div>
            </div>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src={{ asset('js/jquery-3.1.1.min.js') }}></script>
    <script src={{ asset('js/popper.min.js') }}></script>
    <script src={{ asset('js/bootstrap.js') }}></script>
    <script src={{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}></script>
    <script src={{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}></script>

    <!-- Custom and plugin javascript -->
    <script src={{ asset('js/inspinia.js') }}></script>
    <script src={{ asset('js/plugins/pace/pace.min.js') }}></script>

    <!-- jQuery UI -->
    <script src={{ asset('js/plugins/jquery-ui/jquery-ui.min.js') }}></script>
    {{-- select2 --}}

    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- datatable --}}

    <script src="{{ asset('js/plugins/dataTables/datatables.min.js') }}"></script>

    <!-- Page-Level Scripts -->

    <script>
        // Upgrade button class name
        $.fn.dataTable.Buttons.defaults.dom.button.className = 'btn btn-white btn-sm';

        $(document).ready(function() {
            $('.dataTables-example').DataTable({
                pageLength: 25,
                responsive: true,
                dom: '<"html5buttons"B>lTfgitp',
                buttons: [{
                        extend: 'copy'
                    },
                    {
                        extend: 'csv'
                    },
                    {
                        extend: 'excel',
                        title: 'ExampleFile'
                    },
                    {
                        extend: 'pdf',
                        title: 'ExampleFile'
                    },

                    {
                        extend: 'print',
                        customize: function(win) {
                            $(win.document.body).addClass('white-bg');
                            $(win.document.body).css('font-size', '10px');

                            $(win.document.body).find('table')
                                .addClass('compact')
                                .css('font-size', 'inherit');
                        }
                    }
                ]

            });

        });
    </script>

    <script>
        $(document).ready(function() {
            // console.log("ready!");
            $(document).ready(function() {
                $('.js-example-basic-single').select2();
            });
        });
    </script>

    @if (session()->has('success'))
        <script>
            swal("Berhasil!", "{{ session('success') }}", "success");
        </script>
    @endif
    @if (session()->has('error'))
        <script>
            swal("Gagal!", "{{ session('error') }}", "error");
        </script>
    @endif
    @if (Request::is('list_ruangan'))
        <script>
            function buttonModalEditRuangan(params) {
                console.log(params)
                $('#ModalEditRuangan').modal('show');
                $("#formModalNamaRuangan").val(params.nama_ruangan);
                $("#formModalIdRuangan").val(params.id_ruangan);
            }
        </script>
    @endif

    @if (Request::is('list_aset'))
        <script>
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            let startYear = 1800;
            let endYear = new Date().getFullYear();
            for (i = endYear; i > startYear; i--) {
                $('#id_tahun_pengadaan').append($('<option />').val(i).html(i));
                // $('#id_perbaikan_terakhir').append($('<option />').val(i).html(i));
            }

            $(document).on('change', '#idRuangan', function() {
                var id = document.getElementById("idRuangan").value;
                $('#dataTabelAset').DataTable().destroy();

                $('#dataTabelAset').dataTable({
                    "ajax": {
                        "url": "{{ url('asetByRuangan') }}",
                        "type": "POST",
                        data: {
                            _token: '{{ csrf_token() }}',
                            id_ruangan: id
                        },
                        columns: [{
                            data: 'id_aset',
                            name: 'id_aset'
                        },
                        {
                            data: 'kode_aset',
                            name: 'kode_aset'
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'jumlah',
                            name: 'jumlah'
                        },
                        {
                            data: 'action',
                            name: 'action',
                        },
                    ]
                    }
                });


                $('#tabelproduk').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: "{{ url('/cp_bahan') }}",
                    columns: [{
                            data: 'protap_nama',
                            name: 'protap_nama'
                        }, {
                            data: 'kode',
                            name: 'kode'
                        },
                        {
                            data: 'nama',
                            name: 'nama'
                        },
                        {
                            data: 'jumlah',
                            name: 'jumlah'
                        },
                        {
                            data: 'ruang',
                            name: 'ruang'
                        },
                        {
                            data: 'status',
                            name: 'status'
                        },
                        {
                            data: 'action',
                            name: 'action'
                        }
                    ]
                });
                
            });
        </script>
    @endif

    @if (Request::is('edit_aset/*'))
        <script src="{{ asset('js/peta_edit_pasar.js') }}"></script>
        <script>
            let startYear = 1800;
            let endYear = new Date().getFullYear();
            for (i = endYear; i > startYear; i--) {
                $('#id_tahun_pengadaan').append($('<option />').val(i).html(i));
                document.getElementById('id_tahun_pengadaan').value = {{ $dataAset->tahun_pengadaan }};
            }
        </script>
    @endif

</body>

</html>
