# IT Support Service Website

Professional IT Support Service website built with Laravel, featuring comprehensive service listings, knowledge base articles, and contact management.

## Features

- **Service Management**: Display IT services with detailed descriptions and pricing
- **Article System**: Knowledge base with articles and guides
- **Contact Form**: Easy communication with clients
- **Admin Panel**: Manage services, articles, and contact messages
- **Responsive Design**: Works on all device sizes
- **Modern UI**: Clean, professional interface with Flowbite components
- **Dark Mode**: Full dark mode support across all pages
- **Smooth Animations**: Enhanced UX with Tailwind CSS animations
- **SEO Optimized**: Meta tags and structured data
- **Fast Performance**: Vite-powered asset compilation with HMR (Hot Module Replacement)
- **Mobile First**: Optimized for mobile, tablet, and desktop devices

## Tech Stack

- **Backend**: Laravel 12.x
- **Frontend**: Blade Templates with Tailwind CSS
- **Database**: MySQL
- **Build Tool**: Vite
- **Styling**: Tailwind CSS v4+

## Requirements

- PHP 8.2+
- Composer
- Node.js & npm
- MySQL

## Installation

1. Clone the repository:
```bash
git clone <repository-url>
cd it-support-website
```

2. Install PHP dependencies:
```bash
composer install
```

3. Install Node.js dependencies:
```bash
npm install
```

4. Copy environment file:
```bash
cp .env.example .env
```

5. Generate application key:
```bash
php artisan key:generate
```

6. Configure database in `.env` file

7. Run migrations:
```bash
php artisan migrate
```

8. Seed sample data:
```bash
php artisan db:seed --class=SampleDataSeeder
```

9. Build assets:
```bash
npm run build
```

## 🚀 Running Development Server

### ⚡ Quick Start (RECOMMENDED)

**❌ JANGAN LAKUKAN INI:**
```bash
php artisan serve
# ⚠️ Akan sangat lambat! (3+ menit load time)
```

**✅ LAKUKAN INI (2 Terminal):**

**Terminal 1 - Vite Dev Server:**
```bash
npm run dev
```

**Terminal 2 - Laravel Server:**
```bash
php artisan serve
```

**Hasil:**
- ⚡ Loading time: < 1 detik
- 🔄 Hot reload: ✅ Aktif
- 📊 Performance: 300x lebih cepat

---

### 🪟 Windows Users - One Click Start

Jalankan script ini untuk auto-start kedua server:
```bash
dev-start.bat
```

Script ini akan:
1. ✅ Cek PHP & npm terinstall
2. 🧹 Clear Laravel cache
3. 📦 Install dependencies (jika belum)
4. 🚀 Buka Vite & Laravel server otomatis

---

### Alternative: Build & Run (Tanpa Dev Server)

Jika tidak bisa menjalankan 2 terminal:

```bash
# Build assets untuk production
npm run build

# Jalankan Laravel server
php artisan serve
```

> ⚠️ **Note**: Ini lebih lambat, hanya untuk testing
> Lihat [PERFORMANCE_FIX.md](PERFORMANCE_FIX.md) untuk troubleshooting

---

### 🎯 Expected URLs

| Component | URL |
|-----------|-----|
| Website | http://127.0.0.1:8000 |
| Vite Dev | http://localhost:5173 |
| Admin Panel | http://127.0.0.1:8000/admin |

## API Endpoints

### Public Endpoints
- `GET /api/services` - Get all active services
- `GET /api/services/{slug}` - Get single service detail
- `GET /api/articles` - Get published articles
- `GET /api/articles/{slug}` - Get single article
- `POST /api/contact` - Submit contact form

### Admin Endpoints
- `GET /admin/dashboard` - Admin dashboard
- `GET /admin/services` - Manage services
- `GET /admin/articles` - Manage articles
- `GET /admin/messages` - View contact messages

## Project Structure

```
it-support-website/
├── app/                    # Laravel application
│   ├── Http/              # Controllers, Middleware
│   ├── Models/            # Eloquent models
│   └── ...
├── resources/
│   ├── views/             # Blade templates
│   │   ├── components/    # Reusable components
│   │   ├── admin/         # Admin panel views
│   │   └── ...
│   ├── css/               # CSS files
│   └── js/                # JavaScript files
├── routes/                # Route definitions
├── database/              # Migrations, Seeds
└── ...
```

## Admin Panel

Access the admin panel at `/admin/login` to manage:
- Services
- Articles
- Contact messages

## 🎨 Styling & Design

### Flowbite Components
Website menggunakan Flowbite v4 untuk UI components modern.
Dokumentasi: https://flowbite.com/docs/

### Dark Mode
Dark mode sudah terintegrasi di semua pages. Toggle dengan button di navbar.

### Custom Animations
Tailwind CSS animations tersedia:
- `animate-fade-in` - Fade in effect
- `animate-slide-in-left/right` - Slide animations
- `animate-blob` - Animated blobs
- Dan lainnya (lihat `tailwind.config.js`)

## Contributing

1. Fork the repository
2. Create your feature branch
3. Commit your changes
4. Push to the branch
5. Open a Pull Request

## License

This project is open source and available under the [MIT License](LICENSE).
