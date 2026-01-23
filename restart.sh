#!/bin/bash

# Gozelseeds-2 Project Restart Script

echo "========================================="
echo "    Restarting Gozelseeds-2 Services"
echo "========================================="
echo ""

# Stop existing services
echo "Stopping existing services..."

# Stop Laravel server (port 8010)
echo "   - Stopping Laravel server (port 8010)..."
for pid in $(lsof -ti:8010 2>/dev/null); do
    kill -9 $pid 2>/dev/null
done

# Stop Vite dev server (port 5173)
echo "   - Stopping Vite dev server (port 5173)..."
for pid in $(lsof -ti:5173 2>/dev/null); do
    kill -9 $pid 2>/dev/null
done

echo ""
echo "All services stopped"
echo ""

# Start services
echo "Starting Gozelseeds-2 services..."
echo ""

# Start Laravel backend
echo "Starting Laravel server..."
cd /Users/macmini/projects/saytaz-clients/gozelseeds-2
php artisan serve --host=0.0.0.0 --port=8010 > /dev/null 2>&1 &
echo "   Laravel: http://100.89.150.50:8010"
echo "   Nova Admin: http://100.89.150.50:8010/nova"

sleep 2

# Start Vite for hot reload (optional, for development)
echo "Starting Vite dev server..."
npm run dev > /dev/null 2>&1 &
echo "   Vite: http://100.89.150.50:5173"

echo ""
echo "========================================="
echo "    Gozelseeds-2 Services Started!"
echo "========================================="
echo ""
echo "URLs:"
echo "   Website: http://100.89.150.50:8010"
echo "   Nova Admin: http://100.89.150.50:8010/nova"
echo ""
echo "========================================="
