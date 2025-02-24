import pandas as pd

# Data Anda
categories = {
    "PENGURUS HARIAN": [
        ("Ahmad Nasrul Abbas", "Kudus 29 Juli 2005", 2019),
        ("Reva Arya Priatama", "Kudus 05 Oktober 2006", 2019),
        ("Muhammad Ariq Fikri", "Kudus 18 Mei 2003", 2021),
        ("Muhammad Soleh Amaliah Romadhon", "Pekalongan 21 Desember 2002", 2021),
        ("Muhammad Budi Priyadi", "Kudus 22 Desember 2003", 2021),
        ("Mohammad Rahsya Andika Putra", "Kudus 15 Januari 2006", 2022),
        ("Muhammad Rifky Ilham", "Kudus 24 Maret 2006", 2022),
        ("Rizqi Ramadhani", "Kudus 16 September 2007", 2023),
        ("Muhammad Nashiruddin", "Jepara 23 Maret 2003", 2021),
        ("Muhammad Hirzun Nama", "Kudus 2 Desember 2005", 2019),
        ("Muhammad Shofa Azmi", "Kudus 1 Juli 2005", 2021),
        ("Mohammad Azkiya Najmal Falach", "Kudus 25 Maret 2008", 2019),
        ("Muhammad Daffa Andhika Putra", "Kudus 24 Agustus 2006", 2023)
    ],
    "DEPARTEMEN ORGANISASI": [
        ("Muhammad Ma'ruf", "Kudus 27 Juni 2007", 2019),
        ("Rizal Maulana Huda", "Kudus 29 Mei 2005", 2019),
        ("Muhammad Ragil Syahputra", "Kudus 22 November 2006", 2023),
        ("Muhammad Abdul Anzis", "Kudus 11 April 2007", 2023),
        ("Muhammad Amirul Mustofa", "Kudus 19 Mei 2006", 2022),
        ("Muhammad Syafarudin Ramadhani", "Kudus 30 Januari 2006", 2022)
    ],
    "DEPARTEMEN KADERISASI": [
        ("Muhammad Nailul Muna", "Kudus 22 November 2005", 2017),
        ("Ahmad Syu'kur Ya'kub", "Kudus 12 November 2008", 2022),
        ("Muhammaf Miftakhul Khoir", "Kudus 13 Juni 2006", 2021),
        ("Muhammad Jalaludin Hamid", "Kudus 3 Mei 2005", 2022),
        ("Muhammad Miftakhur Rozikin", "Kudus 22 Maret 2005", 2023),
        ("Ahmad Nasrullah Khambali", "Kudus 1 April 2004", 2023),
        ("Muhammad Ilham Kholili", "Kudus 11 Desember 2003", 2024)
    ],
    "DEPARTEMEN DAKWAH": [
        ("Muhammad Durrun Nafis", "Kudus 13 Januari 2005", 2019),
        ("Muhammad Rizhal Firmansyah", "Kudus 13 Maret 2006", 2022),
        ("Ahmad Shofil Fu’ad", "Kudus 7 Juli 2006", 2022),
        ("Muhammad Nailal Farochi", "Kudus 15 Juni 2005", 2021),
        ("Mustaqim", "Kudus 28 November 2006", 2021),
        ("Muhammad Rijalul Fikri", "Kudus 15 Juni 2008", 2023),
        ("Muhammad Ulwanul Hakim", "Kudus 2 September 2003", 2017)
    ],
    "DEPARTEMEN OLAHRAGA SENI DAN DUBAYA": [
        ("Atid Ibrohim Sarmada", "Kudus 14 Januari 2007", 2023),
        ("Fakhris Amali", "Kudus 19 Agustus 2003", 2017),
        ("Andi Kurniawan", "Kudus 21 Mei 2007", 2023),
        ("Nurul Mustofa", "Kudus 13 Juni 2004", 2017),
        ("Kaisyal Akmal", "Kudus 7 Desember 2008", 2023),
        ("Syarifudin Hidayat", "Kudus 2 Agustus 2005", 2019),
        ("Muhammad Afifi Al-Ayyubi", "Kudus 22 Juli 2006", 2019)
    ],
    "LEMBAGA CBP": [
        ("Muhammad Daffa Andhika Putra", "Kudus 24 Agustus 2006", 2023),
        ("Muhammad Iqbal Farhan", "Kudus 23 Desember 2006", 2019),
        ("Muhammad Surya Syahputra", "Kudus 11 November 2006", None),
        ("Muhammad Ma’ruf Irsyad", "Kudus 1 Juli 2005", 2021)
    ],
    "LEMBAGA PERS DAN PENERBITAN": [
        ("Muhammad Ariq Fikri", "Kudus 18 Mei 2003", 2021),
        ("Muhammad Rifki Ilham", "Kudus 24 Maret 2006", 2022),
        ("Mauludin Khoirul Anam", "Kudus 2 April 2005", 2017),
        ("Muhammad Riski Ramadhani", "Kudus 16 September 2007", 2022)
    ]
}

# Buat DataFrame
data = []
for category, items in categories.items():
    for item in items:
        data.append({
            "Kategori": category,
            "Nama": item[0],
            "TTL": item[1],
            "Tahun": item[2]
        })

df = pd.DataFrame(data)

# Simpan ke Excel
df.to_excel('C:/Users/HP ELITBOOK/Documents/ME/data.xlsx', index=False)

