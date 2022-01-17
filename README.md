Nhóm 3 xin hướng dẫn cách để chạy chương trình:

B1: tải code về và lưu vào htdocs trong xampp

B2: Trong phpmyadmin ta tạo database user sau đó import CSDL cnweb.sql của nhóm để sẵn trong thư mục BTL-CNWeb/public/cnweb.sql

B3: mở xampp và config Apache(httpd.conf): Tại dòng thứ 252 và 253 sửa thành: DocumentRoot "C:/xampp/htdocs/BLN-CNWeb/public/" <Directory "C:/xampp/htdocs/BLN-CNWeb/public/"> Hiểu đơn giản là sửa thành đương dẫn đến thư mục public trên máy bạn

Lưu lại và KHỞI ĐỘNG LẠI xampp

B4: trên trình duyệt gõ "http://localhost/SignInC" Nếu không chạy được xin hãy liên hệ lại nhóm mình.
