# Hướng dẫn sử dụng Docker

## Yêu cầu
- Docker
- Docker Compose

## Cấu trúc Docker

### Services
- **app**: PHP 8.2 FPM với Composer 2.2.25
- **nginx**: Web server
- **node**: Node.js 20 cho development (Vite)

**Lưu ý**: Database MySQL không được bao gồm trong Docker. Ứng dụng sẽ kết nối với database bên ngoài thông qua cấu hình trong file `.env`.

## Cách sử dụng

### 1. Khởi động containers
```bash
docker-compose up -d
```

### 2. Cài đặt dependencies
```bash
# PHP dependencies
docker-compose exec app composer install

# Node dependencies
docker-compose exec node npm install
```

### 3. Cấu hình môi trường
```bash
# Copy file .env.example thành .env
cp .env.example .env

# Cấu hình database trong file .env
# DB_HOST=host.docker.internal (hoặc IP của database server)
# DB_PORT=3306
# DB_DATABASE=ten_database
# DB_USERNAME=username
# DB_PASSWORD=password

# Generate application key
docker-compose exec app php artisan key:generate

# Chạy migrations
docker-compose exec app php artisan migrate
```

### 4. Build assets (development)
```bash
docker-compose exec node npm run dev
```

### 5. Build assets (production)
```bash
docker-compose exec node npm run build
```

### 6. Truy cập ứng dụng
- Web: http://localhost

**Lưu ý về Database:**
- Nếu database chạy trên host machine (localhost), sử dụng `DB_HOST=host.docker.internal` trong file `.env`
- Nếu database chạy trên server khác, sử dụng IP hoặc domain của server đó
- Đảm bảo database server cho phép kết nối từ Docker container

## Lệnh hữu ích

### Xem logs
```bash
docker-compose logs -f app
docker-compose logs -f nginx
docker-compose logs -f db
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

### Dừng containers
```bash
docker-compose down
```

### Dừng và xóa volumes
```bash
docker-compose down -v
```

## Build cho Production

```bash
docker build --target production -t quanlytufo:latest .
```

## Thông tin kỹ thuật

- PHP: 8.2
- Node.js: 20
- Composer: 2.2.25
- MySQL: 8.0
- Nginx: Alpine

