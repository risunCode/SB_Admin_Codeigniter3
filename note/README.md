# SB ADMIN BASE FOR SHOP
db name = `db_risun`

## Tabel berita
| Column Name   | Data Type | Length    |
|--------|------|------------|
| id_berita   | int   | 10    | Not Null |
| id_kategori   | int   | 10    | Not Null |
| id_user  | varchar   | 10   | Not Null |
| deskripsi   | text   | 255 |
| view   | int   | 255 |
| slug   | varchar   | 255 |
| created_at   | datetime   | 255 |
| updated_at   | datetime   | 255 |

## Tabel users
| Column Name   | Data Type | Length    |
|--------|------|------------|
| id_user   | int   | 10    | PK | Not Null | | Auto Incr? |
| nama_lengkap   | varchar   | 50    | Not Null |
| username  | varchar   | 50   | Not Null |
| email   | varchar   | 100 |  | Not Null |
| password   | varchar   | 100 |   | Not Null |
| level   | char   | 2 |  | Not Null |
| created_at   | datetime   |

## Tabel kategori
| Column Name   | Data Type | Length    |
|--------|------|------------|
| id_kategori   | int   | 10    | PK | Not Null |
| nama_kategori   | varchar   | 255    | Not Null |
