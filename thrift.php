<?php
class thriftitem{
    public const KODE_TOKO = "THRIFT-BDG";

    public static int $totalBarangLaku = 0;

    public string $namaBarang;
    public string $kategori;
    public int $hargaAwal;
    public int $diskon = 20000;

    public function __construct(string $namaBarang, string $kategori, int $hargaAwal)
    {
       $this->namaBarang = $namaBarang;
       $this->kategori = $kategori;
       $this->hargaAwal = $hargaAwal;

       self::$totalBarangLaku++;
    }
    public function hitungHargaAkhir()
    {
        return $this->hargaAwal - $this->diskon;
    }
    public function cetakStruk()
    {
         return "
        STRUK THRIFT SHOP <br><br>
        Kode Toko   : " . self::KODE_TOKO . "<br>
        Nama Barang : " . $this->namaBarang . "<br>
        Kategori    : " . $this->kategori . "<br>
        Harga Awal  : Rp " . number_format($this->hargaAwal, 0, ',', '.') . "<br>
        Diskon      : Rp " . number_format($this->diskon, 0, ',', '.') . "<br>
        Harga Akhir : Rp " . number_format($this->hitungHargaAkhir(), 0, ',', '.') . "<br>
        ________________________________________________________________________________<br>
        ";
    }
    public static function getTotalBarang()
    {
         return "Total barang terjual: " . self::$totalBarangLaku . " barang<br><br>";
    }
    public function __destruct()
    {
         echo "Transaksi untuk " . $this->namaBarang . " telah berhasil dicatat.<br>";
    }
}
$pelanggan1 = new thriftitem("Jaket Stone Island", "Jaket", 350000);

$pelanggan2 = new thriftitem("T-Shirt Bape", "T-Shirt", 500000);

echo $pelanggan1->cetakStruk();
echo "<br>";
echo $pelanggan2->cetakStruk();
echo "<br>";
echo ThriftItem::getTotalBarang();


?>