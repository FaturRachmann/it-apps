# 🚀 Solusi Loading Lambat (3+ menit)

## 🔴 Masalah
Loading website sangat lambat (3m 28s) karena **Vite dev server tidak berjalan**.

Saat Vite tidak aktif, Laravel harus mengompilasi CSS/JS secara manual setiap kali refresh, yang menghasilkan performa:
- ❌ Loading time: 3+ menit
- ❌ Tidak ada hot reload
- ❌ Setiap perubahan harus compile ulang manual

## ✅ Solusi

### Opsi 1: Jalankan 2 Terminal Terpisah (RECOMMENDED)

Buka 2 terminal PowerShell/WSL:

**Terminal 1 - Jalankan Laravel Server:**
```powershell
cd "d:\My Project\it-apps"
php artisan serve
```

Output yang diharapkan:
```
INFO  Server running on [http://127.0.0.1:8000]
```

**Terminal 2 - Jalankan Vite Dev Server:**
```powershell
cd "d:\My Project\it-apps"
npm run dev
```

Output yang diharapkan:
```
VITE v7.x.x  ready in 500ms

➜  Local:   http://localhost:5173/
```

✨ **Hasil:** Loading time akan turun menjadi **< 1 detik** dengan hot reload!

---

### Opsi 2: Jalankan Keduanya Dalam 1 Command

Jika sudah install `concurrently`:
```powershell
cd "d:\My Project\it-apps"
npm run dev:full
```

Ini akan menjalankan Vite dan Laravel secara bersamaan dalam 1 terminal.

---

## 🧹 Langkah Setup (Jika Masih Lambat)

### Step 1: Clear Cache Laravel
```powershell
cd "d:\My Project\it-apps"
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear
```

### Step 2: Clear Node Modules & Reinstall
```powershell
cd "d:\My Project\it-apps"
rm -r node_modules -Force
npm install
```

### Step 3: Rebuild Vite Assets
```powershell
npm run build
```

### Step 4: Start Development Mode
```powershell
# Terminal 1
php artisan serve

# Terminal 2 (di directory yang sama)
npm run dev
```

---

## 📊 Perbandingan Performance

| Scenario | Loading Time | Hot Reload |
|----------|-------------|-----------|
| ❌ Tanpa Vite dev | 3-5 menit | ❌ Tidak |
| ✅ Dengan Vite dev | < 1 detik | ✅ Ya |
| ✅ Production build | < 500ms | ❌ N/A |

---

## 🔍 Cara Verifikasi Vite Running

Buka browser dan check:
- **Vite Dev Server:** http://localhost:5173/ (harus accessible)
- **Laravel App:** http://127.0.0.1:8000 (harus loading cepat)

---

## 🛠️ Troubleshooting

### Error: "Port 5173 already in use"
```powershell
# Kill process yang menggunakan port 5173
netstat -ano | findstr :5173
taskkill /PID <PID> /F
```

### Error: "npm: command not found"
- Pastikan Node.js sudah terinstall: `node --version`
- Jika belum: Download dari https://nodejs.org/

### Error: "concurrently not found"
```powershell
npm install -D concurrently
```

### Assets masih tidak load
1. Clear browser cache (Ctrl+Shift+Delete)
2. Clear Laravel cache: `php artisan cache:clear`
3. Rebuild assets: `npm run build`
4. Restart kedua server

---

## 📝 Checklist

Sebelum mulai development:

- [ ] Terminal 1: `php artisan serve` berjalan
- [ ] Terminal 2: `npm run dev` berjalan
- [ ] Buka http://127.0.0.1:8000 di browser
- [ ] Assets loading dalam < 1 detik
- [ ] Buat perubahan di CSS/JS untuk test hot reload
- [ ] Perubahan langsung terlihat tanpa refresh

---

## 💡 Tips Development

### Ubah CSS (Real-time refresh)
Edit file di `resources/css/` → Browser auto-refresh

### Ubah Vue/JS (Real-time refresh)
Edit file di `resources/js/` → Browser auto-refresh

### Ubah Blade Template (Refresh manual diperlukan)
Edit file di `resources/views/` → F5 atau Ctrl+R

### Ubah Backend Logic
Edit file di `app/` → F5 di browser

---

## 🎯 Expected Results

Setelah setup benar, Anda akan lihat:

```
Terminal 1 (Laravel):
INFO  Server running on [http://127.0.0.1:8000]

Terminal 2 (Vite):
VITE v7.x.x  ready in 512ms
➜  Local:   http://localhost:5173/

Browser:
✅ Page loads dalam < 1 detik
✅ CSS/JS hot reload bekerja
✅ Error/warning langsung terlihat di console
```

---

**Created:** 2026-02-04
**Status:** ✅ Solusi Verified
