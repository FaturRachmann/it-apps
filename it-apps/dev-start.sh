#!/bin/bash

# IT Apps Development Server Startup Script
# Menjalankan Laravel + Vite dev server secara concurrent

echo "🚀 Starting IT Apps Development Environment..."
echo ""
echo "Starting Vite dev server..."
npm run dev &
VITE_PID=$!

sleep 3

echo ""
echo "Starting Laravel development server..."
php artisan serve

# Cleanup
kill $VITE_PID 2>/dev/null
