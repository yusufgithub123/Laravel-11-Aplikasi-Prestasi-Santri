@extends('layouts.app')

@section('content')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>

<div class="py-4">
    <nav aria-label="breadcrumb" class="d-none d-md-inline-block">
        <ol class="breadcrumb breadcrumb-dark breadcrumb-transparent">
            <li class="breadcrumb-item">
                <a href="">
                    <svg class="icon icon-xxs" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                    </svg>
                </a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Perangkingan</li>
        </ol>
    </nav>
    <div class="d-flex justify-content-between w-100 flex-wrap">
        <div class="mb-3 mb-lg-0">
            <h1 class="h4">Perangkingan Santri Berprestasi</h1>
            <p class="mb-0">Pondok Darul Hijrah Putra</p>
        </div>
    </div>
</div>

<div class="d-flex justify-content-end">
    <button type="button" onclick="pdf()" class="btn btn-primary mb-3">Export PDF</button>
</div>

<div id="cards">
    <div class="card border-0 shadow mb-4">
        <div class="card-body">
            <h1 class="h5 text-center">Perangkingan Santri</h1>
            <div class="table-responsive">
                <table class="table table-centered table-nowrap mb-0 rounded">
                    <thead class="thead-light">
                        <tr>
                            <th class="border-1 rounded-start text-center">NISN</th>
                            <th class="border-1 text-center">Nama Santri</th>
                            <th class="border-1 text-center">Total</th>
                            <th class="border-1 text-center">Peringkat</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($headerranking as $item)
                        <tr>
                            <td class="text-primary fw-bold text-center">{{ $item->nisn }}</td> 
                            <td class="text-center">{{ $item->nama_santri }}</td> 
                            <td class="text-center">{{ $item->bobot }}</td> 
                            <td class="text-center">{{ $loop->iteration }}</td> 
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    function pdf() {
        var HTML_Width = $("#cards").width();
        var HTML_Height = $("#cards").height();
        var top_left_margin = 15;
        var PDF_Width = HTML_Width + (top_left_margin * 2);
        var PDF_Height = (PDF_Width * 1.5) + (top_left_margin * 2);
        var canvas_image_width = HTML_Width;
        var canvas_image_height = HTML_Height;

        var totalPDFPages = Math.ceil(HTML_Height / PDF_Height) - 1;

        html2canvas($("#cards")[0]).then(function(canvas) {
            var imgData = canvas.toDataURL("image/jpeg", 1.0);
            var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
            pdf.addImage(imgData, 'JPG', top_left_margin, top_left_margin, canvas_image_width,
                    canvas_image_height);
            for (var i = 1; i <= totalPDFPages; i++) {
                pdf.addPage(PDF_Width, PDF_Height);
                pdf.addImage(imgData, 'JPG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4),
                    canvas_image_width, canvas_image_height);
            }
            pdf.save("Laporan Santri Berprestasi.pdf");
            $(".html-content").hide();
            window.close();
        });
    }
</script>
@endsection