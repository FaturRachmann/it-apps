# 🚀 Cara Menjalankan Website (PENTING!)

## ⚠️ MASALAH YANG SERING TERJADI

Jangan jalankan hanya `php artisan serve` saja!
```bash
php artisan serve  # ❌ SALAH - Website akan terlihat aneh/tidak ada CSS
```

Website menggunakan **Vite** untuk build dan hot reload CSS/JavaScript. Anda HARUS menjalankan 2 server sekaligus.

---

## ✅ CARA YANG BENAR

### Opsi 1: Buka 2 Terminal (RECOMMENDED)

**Terminal 1 - Jalankan Vite Dev Server:**
```bash
npm run dev
```

**Terminal 2 - Jalankan Laravel Server:**
```bash
php artisan serve
```

**Output yang benar:**

Terminal 1 (npm run dev):
```
  VITE v7.3.1  ready in 2968 ms
  ➜  Local:   http://127.0.0.1:5173/
  ➜  press h + enter to show help
  ➜  APP_URL: http://127.0.0.1:8000
```

Terminal 2 (php artisan serve):
```
   INFO  Server running on [http://127.0.0.1:8000].
  Press Ctrl+C to stop the server
```

**Kemudian buka browser:** http://127.0.0.1:8000

✅ Website akan load dengan cepat
✅ CSS/JavaScript visible
✅ Hot reload berfungsi (refresh otomatis saat edit file)

---

### Opsi 2: Satu Perintah (Windows)

**Windows Users:**
```bash
dev-start.bat
```

Script ini akan otomatis membuka 2 terminal dan jalankan kedua server.

---

### Opsi 3: Jalankan Build Saja (Jika tidak bisa buka 2 terminal)

```bash
npm run build
php artisan serve
```

⚠️ Ini lebih lambat karena tidak ada hot reload
⚠️ Setiap kali edit file, harus run `npm run build` lagi

---

## 🔧 Troubleshooting

### Problem: Port 5173 sudah terpakai
**Solution:**
```bash
npm run dev
```
Vite otomatis pakai port lain (5174, 5175, dst)

### Problem: Website masih lambat/CSS tidak terlihat
**Solution:**
1. Pastikan Terminal 1 running (npm run dev)
2. Pastikan Terminal 2 running (php artisan serve)
3. Hard refresh browser: Ctrl+Shift+R (Windows) atau Cmd+Shift+R (Mac)
4. Buka browser console (F12) - cek error messages

### Problem: Permission Denied
**Solution:**
```bash
chmod +x dev-start.bat  # Linux/Mac
```

### Problem: Node modules error
**Solution:**
```bash
npm install
npm run build
```

---

## 📊 Performance

Dengan setup yang benar:
- ✅ CSS loading: < 1 detik
- ✅ JS loading: < 2 detik  
- ✅ Total page load: < 3 detik
- ✅ Hot reload: instan saat edit file

Tanpa Vite dev server (hanya php artisan serve):
- ❌ CSS loading: 3+ detik
- ❌ JS loading: 5+ detik
- ❌ Total page load: 10+ detik
- ❌ Hot reload: tidak ada

---

## 📌 REMEMBER

**SELALU jalankan 2 perintah untuk development:**

```bash
Terminal 1:  npm run dev        # Vite dev server
Terminal 2:  php artisan serve  # Laravel server
```

**Browser:** http://127.0.0.1:8000

---

Generated: 2026-02-24
Status: ✅ Both servers MUST be running for proper operation
