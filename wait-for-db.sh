#!/bin/sh

# Wait until MySQL is responding on the 'db' host and port 3306
echo "⏳ Waiting for MySQL to be ready..."
until php -r "try { new PDO('mysql:host=db;dbname=jobboard', 'user', 'pass'); exit(0); } catch (Exception \$e) { exit(1); }"; do
  sleep 2
done

echo "✅ MySQL is ready — starting app..."
php index.php
