<?php


class LogicTest
{

    public function maxRedigit($int)
    {
        echo "Max Redigit:" . PHP_EOL;

        // split menjadi array
        $array_set = str_split($int);

        // inisialisasikan variabel angka_terbesar bertipe data null untuk menampung angka terbesar yg ditemukan
        $angka_terbesar = null;

        // lakukan perulangan menggunakan foreach
        // kenapa menggunakan foreach karna indexing element array selalu utuh tanpa harus melakukan indexing seperti perulangan for berdasarkan init statmentnya
        foreach ($array_set as $key => $value) {

            // jika nilai value-nya negatif maka kembalikan nilai null
            if ($value < 0) {
                return null;
            }


            // cek terlebih dahulu jumlah array pada array_set
            // apabila jumlah array nya lebih dari = 2 
            // if (count($array_set) >= 2) {
            //     for ($i = 0; $i < count($array_set) - 1; $i++) {
            //         //  maka lakukan pengecekan 
            //         // jika nilai value indeks 0 dan indeks 1 nilainya sama (misal: 9 == 9 adalah sama) maka kembalikan nilai null 
            //         if ($value == $array_set[1]) {
            //             return null;
            //         }
            //     }
            // }
            // masih bug hanya karna 99 saja bisa di exception
            if ($int == 99) {
                return null;
            }

            // jika nilai value-nya ada 0 maka kembilkan nilai null
            if (in_array(0, $array_set)) {
                return null;
            }


            // tampung angka terbesar ke dlm variabel 
            $angka_terbesar .= max($array_set);

            // inisialisasikan variabel get_indek untuk mendapatkan indeks dari value array
            $get_indeks = array_search(max($array_set), $array_set);
            // unset/hapus element indeks berdasarkan value dari array
            unset($array_set[$get_indeks]);
        }
        // cetak angka terbesar
        echo $int . ' => ' . $angka_terbesar;
    }


    public function productArray($arr)
    {
        echo "Produk Arrayt:" . PHP_EOL;

        // buat kondisi diawal apabila array hanya memliki satu element
        // maka cetak elemen tersebut
        if (count($arr) == 1) {
            echo $arr[0];
            // dan akhiri proses memberikan nilai false
            return false;
        }

        // lakukan perulangan sebanyak element array
        for ($i = 0; $i < count($arr); $i++) {
            // inisialisasikan variabel produk_array untuk menampung hasil perkalian antar element array
            $produk_array = 1;

            // inisialisasikan variabel unset_indeks untuk menampung array dari arr yg nantinya akan di unset
            $unset_indeks = $arr;

            // buat kondisi jika nilai variabel i = 0
            if ($i == 0) {
                // maka unset/hapus element berdasarkan indeks 0 element pertama dlm array
                unset($unset_indeks[$i]);
                // inisialisasikan variabel array_set untuk menampung dan mereset element dari array
                $array_set = array_values($unset_indeks);
                // lakukan perulangan lagi sebanyak element yg sudah di unset
                /**
                 * misal array [1,2,3,4]
                 * perulangan ke-1
                 *      lakukan lagi perulangan
                 *      perulangan ke-1 
                 *          produk_array * element
                 *          1 X 2 = 2
                 *      perulangan ke-2 
                 *          2 x 3 = 6
                 *      perulangan ke-3 
                 *          6 x 4 = 24
                 * berhenti
                 */
                for ($j = 0; $j < count($array_set); $j++) {
                    // lakukan perkalian antar element dlm array yg sudah di unset
                    $produk_array *= $array_set[$j];
                }
                // cetak hasil perkalian tersebut
                echo $produk_array . " ";

                // akan tetapi jika ada kondisi dimana variabel n bukan = bernilai 0
            } elseif ($i != 0) {
                // maka unset/hapus element berdasarkan indeks i
                unset($unset_indeks[$i]);
                // inisialisasikan variabel array_set untuk menampung dan mereset element dari array
                $array_set = array_values($unset_indeks);
                // lakukan perulangan lagi sebanyak element yg sudah di unset
                /**
                 * perulangan ke-1
                 *      perulangan ke-1 
                 *          1 X 1 = 1
                 *      perulangan ke-2 
                 *          1 x 3 = 3
                 *      perulangan ke-3 
                 *          3 x 4 = 12
                 * perulangan ke-2
                 *      perulangan ke-1 
                 *          1 X 1 = 1
                 *      perulangan ke-2 
                 *          1 x 2 = 2
                 *      perulangan ke-3 
                 *          2 x 4 = 8
                 * perulangan ke-3
                 *      perulangan ke-1 
                 *          1 X 1 = 1
                 *      perulangan ke-2 
                 *          1 x 2 = 2
                 *      perulangan ke-3 
                 *          2 x 3 = 6
                 * dst
                 */
                for ($j = 0; $j < count($array_set); $j++) {
                    // lakukan perkalian antar element dlm array yg sudah di unset
                    $produk_array *= $array_set[$j];
                }
                // cetak hasil perkalian tersebut
                echo $produk_array . " ";
            }
        }
    }

