<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "product_guntur";

// Buat koneksi
$conn = new mysqli($servername, $username, $password);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

// Kode SQL untuk membuat database dan tabel, serta memasukkan data
$sql = "
SET SQL_MODE = 'NO_AUTO_VALUE_ON_ZERO';
START TRANSACTION;
SET time_zone = '+00:00';

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

CREATE DATABASE IF NOT EXISTS $dbname;
USE $dbname;

CREATE TABLE IF NOT EXISTS `product` (
  `id` varchar(30) NOT NULL,
  `name` varchar(50) NOT NULL,
  `photo` varchar(300) NOT NULL,
  `location` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `price` int(15) NOT NULL,
  `link_product` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO `product` (`id`, `name`, `photo`, `location`, `description`, `price`, `link_product`) VALUES
('1', 'Infarm Nutrisi AB Mix Besar Organik untuk 1000 Lit', 'image-1.webp', 'DKI Jakarta, Kota Jakarta Barat', 'Keunggulan Nutrisi AB MIX Infarm <br>\n1. Mengandung unsur hara lengkap baik unsur makro ( N, P, K, Ca, Mg, dan S ) dan unsur mikro ( Fe, Mn, B, Zn, Cu, dan Mo ) bagi tanaman untuk menghasilkan kualitas dan kuantitas produksi yang optimal<br>\n2. Mudah diserap oleh tanaman<br>\n3. Bahan penyusun AB Mix 100% larut dalam air sehingga tidak menyumbat sistem irigasi tetes<br>\n4. Cocok untuk berbagai jenis tanaman<br>\n5. Selain untuk hidroponik, pupuk juga dapat digunakan sebagai pupuk kocor pada media tanah dan media lainnya<br>\n6. Berat pupuk 2100 gram yang dapat dilarutkan menjadi 1 liter larutan pekat yang dapat diencerkan menjadi 1000', 125000, 'https://shorturl.at/efnyP'),
('10', 'PH UP 250ml', 'image-10.jpeg', 'Kabupaten Sidoarjo', 'pH Up : Untuk menaikkan pH air.\npH yang disarankan untuk tanaman adalah 5.5-6.5.\n\nPETUNJUK PEMAKAIAN :\n- Gunakan pH meter untuk mengukur pH larutan nutrisi\n- Jika kurang dari dari 5.5, tambahkan larutan pH Up sedikit demi sedikit, Kemudian aduk rata.\n- Jika lebih dari 6.5, tambahakan larutan pH Down sedikit demi sedikit, Kemudian aduk rata.\n- ukur kembali pH\n- Ulangi sampai didaparkan pH yang diinginkan.', 14250, 'https://shopee.co.id/product/92892728/5803140709'),
('11', 'pH DOWN 1 Liter dari Asam Nitrat 10% dan Air RO', 'image-11.jpeg', 'Kota Jakarta Barat', 'Terbuat dari Asam Nitrat 10 % dan air RO (Reverse Osmosis) yang tidak mempengaruhi TDS larutan nutrisi hidroponik (tidak mempengaruhi komposisi Nutrisi AB Mix) sehingga penyerapan nutrisi oleh akar tanaman menjadi optimal dan tanaman hidroponik tumbuh dengan baik.\n\nPETUNJUK PEMAKAIAN :\n- Gunakan pH meter untuk mengukur pH larutan nutrisi.\n- Jika kurang dari 5.5, tambahkan larutan pH Up sedikit demi sedikit, kemudian aduk rata.\n- Jika lebih dari 6.5, tambahkan larutan pH Down sedikit demi sedikit, kemudian aduk rata.\n- Ukur kembali pH.\n- Ulangi sampai didapatkan pH yang diinginkan.', 35000, 'https://shopee.co.id/product/16762501/7860434862'),
('12', 'Pupuk Mono Kalium Fosfat Phosphate Hidroponik 1 Kg', 'image-12.webp', 'Kota Jakarta Barat', 'MerokeMKP® adalah pupuk kristal yang ideal untuk tanaman hortikultura. Pupuk ini mudah larut dalam air, bebas Amonium, dan dapat dicampur dengan pupuk lain. MerokeMKP® dapat meningkatkan pembungaan dan pembuahan tanaman, memperkuat batang dan akar tanaman, meningkatkan kualitas hasil panen, dan meningkatkan ketahanan tanaman terhadap hama dan penyakit.\n\nManfaat MerokeMKP®:\nMeningkatkan pembungaan dan pembuahan tanaman.\nMemperkuat batang dan akar tanaman.\nMeningkatkan kualitas hasil panen.\nMeningkatkan ketahanan tanaman terhadap hama dan penyakit.', 65000, 'https://shorturl.at/wFZ13'),
('13', 'Rockwool Hidroponik Cultilene 180 Kotak', 'image-13.jpg', 'Kabupaten Sukoharjo', 'Rockwool merupakan salah satu media tanam yang banyak digunakan oleh petani/hobiis hidroponik di Indonesia. Media tanam ini menyerupai busa, memiliki serabut halus dan sangat ringan. Rockwool mempunyai kelebihan dibandingkan dengan media lainnya terutama dalam hal perbandingan komposisi air dan udara yang dapat disimpannya.\n\n𝗖𝗮𝗿𝗮 𝗽𝗮𝗸𝗮𝗶\n1. Rendam potongan tersebut dalam air.\n2. Atur rockwool dalam tray semai. Jika tidak ada tray semai khusus, cukup gunakan wadah dari nampan atau baki plastik\n3. Buat lubang tanam menggunakan tusuk gigi.\n4. Semai benih dalam rockwool.\n5. Setelah bibit tumbuh, pindahkan ke netpot dan pelihara hingga panen.', 33750, 'https://www.tokopedia.com/kireinanursery/rockwool-hidroponik-cultilene-180-kotak'),
('14', 'Kit Hidroponik NFT Horizontal 3M 300 LT TRAPESIUM ', 'image-14.jpg', 'Kabupaten Tangerang', 'Cocok untuk tanaman sayuran daun Lengkap, sudah termasuk bibit, rockwool, pupuk dan tempat penyemaian. Disertai petunjuk penggunaan, Pompa tidak berisik, Cukup hemat listrik, Jarak antar talang 8 cm, lebih lebar, Talang trapesium, aliran air fokus ke tengah ke posisi net pot, Supply oksigen lebih banyak sehingga hasil panen bisa optimal\n\nDimensi Packing :\nBox1 (Box Container DKK) 90 Liter = 75x50x59 cm (1 Box)\nBox 2 (Rangka + Talang) = 310x25x20 cm (2 box)\nBox 3 (Solartuff + Rangka Atap) = 250x30x30 (1 Box)', 9860000, 'https://www.tokopedia.com/jirifarm/kit-hidroponik-nft-horizontal-3m-300-lt-trapesium-plus-atap-insect-net'),
('15', 'Hidroponik Set DFT Pipa 2,5 Inch Import 108 Lubang', 'image-15.jpeg', 'Kota Surabaya', 'Sistem hidroponik lengkap untuk ditempatkan di luar ruangan, dengan sinar matahari yang mencukupi.\n\nSET HIDROPONIK:\n1. Pipa Food Grade 2,5 inch, rangka, dan panduan instalasi\n2. Netpot dengan desain yang memiliki paten\n3. Spons media tanam\n4. Pompa air\n5. Bimbingan online untuk pemasangan dan pemeliharaan oleh tim PetsNPlants.id\n\nSET TAMBAHAN:\n1. Nutrisi AB Mix\n2. TDS meter\n3. PH meter\n4. Benih pakchoy original pack\n5. Tangki nutrisi 30 liter\n6. Seeding tray (Nampan plastik)\n\nUkuran:\nPanjang 100 cm, Lebar 50 cm, Tinggi 120 cm (Jarak antar tingkat 30 cm)', 1388000, 'https://www.tokopedia.com/petsnplantsid/petsnplants-id-hidroponik-set-dft-pipa-2-5-inch-import-108-lubang-set-hidroponik-ed6cc'),
('16', 'Instalasi Hidroponik POWER 1 Set', 'image-16.jpg', 'Kabupaten Blitar', 'Instalasi Hidroponik POWER 1 Set\n\nPIPA POWER satu-satunya pipa tanpa timbal sangat dianjurkan sebagai media tanam hidroponik. Untuk diperhatikan produk ini hanya berisi pipa 1 set saja belum ada rak penyangganya.\n\nHIDROPONIK adalah budidaya menanam dengan memanfaatkan air tanpa menggunakan tanah dengan menekankan pada pemenuhan kebutuhan nutrisi bagi tanaman.', 375000, 'https://shopee.co.id/product/34628484/1686758008'),
('2', 'Infarm Nutrisi AB Mix Selada Pupuk Organik', 'image-2.webp', 'DKI Jakarta, Kota Jakarta Barat', 'Lets grow with us\n1. Dengan kamu membeli berarti kami harus memastikan mengajarkan cara bertanam yang baik dan benar.\n2. Infarm.id telah menyiapkan tim khusus untuk memantau pergerakan paketmu dan memastikan benar kamu yang menerima\n3. Kamu bisa memilih ekspedisi terbaik di daerahmu agar paket cepat sampai\n4. Kamu juga boleh melakukan pemesanan cod jika masih ragu kualitas paket Infarm yang terbaik\n5. Jika barang yang datang tidak sesuai yang dipesan maka ada jaminan pengiriman ulang atau refund', 30000, 'https://shorturl.at/vMPRU'),
('3', 'Nutrisi AB Mix Pro Sayuran Daun Siap Pakai 5 Liter', 'image-3.jpeg', 'Kota Surakarta', 'BISA DIPAKAI UNTUK SEKITAR 1000 LITER LARUTAN NUTRISI\n\nAB MIX PRO LEAF VEGETABLE diciptakan  melalui hasil riset yang detail dari tim hidroponik kami sehingga memberikan dampak yang signifikan untuk pertumbuhan sayuran daun seperti selada, kangkung, bayam, sawi, dan lainnya.\n\nAB MIX PRO LEAF VEGETABLE terdiri dari unsur makro (N, P, K, Ca, Mg, S) daN Mikro (Zn, CU, Fe, B) yang dibutuhkan tanaman dalam tumbuh kembangnya.\n\nCARA PAKAI :\nMASUKKAN MASING-MASING PEKATAN SECARA BERIMBANG KE AIR SAMPAI TERCAPAI TARGET TDS YANG DIHARAPKAN UNTUK TANAMAN ANDA.', 95000, 'https://shorturl.at/lmxK1'),
('4', 'Nutrisi Hidroponik AB Mix Sayuran Daun 250gr untuk', 'image-4.webp', 'Jakarta Timur', 'Mengandung unsur hara lengkap baik unsur makro ( N, P, K, Ca, Mg, dan S ) dan unsur mikro ( Fe, Mn, B, Zn, Cu, dan Mo ) bagi tanaman untuk menghasilkan kualitas dan kuantitas produksi yang optimal.\nMudah diserap oleh tanaman.\nBahan penyusun AB Mix 100% larut dalam air sehingga tidak menyumbat sistem irigasi tetes.\nCocok untuk berbagai jenis tanaman budidaya seperti paprika, cabe, tomat, mentimun, sayuran daun, melon, semangka, dll.\nJenis tanaman : Selada, pakchoi, bayam, kangkung, kubis, sawi, seledri, herba, buncis, kacang panjang, bawang, dll', 30300, 'https://shorturl.at/gjkuX'),
('5', 'Nutrisi Hidroponik AB Mix Sayuran Daun Tanaman Bua', 'image-5.jpg', 'Kota Semarang', 'SAYURAN DAUN, SAYURAN/TANAMAN BUAH & SAYUR/TANAMAN BUNGA\nKEPEKATAN LEBIH PEKAT DENGAN UKURAN 1300 PPM\nLEBIH TINGGI DAN HEMAT NUTRISI PEKATAN\n\nTERDIRI DARI 3 VARIAN TANAMAN\n\n1. SAYURAN DAUN\nKhusus digunakan untuk sayuran yang dipanen bagian daunnya\nSeperti Selada, Sawi, Pakcoy, Bayam, Kangkung, Kailan, Kale, Seledri, Mint, Basil, Oregano dll\n\n2. SAYUR / TANAMAN BUAH\nKhusus digunakan untuk sayuran yang dipanen bagian bagian buahnya atau mengalami proses generatif\nSeperti Anggur, Melon, Timun, Semangka, Cabe, Terong, Tomat, Paprika dll\n\n3. SAYUR / TANAMAN BUNGA\nKhusus digunakan untuk tanaman yang dinikmati bunganya\nSeperti Kembang Kol, Brokoli, Anggrek, Adenium, Euphorbia, Krisan, Bunga Matahari, Mawar, dll.\n\nIsi Paket :\n1 x Serbuk pupuk Makro A (Pupuk A)\n1 x Serbuk pupuk Mikro A (Serbuk Kecil A)\n1 x Serbuk pupuk Makro B (Pupuk B)\n1 x Serbuk pupuk Mikro B (Serbuk Kecil B)', 30000, 'https://www.tokopedia.com/lubukhatishop2/nutrisi-hidroponik-ab-mix-sayuran-daun-tanaman-buah-bunga-1300-ppm'),
('6', 'Nutrisi hidroponik hidromix pupuk hidroponik', 'image-6.jpeg', 'Kabupaten Ponorogo', 'Hidromix diformulasikan untuk mencukupi kebutuhan tanaman khususnya hidroponik. Pupuk hidromix adalah pupuk hidroponik abmix yang terdiri dari unsur lengkap makro dan mikro yang dibutuhkan tanaman untuk hidup. pupuk AB MIX diperlukan untuk budidaya tanaman hidroponik.\n\nPupuk hidromix berat bersih 260g untuk pekatan 1/2 Liter dan bisa diencerkan menjadi pupuk siap pakai menjadi 100 Liter.', 17000, 'https://shopee.co.id/product/40549037/13633225528'),
('7', 'Pupuk Ultradap Pak Tani 1kg Nitrogen Phospate Sapr', 'image-7.jpg', 'Kabupaten Sidoarjo', 'Pupuk Ultradap memiliki unsur hara Nitrogen dan Phosphate berbentuk butiran kristal, mudah larut dalam air, dengan cara aplikasi dikocor, atau semprot. Berfungsi untuk merangsang pertumbuhan akar, pembentukan batang dan bunga dan cocok untuk semua jenis tanaman pangan / horti.', 85000, 'https://www.tokopedia.com/amanahter-2/pupuk-ultradap-pak-tani-1kg-nitrogen-phospate-saprotan-utama'),
('8', 'Meroke KALINITRA 1 kg - Pupuk Kalium Nitrat Hidrop', 'image-8.jpg', 'Jakarta Barat', 'Spesifikasi MerokeKALINITRA®:\n- Kelarutan (pada suhu 20°C) 315 g/L air\n- EC (1 g/L pada suhu 25°C) 1,3 mS/cm\n- pH (1 % larutan) 8-9\n\nMerokeKALINITRA® adalah pupuk dengan bentuk kristal, putih bersih dengan Nitrogen (N) dan Kalium (K) larut air, menjadi pilihan yang sesuai untuk tanaman hortikultura secara luas. Bentuknya kristal sehingga kelarutannya di air sangat cepat.\n\nMerokeKALINITRA® memiliki rasio N/K sekitar 1/3 sehingga sangat sesuai bila dipakai selama pembentukan bunga dan pembesaran atau produksi buah.\n\nMerokeKALINITRA® dapat dicampur dengan larutan pupuk larut air lainnya, sesuai diaplikasikan pada semua sistem fertigasi seperti: hidroponik, sistem drip/tetes, sprinkel, sistem pivot, atau pun dengan penyemprotan sebagai foliar.', 68000, 'https://tokopedia.link/O10dOVSKgJb'),
('9', 'Paket pH Up dan pH down Hidroponik 500 ml', 'image-9.jpeg', 'Kota Semarang', 'KEGUNAAN :\nUntuk menurunkan pH larutan nutrisi/ac.\n pH yang disarankan untuk tanaman adalah 5.5-6.5.\n\nPETUNJUK PEMAKAIAN :\n- Ukur pH air anda dengan pH meter\n- Untuk menurunkan pH, tambahkan pH Down sedikit demi sedikit. Kemudian aduk rata.\n- Untuk menaikkan pH, tambahkan pH Up sedikit demi sedikit. Kemudian aduk rata.\n- Ukur kembali pH\n- Ulangi sampai didaparkan pH yang diinginkan.', 20800, 'https://shopee.co.id/product/34640423/4184895359');

ALTER TABLE `product`
  ADD PRIMARY KEY (`id`);

COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
";

// Eksekusi query SQL
if ($conn->multi_query($sql) === TRUE) {
    echo "Database dan tabel berhasil dibuat, serta data berhasil dimasukkan.";
} else {
    echo "Error: " . $conn->error;
}

// Tutup koneksi
$conn->close();
?>
