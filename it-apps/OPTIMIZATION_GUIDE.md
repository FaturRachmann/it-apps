# Performance Optimization Guide

## 🚀 Mempercepat Development Loading

### Masalah
Loading website sangat lama (3+ menit) pada request pertama setelah menjalankan `php artisan serve`.

### Penyebab
1. **Vite dev server belum berjalan** - Assets (CSS/JS) tidak ter-compile
2. **Laravel melakukan full recompilation** saat pertama kali
3. **Network latency** dari WSL ke Windows

### Solusi Cepat

#### ✅ Opsi 1: Menjalankan Vite + Laravel Secara Bersamaan (Recommended)

**Windows:**
```powershell
# Di terminal pertama - jalankan Vite dev server
npm run dev

# Di terminal kedua - jalankan Laravel server
php artisan serve
```

**Linux/Mac:**
```bash
# Opsi A: Menggunakan concurrently (sudah di-install)
npm run dev:full

# Opsi B: Jalankan di dua terminal terpisah
# Terminal 1:
npm run dev

# Terminal 2:
php artisan serve
```

#### ✅ Opsi 2: Build Production Assets & Jalankan Artisan Serve

```bash
# Sekali waktu saja
npm run build

# Kemudian jalankan Laravel server
php artisan serve
```

> **Note:** Setelah build, Anda tidak perlu Vite dev server lagi sampai Anda mengubah CSS/JS.

---

## 📊 Perbandingan Speed

| Method | First Load | Subsequent Loads | Notes |
|--------|-----------|-----------------|-------|
| ❌ Hanya `php artisan serve` | ~3m+ | ~3s | Vite tidak berjalan, slow HMR |
| ✅ Vite + Laravel (concurrent) | ~30s | ~0.5s | **Recommended untuk development** |
| ✅ Built assets + artisan serve | ~5s | ~2s | Best untuk production-like testing |

---

## 🔧 Optimasi Lanjutan

### 1. **Clear Laravel Cache**
```bash
php artisan config:clear
php artisan view:clear
php artisan cache:clear
php artisan route:clear
```

### 2. **Rebuild Node Modules** (jika ada issue)
```bash
rm -rf node_modules
npm ci
npm run dev
```

### 3. **Optimize PHP Performance** (Windows)
Buka `php.ini` dan sesuaikan:
```ini
memory_limit = 512M
max_execution_time = 120
upload_max_filesize = 64M
post_max_size = 64M
```

### 4. **WSL Performance Tips** (jika menggunakan WSL)
```bash
# Jangan jalankan dari Windows path, gunakan WSL path
cd ~/projects/it-apps

# Update WSL
wsl --update

# Gunakan WSL2 filesystem, jangan /mnt/d
```

### 5. **Disable Unused Features**
Di `config/app.php`:
```php
'debug' => env('APP_DEBUG', false), // Set ke false saat development if not needed
```

---

## 📝 Script Shortcut

### Windows Batch File
Cukup double-click `dev-start.bat`:
```batch
@echo off
start cmd /k "npm run dev"
timeout /t 3 /nobreak
php artisan serve
```

### Shell Script (Linux/Mac)
```bash
chmod +x dev-start.sh
./dev-start.sh
```

---

## 🔍 Debugging Slow Load

### Check Vite Dev Server Status
```bash
# Vite should be running on http://localhost:5173
curl -I http://localhost:5173
```

### Check Laravel Output
```bash
php artisan serve --verbose
```

### Inspect Hot File
```bash
# Check if hot file exists
cat public/hot
# Should contain: http://localhost:5173
```

---

## ✨ Best Development Workflow

1. **Terminal 1 - Vite Dev Server**
   ```bash
   npm run dev
   ```
   Output: `➜  Local:   http://localhost:5173/`

2. **Terminal 2 - Laravel Server**
   ```bash
   php artisan serve
   ```
   Output: `Server running on [http://127.0.0.1:8000]`

3. **Terminal 3 - Monitor Logs (Optional)**
   ```bash
   tail -f storage/logs/laravel.log
   ```

4. **Open Browser**
   - Visit: `http://127.0.0.1:8000`
   - Assets loaded dari: `http://localhost:5173`

---

## 🎯 Performance Checklist

- [ ] Vite dev server berjalan di terminal terpisah
- [ ] Tidak ada errors di console browser (F12)
- [ ] CSS/JS ter-load dari `localhost:5173` (check Network tab)
- [ ] Page load time < 2 detik untuk subsequent requests
- [ ] No 404 errors pada assets

---

## 📚 Referensi

- [Laravel Vite Documentation](https://laravel.com/docs/11.x/vite)
- [Vite Server Configuration](https://vitejs.dev/config/server-options.html)
- [Tailwind CSS Vite Setup](https://tailwindcss.com/docs/installation)

---

## ⚡ Quick Commands Reference

```bash
# Development
npm run dev              # Start Vite dev server
php artisan serve       # Start Laravel server
npm run dev:full        # Start both (menggunakan concurrently)

# Production
npm run build           # Build assets
php artisan optimize    # Optimize Laravel

# Cleanup
php artisan cache:clear
php artisan view:clear
npm run dev -- --clear # Clear Vite cache
```

---

**Last Updated:** 2026-02-04
**Status:** ✅ Optimized Configuration Ready
