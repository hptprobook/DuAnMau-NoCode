# DuAnMau-NoCode

Sau khi Pull code mới về
  1. Tạo một file .env ở thư mục gốc, copy dán tất cả từ file .env.example vào
  2. Tạo một database tên là it-device ở Phpmyadmin
  3. Mở terminal(Bấm chuột phải vào thư mục dự án [ nocode-itdevice ] -> Open in Integrated Terminal) chạy lệnh theo thứ tự:
    - npm i (cài sẵn nodejs và npm) -> cài các file node_modules
    - composer install (cài sẵn composer) -> cài các thư viện laravel
    - php artisan migrate -> tạo database( phải tạo trước database it-device trong phpMyAdmin)
  4. Khởi chạy dự án( mở 2 terminal chạy cùng lúc 2 lệnh dưới)
    - npm run dev
    - php artisan serve
  5. Vào URL: 127.0.0.1:8000 -> tạo tài khoản mới, vào link Administrator
