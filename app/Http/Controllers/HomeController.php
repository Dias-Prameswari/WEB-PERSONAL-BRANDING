<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
use App\Models\Portofolio;
use App\Models\Article;

class HomeController extends Controller
{
    // mapping slug kategori -> label (sama kayak di ArticleController)
    private array $categoryLabels = [
        'storytelling-branding'      => 'Storytelling & Branding',
        'strategi-konten'            => 'Strategi Konten',
        'media-sosial-growth'        => 'Media Sosial & Growth',
        'iklan-distribusi'           => 'Iklan & Distribusi',
        'mentoring-karier-kreator'   => 'Mentoring & Karier Kreator',
        'event-update'               => 'Event & Update',
    ];

    public function index()
    {
        // LOGO CLIENT (slide 1)
        $logos = [
            'logo-testimoni-1_24_11zon.jpg',
            'logo-testimoni-2_25_11zon.jpg',
            'logo-testimoni-3_26_11zon.jpg',
            'logoclient-1_5_11zon.jpg',
            'logoclient-2_6_11zon.jpg',
            'logoclient-3_7_11zon.jpg',
            'logoclient-4_8_11zon.jpg',
            'logoclient-5_9_11zon.jpg',
            'logoclient-6_10_11zon.jpg',
            'logoclient-7_11_11zon.jpg',
            'logoclient-8_12_11zon.jpg',
            'logoclient-9_13_11zon.jpg',
            'logoclient-10_14_11zon.jpg',
            'logoclient-11_15_11zon.jpg',
            'logoclient-12_16_11zon.jpg',
            'logoclient-13_17_11zon.jpg',
            'logoclient-14_18_11zon.jpg',
            'logoclient-15_19_11zon.jpg',
            'logoclient-16_20_11zon.jpg',
            'logoclient-17_21_11zon.jpg',
            'logoclient-18_22_11zon.jpg',
            'logoclient-19_23_11zon.jpg',
        ];

        // LAYANAN (slide 3)
        $services = Service::where('published', 1)
            ->orderBy('id', 'asc')
            ->take(9)
            ->get();

        
        // STORIES (slide 4 – portofolio)
        $stories = Portofolio::where('published', 1)
            ->orderBy('id', 'asc')
            ->take(9)
            ->get();

        // TESTIMONI KLIEN (slide 5)
        $testimonials = [
            [
                'logo'   => 'image/beranda/logoclient-1_5_11zon.jpg',
                'client' => 'KADIN Jawa Tengah',
                'quote'  => 'Workshop bersama Taggallery Agency membantu anggota KADIN memahami branding dan konten digital secara praktis. Cara Mas Tri mengajar sangat applicable sehingga pelaku usaha bisa langsung menerapkan strategi ke bisnisnya.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logoclient-2_6_11zon.jpg',
                'client' => 'Pemerintah Provinsi Jawa Tengah',
                'quote'  => 'Kolaborasi program dan dokumentasi visual bersama Taggallery Agency berjalan rapi dan profesional. Konten yang dihasilkan membantu mengangkat citra positif program pemerintah di mata masyarakat.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logoclient-3_7_11zon.jpg',
                'client' => 'Lazada (Program UMKM & Seller)',
                'quote'  => 'Melalui kelas konten dan foto produk, seller di platform kami jadi lebih paham cara tampil profesional. Materi dan pendampingan Taggallery Agency membuat performa konten dan konversi penjualan ikut meningkat.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logoclient-4_8_11zon.jpg',
                'client' => 'Semarang Wedding Community',
                'quote'  => 'Vendor-vendor wedding di komunitas kami terbantu dengan arahan styling dan konten visual dari Taggallery Agency. Hasil foto dan videonya menaikkan value layanan serta memudahkan kami promosi di media sosial.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logoclient-5_9_11zon.jpg',
                'client' => 'Pemerintah Kota Semarang',
                'quote'  => 'Walaupun suasana workshop santai dan banyak guyon, materi dan sesi praktik Mas Tri selalu on point. Peserta UMKM Kota Semarang mengaku lebih percaya diri dan beberapa berhasil scale-up bisnis setelah ikut pelatihan ini.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logoclient-6_10_11zon.jpg',
                'client' => 'Mitsubishi Dealer Semarang',
                'quote'  => 'Taggallery Agency selalu menghadirkan konten visual yang tepat sasaran untuk promosi unit dan event kami. Timnya responsif, profesional, dan penuh solusi kreatif dari perencanaan sampai eksekusi.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logoclient-7_11_11zon.jpg',
                'client' => 'Sun Motor Group',
                'quote'  => 'Workshop-nya praktis dan berbasis real project. Omzet dealer meningkat karena tim sales mampu menerapkan materi dan sesi prakteknya setelah mengikuti workshop bersama Taggallery Agency.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logoclient-8_12_11zon.jpg',
                'client' => 'Universitas Diponegoro',
                'quote'  => 'Mahasiswa kami lebih paham storytelling lewat konten visual. Setelah workshop, banyak potensi bisnis mahasiswa yang bermunculan karena mereka bisa mengemas ide dan projeknya dalam bentuk konten yang menarik.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logoclient-9_13_11zon.jpg',
                'client' => 'Politeknik Negeri Semarang (Polines)',
                'quote'  => 'Mahasiswa sebelumnya mengeluhkan pembelajaran yang terlalu textbook. Setelah berkolaborasi dengan Mas Triawanda, mereka merasa materi lebih mudah dipahami karena penjelasan dan studi kasusnya based on experience nyata di industri.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logoclient-10_14_11zon.jpg',
                'client' => 'Universitas Semarang',
                'quote'  => 'Berkat workshop ini, unit bisnis dan organisasi mahasiswa yang kami bina jadi lebih disiplin mencatat KPI dan kemajuan tim. Pendekatannya membuat mereka termotivasi membangun tim yang solid dan berorientasi hasil.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logoclient-11_15_11zon.jpg',
                'client' => 'Universitas Wahid Hasyim Semarang',
                'quote'  => 'Kolaborasi workshop bersama Taggallery Agency membantu mahasiswa lebih paham praktek branding dan konten digital. Banyak ide bisnis tugas kuliah yang akhirnya bisa dikemas jadi projek nyata.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logoclient-12_16_11zon.jpg',
                'client' => 'SMKN 1 Kendal',
                'quote'  => 'Siswa kami jadi lebih percaya diri mempresentasikan produk dan membuat konten. Materi dibawakan dengan bahasa yang dekat dengan anak SMK dan disertai simulasi langsung sehingga mudah diaplikasikan.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logoclient-13_17_11zon.jpg',
                'client' => 'SMK Negeri Kawunganten',
                'quote'  => 'Workshop berbasis project membuat siswa tidak hanya paham teori, tapi juga bisa memotret produk, menulis caption, dan membaca data insight untuk mengembangkan tugas bisnis mereka.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logoclient-14_18_11zon.jpg',
                'client' => 'Universitas Stikubank (UNISBANK)',
                'quote'  => 'Mahasiswa program bisnis dan kewirausahaan mendapat banyak insight praktis. Pendekatan Mas Tri yang based on experience membuat materi terasa relevan dengan dunia kerja dan dunia usaha.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logoclient-15_19_11zon.jpg',
                'client' => 'Pemerintah Kabupaten Banjarnegara',
                'quote'  => 'Program penguatan UMKM bersama Taggallery Agency membantu pelaku usaha lokal memperbaiki kemasan, foto produk, dan strategi konten. Beberapa peserta melaporkan peningkatan penjualan setelah pelatihan.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logoclient-16_20_11zon.jpg',
                'client' => 'BKK Provinsi Jawa Tengah',
                'quote'  => 'Pelatihan konten digital memudahkan kami menjangkau generasi muda pencari kerja. Peserta bilang, “cara Mas Tri mengajar applicable untuk usaha dan karier saya” karena disertai contoh nyata.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logoclient-17_21_11zon.jpg',
                'client' => 'Balatkop UKM Provinsi Jawa Tengah',
                'quote'  => 'Pendamping dan pelaku koperasi/UMKM mendapatkan panduan praktis menyusun konten promosi berbasis data. Fokusnya bukan hanya estetika, tapi juga bagaimana konten mendorong penjualan dan keanggotaan.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logoclient-18_22_11zon.jpg',
                'client' => 'Program Ekonomi Kreatif',
                'quote'  => 'Sesi bersama pelaku ekonomi kreatif diisi dengan studi kasus dan praktek langsung. Peserta belajar mengemas cerita brand mereka sehingga lebih menarik di media sosial dan marketplace.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logoclient-19_23_11zon.jpg',
                'client' => 'Komindo Sukses Sejahtera',
                'quote'  => 'Melalui pelatihan konten dan penguatan brand, anggota koperasi jadi lebih terarah mempromosikan produk. Mereka kini lebih disiplin mencatat KPI sederhana untuk memantau perkembangan usaha.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logo-testimoni-1_24_11zon.jpg',
                'client' => 'OPD di Lingkungan Pemkot Semarang',
                'quote'  => 'Walaupun penyampaian materi santai dan komunikatif, isi workshop selalu tepat sasaran. Peserta UMKM merasa terbantu menyusun strategi promosi dan beberapa berhasil naik kelas setelah mengikuti program.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logo-testimoni-2_25_11zon.jpg',
                'client' => 'Mitsubishi Motors Indonesia',
                'quote'  => 'Taggallery Agency membantu kami menyiapkan materi visual dan konten promosi untuk berbagai event dan kampanye penjualan. Tampilan kontennya rapi, sesuai brand guideline, dan mudah dipakai oleh tim sales di lapangan.',
                'rating' => '4.8/5',
            ],
            [
                'logo'   => 'image/beranda/logo-testimoni-3_26_11zon.jpg',
                'client' => 'Pertamina Program UMKM',
                'quote'  => 'Melalui pelatihan konten dan pendampingan digital, pelaku UMKM binaan Pertamina jadi lebih siap bersaing di ranah online. Strategi yang disusun bersama Taggallery Agency membuat engagement dan awareness program meningkat signifikan.',
                'rating' => '4.8/5',
            ],
        ];

        // ARTIKEL & INSIGHT (slide 6)
         $articles = Article::where('published', 1)
            ->orderBy('id', 'asc')
            ->take(6)
            ->get();

        // TIM KREATIF (slide 7)
        $teamMembers = [
            [
                'name'  => 'Triawanda Tirta Aditya',
                'role'  => 'Founder & CEO',
                'photo' => 'image/beranda/tim-1-ceo_36_11zon.jpg',

            ],
            [
                'name'  => 'Rizky',
                'role'  => 'Videographer',
                'photo' => 'image/beranda/tim-2-rizky_37_11zon.jpg',
            ],
            [
                'name'  => 'Gitta',
                'role'  => 'Project Manager',
                'photo' => 'image/beranda/tim-3-gitta_38_11zon.jpg',
                'photo_class' => 'team-photo-center',
            ],
            [
                'name'  => 'Afiz',
                'role'  => 'Videographer',
                'photo' => 'image/beranda/tim-4-afiz_39_11zon.jpg',
            ],
            [
                'name'  => 'Ghana',
                'role'  => 'Sosmed Specialist',
                'photo' => 'image/beranda/tim-5-ghana_40_11zon.jpg',
            ],
            [
                'name'  => 'Dimas',
                'role'  => 'Photographer',
                'photo' => 'image/beranda/tim-6-dimas_41_11zon.jpg',
            ],
            [
                'name'  => 'Dyah',
                'role'  => 'Finance Officer',
                'photo' => 'image/beranda/tim-7-dyah_42_11zon.jpg',
            ],
            [
                'name'  => 'Sony',
                'role'  => 'Graphic Designer',
                'photo' => 'image/beranda/tim-8-sony_43_11zon.jpg',
            ],
            [
                'name'  => 'Santika',
                'role'  => 'Copywriter',
                'photo' => 'image/beranda/tim-9-santika_44_11zon.jpg',
                'photo_class' => 'team-photo-santika',
            ],
            [
                'name'  => 'Dwiki',
                'role'  => 'Sosmed Specialist',
                'photo' => 'image/beranda/tim-10-dwiki_45_11zon.jpg',
            ],
            [
                'name'  => 'Irfan',
                'role'  => 'Videographer',
                'photo' => 'image/beranda/tim-11-irfan_46_11zon.jpg',
            ],
            [
                'name'  => 'Jimmy',
                'role'  => 'Photographer',
                'photo' => 'image/beranda/tim-12-jimmy_47_11zon.jpg',
            ],
            [
                'name'  => 'Estu',
                'role'  => 'Editor',
                'photo' => 'image/beranda/tim-13-estu_48_11zon.jpg',
            ],

        ];

        return view('home', [
            'logos'          => $logos,
            'services'       => $services,
            'stories'        => $stories,
            'testimonials'   => $testimonials,
            'articles'       => $articles,
            'teamMembers'    => $teamMembers,
            'categoryLabels' => $this->categoryLabels, // buat label kategori di slide artikel
        ]);
    }
}