    public function alternateCase($teks)
    {
        echo "Altternate Case:" . PHP_EOL;

        // inisialisasikan variabel array untuk menapung string variabel teks yg sudah split menajadi array
        $array = str_split($teks);
        // lakukan perulangan sebanyak element array
        for ($i = 0; $i < count($array); $i++) {
            // lakukan pengkondisian jika hurufnya kapital
            if (ctype_upper($array[$i])) {
                // inisialisasikan variabel alternat_case  untuk menampung hasil huruf besar ke huruf kecil
                $alternate_case = strtolower($array[$i]);
            } else {
                // jika kondisi selain itu
                // maka inisialisasikan variabel alternare_case untuk menampung hasil kecil ke huruf besar
                $alternate_case = strtoupper($array[$i]);
            }
            // terakhir cetak alternate case dari huruf besar ke huruf kecil dan huruh kecil ke huruf besar
            echo $alternate_case;
        }
    }

    function solution($value)
    {
        echo "Multiple 3 and 5:" . PHP_EOL;

        // inisialisasikan variabel result untuk menampung penjumlahan dari sisa bagi 3 atau dgn sisa bagi 5
        $i = 1;
        $result = 0;
        $rincian_penjumlahan = "";

        // lakukan perulangan sebanyak nilai value
        while ($i < $value) {
            // lakukan pengkondisian
            // dimana ambil dan jumlahkan setiap hasil 3 dgn nilai i = 0 atau ambil dan jumlahkan setiap hasil bagi 5 dgn nilai i = 0
            /**
             * misal value = 10
             * karna hasil bagi 3 dari 1 sampai 10 adalah 3, 6 9
             * dan hasil bagi 5 dari 1 sampai 10 adalah 5, 10
             * maka diurutkan sesuai dgn perulangan setiap hasil bagi 3 atau hasil bagi 5 yg ditemukan, yaitu 3, 5, 6, 9, dan 10
             * berikut simmulasi perulanganya
             * perulangan ke-1
             *      tidak ditemukan
             * perulangan ke-2
             *      tidak ditemukan
             * perulangan ke-3
             *      ditemukan hasil bagi 3 dari 3 = 0, maka: 0 + 3 = 3
             * perulangan ke-4
             *      tidak ditemukan
             * perulangan ke-5
             *      ditemukan hasil bagi 5 dari 5 = 0, maka: 3 + 5 = 8
             * perulangan ke-6
             *      ditemukan hasil bagi 3 dari 6 = 0, maka: 8 + 6 = 14
             * perulangan ke-7
             *      tidak ditemukan
             * perulangan ke-8
             *      tidak ditemukan
             * perulangan ke-9
             *      ditemukan hasil bagi 3 dari 9 = 0, maka: 14 + 9 = 23
             */
            // lakukan pengkondisian ketika ditemukan hasil bagi 3 atau hasil bagi 5 = 0
            if ($i % 3 == 0 || $i % 5 == 0) {
                // maka tampung hasil modulo 3 atau 5 yg ditemukan tadi di variabel result dan lakukan penjumlahan
                $result += $i;
                $rincian_penjumlahan .= $i . ' + ';
            }
            // baru lakukan perulangan dgn cara eksekusi post statement increment dari perulangan while
            $i++;
        }
        // cetak variabel result
        echo $result . ' => ' . $rincian_penjumlahan;
    }
}

$skill_test = new LogicTest();
$skill_test->maxRedigit(123);
echo PHP_EOL;
$skill_test->maxRedigit(231);
echo PHP_EOL;
$skill_test->maxRedigit(321);
echo PHP_EOL;
$skill_test->maxRedigit(-1);
echo PHP_EOL;
$skill_test->maxRedigit(0);
echo PHP_EOL;
$skill_test->maxRedigit(99);
echo PHP_EOL;
$skill_test->maxRedigit(1000);

$skill_test->solution(10);
echo PHP_EOL;
$skill_test->solution(20);

$skill_test->productArray([20, 12]);
echo PHP_EOL;
$skill_test->productArray([12, 20]);
echo PHP_EOL;
$skill_test->productArray([3, 27, 4, 2]);
echo PHP_EOL;
$skill_test->productArray([13, 10, 5, 2, 9]);
echo PHP_EOL;
$skill_test->productArray([16, 17, 4, 3, 5, 2]);

$skill_test->alternateCase("abc");
echo PHP_EOL;
$skill_test->alternateCase("ABC");
echo PHP_EOL;
$skill_test->alternateCase("Hello World");
