import mysql.connector

# Menghubungkan ke database
db = mysql.connector.connect(
    host="localhost",
    user="rahsya",  # Ganti dengan username Anda
    password="123asek",  # Ganti dengan password Anda
    database="db_macak"  # Ganti dengan nama database Anda
)

cursor = db.cursor()
cursor.execute("SELECT * FROM db_macak")  # Ganti dengan nama tabel Anda

for row in cursor.fetchall():
    print(row)

db.close()