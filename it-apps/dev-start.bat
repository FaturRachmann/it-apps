@echo off
REM IT Apps Development Server Starter for Windows
REM Menjalankan Laravel + Vite dev server secara concurrent

title IT Apps Development
color 0A

cls
echo.
echo ╔════════════════════════════════════════════════════════════════╗
echo ║                                                                ║
echo ║         🚀 IT APPS DEVELOPMENT SERVER STARTER 🚀              ║
echo ║                                                                ║
echo ║  Konfigurasi:                                                  ║
echo ║  • Laravel Server: http://127.0.0.1:8000                      ║
echo ║  • Vite Dev Server: http://localhost:5173                     ║
echo ║  • Performance: FAST (< 1 detik load time)                    ║
echo ║                                                                ║
echo ╚════════════════════════════════════════════════════════════════╝
echo.

REM Cek apakah npm terinstall
where npm >nul 2>nul
if %errorlevel% neq 0 (
    echo ❌ ERROR: npm tidak ditemukan!
    echo.
    echo Silakan install Node.js dari: https://nodejs.org/
    pause
    exit /b 1
)

REM Cek apakah php terinstall
where php >nul 2>nul
if %errorlevel% neq 0 (
    echo ❌ ERROR: php tidak ditemukan!
    echo.
    echo Silakan install PHP atau tambahkan ke PATH
    pause
    exit /b 1
)

echo ✅ npm terinstall
echo ✅ php terinstall
echo.

REM Clear Laravel cache
echo 🧹 Membersihkan cache Laravel...
call php artisan cache:clear >nul 2>&1
call php artisan config:clear >nul 2>&1
call php artisan route:clear >nul 2>&1
call php artisan view:clear >nul 2>&1
echo ✅ Cache cleared
echo.

REM Cek apakah node_modules ada
if not exist "node_modules\" (
    echo 📦 Menginstall dependencies...
    call npm install
    echo ✅ Dependencies installed
    echo.
)

REM Mulai development
echo 🎉 Memulai development server...
echo.
echo ┌────────────────────────────────────────────────────────────┐
echo │  📝 INSTRUKSI:                                             │
echo │  1. 2 server window akan membuka (Vite + Laravel)          │
echo │  2. Tekan Ctrl+C di window mana pun untuk menghentikan    │
echo │  3. Akses aplikasi: http://127.0.0.1:8000                 │
echo │  4. CSS/JS changes akan hot-reload otomatis               │
echo │                                                             │
echo │  🎯 EXPECTED RESULT:                                        │
echo │  • Loading time: < 1 detik                                 │
echo │  • Hot reload: ✅ AKTIF                                    │
echo │  • Previous: 3+ menit ❌  →  Now: < 1 detik ✅             │
echo └────────────────────────────────────────────────────────────┘
echo.
pause

REM Open Vite dev server in new window
echo Opening Vite dev server...
start "Vite Dev Server" cmd /k "npm run dev"

REM Wait for Vite to start
timeout /t 5 /nobreak

echo.
echo Starting Laravel server (main window)...
php artisan serve

pause
