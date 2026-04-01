# Hướng dẫn Setup sau khi chạy Docker

## ✅ Đã hoàn thành:
- ✅ Docker containers đã chạy
- ✅ Composer dependencies đã được cài đặt
- ✅ NPM dependencies đã được cài đặt
- ✅ Laravel Framework đã sẵn sàng

## 📋 Các bước tiếp theo:

### 1. Cấu hình Database trong file `.env`

Mở file `.env` và cấu hình database:

```env
DB_CONNECTION=mysql
DB_HOST=host.docker.internal  # hoặc IP của database server
DB_PORT=3306
DB_DATABASE=ten_database
DB_USERNAME=username
DB_PASSWORD=password
```

**Lưu ý:**
- Nếu database chạy trên host machine (localhost): dùng `DB_HOST=host.docker.internal`
- Nếu database chạy trên server khác: dùng IP hoặc domain của server đó

### 2. Kiểm tra kết nối Database

```bash
docker-compose exec app php artisan db:show
```

### 3. Chạy Migrations

```bash
docker-compose exec app php artisan migrate
```

Hoặc nếu muốn chạy với seeders:

```bash
docker-compose exec app php artisan migrate --seed
```

### 4. Tạo Storage Link (nếu cần)

```bash
docker-compose exec app php artisan storage:link
```

### 5. Clear Cache

```bash
docker-compose exec app php artisan config:clear
docker-compose exec app php artisan cache:clear
docker-compose exec app php artisan view:clear
docker-compose exec app php artisan route:clear
```

### 6. Build Assets (Development)

Assets sẽ tự động được build bởi node service. Nếu cần build thủ công:

```bash
docker-compose exec node npm run dev
```

### 7. Build Assets (Production)

```bash
docker-compose exec node npm run build
```

### 8. Truy cập ứng dụng

- **Web**: http://localhost
- **Vite HMR**: http://localhost:3000 (development)

## 🔧 Các lệnh hữu ích khác:

### Xem logs
```bash
docker-compose logs -f app
docker-compose logs -f nginx
docker-compose logs -f node
```

### Chạy Artisan commands
```bash
docker-compose exec app php artisan [command]
```

### Truy cập container
```bash
docker-compose exec app sh
docker-compose exec node sh
```

### Restart containers
```bash
docker-compose restart
```

### Dừng containers
```bash
docker-compose down
```

## ⚠️ Lưu ý:

1. **Database**: Đảm bảo database server cho phép kết nối từ Docker container
2. **Permissions**: Nếu gặp lỗi permissions, chạy:
   ```bash
   docker-compose exec app chmod -R 775 storage bootstrap/cache
   docker-compose exec app chown -R www-data:www-data storage bootstrap/cache
   ```
3. **Node Service**: Node service tự động chạy `npm run dev` khi khởi động

## 🎉 Hoàn tất!

Sau khi hoàn thành các bước trên, ứng dụng của bạn đã sẵn sàng sử dụng!



