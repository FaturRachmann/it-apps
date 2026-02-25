# ⚡ Quick Start Guide

## 🚀 Fastest Way to Run Website

### Step 1: Open Terminal

```bash
cd "/mnt/d/My Project/it-apps"
```

### Step 2: Run Vite Dev Server (Terminal 1)

```bash
npm run dev
```

Expected output:
```
  VITE v7.3.1  ready in xxxx ms
  ➜  Local:   http://127.0.0.1:5173/
```

### Step 3: Open New Terminal & Run Laravel (Terminal 2)

```bash
cd "/mnt/d/My Project/it-apps"
php artisan serve
```

Expected output:
```
   INFO  Server running on [http://127.0.0.1:8000].
```

### Step 4: Open Browser

**Visit:** http://127.0.0.1:8000

---

## ✨ You Should See:

✅ **Professional UI** with Teal/Primary colors
✅ **Dark Mode** support 
✅ **Smooth Animations** on page load
✅ **Fast Loading** < 3 seconds
✅ **Responsive Design** on mobile/tablet/desktop

---

## ❌ What NOT to Do:

```bash
# WRONG - Don't do this!
php artisan serve
```

This will load the website WITHOUT CSS/JS, making it look broken.

---

## 🛠️ For Production (Build & Deploy)

```bash
npm run build
php artisan serve
```

This compiles everything into static files in `public/build/`

---

## 📚 More Info

See **START_SERVER.md** for full troubleshooting guide.

---

**Remember:** Terminal 1 (npm run dev) + Terminal 2 (php artisan serve) = Happy website! 🎉
