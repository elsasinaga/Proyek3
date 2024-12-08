<!DOCTYPE html>
<html>
<head>
    <title>Rubrik Penilaian {{ $moduleLkpd->lkpd_title }}</title>
    <style>
        body { 
            font-family: Arial, sans-serif; 
            line-height: 1.6; 
            color: #333;
            margin: 0 auto;
            max-width: 800px;
            padding: 20px;
        }
        .header { 
            text-align: center; 
            margin-bottom: 20px; 
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 15px;
        }
        .title { 
            font-size: 1.5em; 
            font-weight: bold; 
            color: #4CAF50; 
            margin-bottom: 10px; 
        }
        .section {
            margin-bottom: 20px;
            padding: 10px;
            border: 1px solid #ddd;
        }
        .criteria {
            margin-bottom: 10px;
            border-bottom: 1px solid #eee;
            padding-bottom: 10px;
        }
        .score {
            font-weight: bold;
            color: #4CAF50;
        }
    </style>
</head>
<body>
    <div class="header">
        <div class="title">Rubrik Penilaian</div>
        <h2>{{ $moduleLkpd->lkpd_title }}</h2>
        <p>Kategori: {{ $moduleLkpd->category->category_name ?? 'Tidak Berkategori' }}</p>
    </div>

    @php
        $isPlugged = $moduleLkpd->category->category_name == 'Plugged';
    @endphp

    <div class="section">
        <h3>Kriteria Penilaian</h3>
        
        @if($isPlugged)
            <div class="criteria">
                <h4>1. Penguasaan Konsep Teknologi</h4>
                <p>Penilaian kemampuan memahami dan mengaplikasikan konsep teknologi yang digunakan.</p>
                <p class="score">Skor Maksimal: 30</p>
                <ul>
                    <li>Sangat Baik (26-30): Memahami seluruh konsep teknologi dengan sangat detail</li>
                    <li>Baik (21-25): Memahami sebagian besar konsep teknologi</li>
                    <li>Cukup (16-20): Memahami beberapa konsep teknologi dasar</li>
                    <li>Kurang (0-15): Minim pemahaman konsep teknologi</li>
                </ul>
            </div>

            <div class="criteria">
                <h4>2. Kreativitas Penggunaan Teknologi</h4>
                <p>Penilaian inovasi dan kreativitas dalam memanfaatkan teknologi.</p>
                <p class="score">Skor Maksimal: 25</p>
                <ul>
                    <li>Sangat Kreatif (21-25): Menghasilkan solusi inovatif dan unik</li>
                    <li>Kreatif (16-20): Menunjukkan beberapa elemen kreativitas</li>
                    <li>Cukup Kreatif (11-15): Sedikit variasi dalam penggunaan teknologi</li>
                    <li>Kurang Kreatif (0-10): Minim kreativitas</li>
                </ul>
            </div>

            <div class="criteria">
                <h4>3. Implementasi dan Fungsionalitas</h4>
                <p>Penilaian keberhasilan implementasi dan keberfungsian teknologi.</p>
                <p class="score">Skor Maksimal: 25</p>
                <ul>
                    <li>Sangat Baik (21-25): Implementasi sempurna, berfungsi dengan optimal</li>
                    <li>Baik (16-20): Implementasi baik dengan sedikit kendala</li>
                    <li>Cukup (11-15): Implementasi dasar dengan beberapa masalah</li>
                    <li>Kurang (0-10): Implementasi tidak berhasil</li>
                </ul>
            </div>

            <div class="criteria">
                <h4>4. Dokumentasi dan Laporan</h4>
                <p>Penilaian kualitas laporan dan dokumentasi proses.</p>
                <p class="score">Skor Maksimal: 20</p>
                <ul>
                    <li>Sangat Baik (16-20): Dokumentasi lengkap, rinci, dan sistematis</li>
                    <li>Baik (11-15): Dokumentasi cukup lengkap</li>
                    <li>Cukup (6-10): Dokumentasi sederhana</li>
                    <li>Kurang (0-5): Dokumentasi tidak memadai</li>
                </ul>
            </div>
        @else
            <div class="criteria">
                <h4>1. Pemahaman Konsep</h4>
                <p>Penilaian kemampuan memahami konsep dasar.</p>
                <p class="score">Skor Maksimal: 30</p>
                <ul>
                    <li>Sangat Baik (26-30): Memahami konsep secara mendalam</li>
                    <li>Baik (21-25): Memahami sebagian besar konsep</li>
                    <li>Cukup (16-20): Memahami konsep dasar</li>
                    <li>Kurang (0-15): Minim pemahaman konsep</li>
                </ul>
            </div>

            <div class="criteria">
                <h4>2. Kreativitas dan Inovasi</h4>
                <p>Penilaian kreativitas dalam penyelesaian tugas.</p>
                <p class="score">Skor Maksimal: 25</p>
                <ul>
                    <li>Sangat Kreatif (21-25): Solusi sangat inovatif</li>
                    <li>Kreatif (16-20): Menunjukkan kreativitas</li>
                    <li>Cukup Kreatif (11-15): Sedikit variasi pendekatan</li>
                    <li>Kurang Kreatif (0-10): Minim kreativitas</li>
                </ul>
            </div>

            <div class="criteria">
                <h4>3. Proses Pengerjaan</h4>
                <p>Penilaian tahapan dan metode pengerjaan.</p>
                <p class="score">Skor Maksimal: 25</p>
                <ul>
                    <li>Sangat Baik (21-25): Proses sistematis dan terstruktur</li>
                    <li>Baik (16-20): Proses cukup terencana</li>
                    <li>Cukup (11-15): Proses sederhana</li>
                    <li>Kurang (0-10): Proses tidak terorganisir</li>
                </ul>
            </div>

            <div class="criteria">
                <h4>4. Presentasi dan Laporan</h4>
                <p>Penilaian kualitas presentasi dan laporan.</p>
                <p class="score">Skor Maksimal: 20</p>
                <ul>
                    <li>Sangat Baik (16-20): Presentasi rinci dan sistematis</li>
                    <li>Baik (11-15): Presentasi cukup lengkap</li>
                    <li>Cukup (6-10): Presentasi sederhana</li>
                    <li>Kurang (0-5): Presentasi tidak memadai</li>
                </ul>
            </div>
        @endif
    </div>

    <div class="section">
        <h3>Perhitungan Nilai Akhir</h3>
        <p>Nilai Akhir = Jumlah Skor Kriteria (Maksimal 100)</p>
        <p>Kategori Penilaian:</p>
        <ul>
            <li>A (Sangat Baik): 86-100</li>
            <li>B (Baik): 71-85</li>
            <li>C (Cukup): 56-70</li>
            <li>D (Kurang): ≤ 55</li>
        </ul>
    </div>
</body>
</html>