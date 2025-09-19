<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bài 10 - Class Sinh viên</title>
    <link rel="stylesheet" href="../css/bai.css"> 
</head>
<body>

<div class="container">
    <h2>Bài 10: Xây dựng Class Sinh Viên</h2>
    
    <?php
   
    class PERSON {
        public $hoTen;
        public $ngaySinh;
        public $queQuan;

        public function __construct($hoTen, $ngaySinh, $queQuan) {
            $this->hoTen = $hoTen;
            $this->ngaySinh = $ngaySinh;
            $this->queQuan = $queQuan;
        }

        public function getInfo() {
            return "
                <li><strong>Họ tên:</strong> {$this->hoTen}</li>
                <li><strong>Ngày sinh:</strong> {$this->ngaySinh}</li>
                <li><strong>Quê quán:</strong> {$this->queQuan}</li>
            ";
        }
    }

    class SINHVIEN extends PERSON {
        public $lop;

        public function __construct($hoTen, $ngaySinh, $queQuan, $lop) {
            parent::__construct($hoTen, $ngaySinh, $queQuan);
            $this->lop = $lop;
        }

        public function getInfo() {
            return parent::getInfo() . "
                <li><strong>Lớp:</strong> {$this->lop}</li>
            ";
        }
    }

    $sinhVien = new SINHVIEN(
        "Võ Hoàng Hưng",          
        "26/07/2004",        
        "Hải Dương",            
        "K63"              
    );
    ?>

    <div class="result success">
        <h3>Thông tin cá nhân của Sinh viên</h3>
        <ul>
            <?php echo $sinhVien->getInfo(); ?>
        </ul>
    </div>
</div>

</body>
</html>