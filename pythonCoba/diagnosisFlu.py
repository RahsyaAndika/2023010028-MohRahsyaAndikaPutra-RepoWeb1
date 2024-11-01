# Program untuk mendiagnosis gejala flu

# Mengambil input dari pengguna
suhu = float(input("Masukkan suhu tubuh Anda (dalam °C): "))
batuk = input("Apakah Anda mengalami batuk? (ya/tidak): ").strip().lower()

# Menentukan kondisi berdasarkan input
demam = suhu > 37.5
mengalami_batuk = batuk == 'ya'

# Menggunakan logika if-else untuk mendiagnosis
if demam and mengalami_batuk:
    print("Kemungkinan Anda terkena flu.")
elif demam or mengalami_batuk:
    print("Gejala belum cukup mengindikasikan flu.")
else:
    print("Tidak ada indikasi flu.")