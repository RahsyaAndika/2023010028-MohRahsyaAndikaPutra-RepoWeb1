# Program untuk mengecek kelayakan pengajuan pinjaman

# Mengambil input dari pengguna
umur = int(input("Masukkan umur Anda: "))
pendapatan = float(input("Masukkan pendapatan bulanan Anda (dalam Rp): "))

# Menentukan syarat kelayakan
syarat_umur = 21
syarat_pendapatan = 3000000

# Memeriksa apakah pengguna memenuhi syarat
if umur >= syarat_umur and pendapatan >= syarat_pendapatan:
    print("Anda memenuhi syarat untuk pengajuan pinjaman.")
else:
    print("Anda belum memenuhi syarat untuk pengajuan pinjaman.")