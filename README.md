## Hướng Dẫn Cài Đặt Dự Án "DuAnMau-NoCode"

### git clone https://github.com/hptprobook/DuAnMau-NoCode.git

Dưới đây là các bước chi tiết để cài đặt và cấu hình dự án:

### 1. **Khởi Chạy IDE và mySQL Control Tool**
   - Sử dụng một trong các công cụ quản lý MySQL như XAMPP, Workbench, Laragon, etc.

### 2. **Tạo Database/Schema Mới**
   - Trong công cụ quản lý mySQL, tạo một database/schema mới cho dự án.

### 3. **Cấu Hình và Cài Đặt Các Thư Viện Cần Thiết**
   - Mở terminal tại thư mục dự án (`nocode-itdevice`).
   - Chạy các lệnh sau theo thứ tự:
     ```
     cp .env.example .env
     npm install
     composer install
     ```

### 4. **Cấu Hình File .env**
   - Mở file `.env` và cấu hình thông tin kết nối đến database.

### 5. **Thực Hiện Migration**
   - Chạy lệnh `php artisan migrate`.
   - Nếu lệnh trên gặp lỗi, hãy mở công cụ quản lý database và import file `/database/it-device.sql`.

### 6. **Tạo Khóa Ứng Dụng**
   - Chạy lệnh `php artisan key:generate`.

### 7. **Khởi Chạy Dự Án**
   - Mở hai terminal và chạy đồng thời hai lệnh sau:
     ```
     npm run dev
     php artisan serve
     ```
   - Sau khi các lệnh đã chạy xong, bạn có thể truy cập dự án tại địa chỉ: [127.0.0.1:8000](http://127.0.0.1:8000).

### 8. **Tạo và Quản Lý Tài Khoản**
   - Truy cập vào URL: [127.0.0.1:8000](http://127.0.0.1:8000) để tạo tài khoản mới và đăng nhập vào trang Administrator.
   - Để truy cập trang admin, sử dụng URL: [127.0.0.1:8000/admin](http://127.0.0.1:8000/admin). Nếu bạn cần quyền truy cập, có thể chỉnh sửa thông tin user và role trong database.

Sau khi hoàn thành các bước trên, dự án của bạn sẽ được cài đặt và cấu hình đầy đủ, và bạn có thể bắt đầu sử dụng và phát triển dự án của mình.
