<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Invetaris Aset IF-UNRAM</title>

    <link rel="icon" href="{{ asset('storage/logo/logoPSTI.jpg') }}" type="image/x-icon" />



    <!-- Bootstrap core CSS -->
    <link href="{{ url('/assets5/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="{{ url('/assets5/pricing.css') }}" rel="stylesheet">
</head>

<body>

    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
        <symbol id="check" viewBox="0 0 16 16">
            <title>Check</title>
            <path
                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
    </svg>

    <div class="container py-3">
        <header>
            <div class="d-flex flex-column flex-md-row align-items-center pb-3 mb-4 border-bottom">
                <a href="#" class="d-flex align-items-center text-dark text-decoration-none">
                    <img src="{{ asset('storage/logo/logoUNRAM.png') }}" alt="logo PSTI" class="responsive"
                        width="65" height="65">
                    <img src="{{ asset('storage/logo/logoPSTI.jpg') }}" alt="logo PSTI" class="responsive"
                        style="margin-left: 5px;" width="60" height="60">
                </a>
                <b>
                    <h3 class="fw-normal" style="margin-left: 10px;"> Inventaris Aset IF-UNRAM</h3>
                </b>
            </div>

            <div class="pricing-header mx-auto text-center">
                {{-- <h1 class="display-4 fw-normal">Detail Aset</h1> --}}
                {{-- <h2 class="display-6 text-center mb-4">Detail Aset</h2> --}}
                <img src="{{ asset('storage/' . $data->foto_aset) }}"alt="foto aset" width="250" height="250">
                {{-- <img src="data:image/png;base64, {!! base64_encode(QrCode::format('png')->size(250)->mergeString(Storage::get('foto/logo_bank.png'))->generate($url)) !!} "> --}}
            </div>
        </header>

        <main>
            <div class="row row-cols-1 row-cols-md-3 mb-3 text-center">

            </div>

            {{-- <h2 class="display-6 text-center mb-4">Detail Aset</h2> --}}

            <div class="table-responsive">
                <table class="table ">
                    <thead>
                        <tr>
                            <th style="width: 34%;"></th>
                            <th style="width: 66%;">Keterangan </th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row" class="text-start">Ruangan</th>
                            <td> {{ $data->nama_ruangan }} </td>
                        </tr>

                    </tbody>
                    <tbody>
                        <tr>
                            <th scope="row" class="text-start">Kode Aset</th>
                            <td> {{ $data->kode_aset }} </td>
                        </tr>

                    </tbody>
                    <tbody>
                        <tr>
                            <th scope="row" class="text-start">Nama Aset</th>
                            <td> {{ $data->nama }} </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <th scope="row" class="text-start">Jumlah</th>
                            <td> {{ $data->jumlah }} </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <th scope="row" class="text-start">Lokasi</th>
                            <td> {{ $data->lokasi }} </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <th scope="row" class="text-start">Kondisi</th>
                            <td> {{ $data->kondisi }} </td>
                        </tr>
                    </tbody>
                    <tbody>
                        <tr>
                            <th scope="row" class="text-start">Tahun Pengadaan</th>
                            <td> {{ $data->tahun_pengadaan }} </td>
                        </tr>
                    </tbody>

                    {{-- <tbody>
            <tr>
                <th scope="row" class="text-start">Nilai Buku</th>
                <td> {{ $data->aset_nilai_buku }} </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th scope="row" class="text-start">PRS Susut</th>
                <td> {{ $data->aset_prs_susut }} </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th scope="row" class="text-start">GSSL Induk</th>
                <td> {{ $data->aset_gssl_induk }} </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th scope="row" class="text-start">Uraian</th>
                <td> {{ $data->aset_uraian }} </td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th scope="row" class="text-start">Sumber Perolehan</th>
                <td> {{ $data->aset_sumber_perolehan	 }} </td>
            </tr>
        </tbody> --}}
                    <tbody>
                        <tr>

                        </tr>
                    </tbody>
                </table>
            </div>
        </main>

        <footer class="pt-4 my-md-5 pt-md-5 border-top">
            <strong>Copyright</strong> Inventaris Aset IF-UNRAM &copy; 2022
    </div>
    </footer>
    </div>



</body>

</html>
