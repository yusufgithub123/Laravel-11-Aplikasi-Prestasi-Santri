@extends('layouts.layout')

@section('content')
    <section style="margin-top: 100px">
        <div class="animated fadeIn">
            <div class="content mt-3">
                <div class="card">
                    <div id="cards">
                        <div class="card-body table-responsive">
                            <div class="container" style="margin-bottom:30px">
                                <center>
                                    <h1>Hasil Laporan Santri Berprestasi</h1>
                                </center>
                            </div>

                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="text-align: center;">Foto</th>
                                        <th style="text-align: center;">Nama Santri</th>
                                        <th style="text-align: center;">NISN</th>
                                        <th style="text-align: center;">Total</th>
                                        <th style="text-align: center;">Ranking</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($headerranking as $item)
                                        <tr>
                                            <td style="text-align: center;">
                                                <img src="{{ asset('storage/gambar/'.$item->gambar) }}" alt="Gambar Santri" style="width: 50px; height: 50px;">
                                            </td>
                                            <td>{{ $item->nama_santri }}</td>
                                            <td>{{ $item->nisn }}</td>
                                            <td>{{ $item->bobot }}</td>
                                            <td>{{ $loop->index + 1 }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.debug.js"></script>
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

                html2canvas($("#cards")[0], {useCORS: true}).then(function(canvas) {
                    var imgData = canvas.toDataURL("image/jpeg", 1.0);
                    var pdf = new jsPDF('p', 'pt', [PDF_Width, PDF_Height]);
                    pdf.addImage(imgData, 'JPEG', top_left_margin, top_left_margin, canvas_image_width, canvas_image_height);
                    for (var i = 1; i <= totalPDFPages; i++) {
                        pdf.addPage(PDF_Width, PDF_Height);
                        pdf.addImage(imgData, 'JPEG', top_left_margin, -(PDF_Height * i) + (top_left_margin * 4), canvas_image_width, canvas_image_height);
                    }
                    pdf.save("Laporan Santri Berprestasi.pdf");
                }).catch(function(error) {
                    console.error('Error creating PDF:', error);
                    alert('Gagal membuat PDF. Silakan coba lagi.');
                });
            }
        </script>
    </section>
@endsection
