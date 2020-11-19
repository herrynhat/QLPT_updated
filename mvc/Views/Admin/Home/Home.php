
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/home/css/main.css">
</head>
    <div class="content-wrapper">
    <div class="wrapper">
                <div class="right">
                    <div class="right__content">
                        <div class="right__title">Bảng điều khiển</div>
                        <p class="right__desc">Bảng điều khiển</p>
                        <div class="right__cards">
                            <a class="right__card" href="../QuanLyPhongTro/XemDSPhong">
                                <div class="right__cardTitle">Phòng trọ</div>
                                <div class="right__cardNumber">
                                    <?php
                                    foreach($data['sophongtro'] as $r)
                                        {
                                            echo $r->dem;
                                        }
                                    ?>
                                </div>
                                <div class="right__cardDesc">Xem Chi Tiết <img src="../public/home/assets/arrow-right.svg" alt=""></div>
                            </a>
                            <a class="right__card" href="../QuanLyPhongTro/XemDSPhong">
                                <div class="right__cardTitle">Đã thuê</div>
                                <div class="right__cardNumber">
                                    <?php
                                    foreach($data['sophongtrothue'] as $r)
                                        {
                                            echo $r->dem;
                                        }
                                    ?>
                                </div>
                                <div class="right__cardDesc">Xem Chi Tiết <img src="../public/home/assets/arrow-right.svg" alt=""></div>
                            </a>
                            <a class="right__card" href="../QuanLyThietBi/XemDSThietBi">
                                <div class="right__cardTitle">Thiết bị</div>
                                <div class="right__cardNumber">
                                    <?php
                                    foreach($data['sothietbi'] as $r)
                                        {
                                            echo $r->dem;
                                        }
                                    ?>
                                </div>
                                <div class="right__cardDesc">Xem Chi Tiết <img src="../public/home/assets/arrow-right.svg" alt=""></div>
                            </a>
                            <a class="right__card" href="../QuanLyKhachThue/XemDSKhachThue">
                                <div class="right__cardTitle">Khách thuê</div>
                                <div class="right__cardNumber">
                                    <?php
                                    foreach($data['sokhachthue'] as $r)
                                        {
                                            echo $r->dem;
                                        }
                                    ?>
                                </div>
                                <div class="right__cardDesc">Xem Chi Tiết <img src="../public/home/assets/arrow-right.svg" alt=""></div>
                            </a>
                        </div>
                        <div class="right__table">
                            <p class="right__tableTitle">Phiếu thu mới</p>
                            <div class="right__tableWrapper">
                                <table>
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Khách thuê</th>
                                            <th>Ngày ghi</th>
                                            <th>Phòng</th>
                                            <th>Tổng tiền</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                                $i=1;
                                              foreach ($data['dsphieuthu'] as $r) {
                                                foreach ($r->phongtro_doc as $a) {
                                                          foreach ($r->khachthue_doc as $b) {
                                          ?>
                                        <tr>
                                            <td>
                                                <?php echo $i;
                                                    $i++;
                                                ?>
                                            </td>
                                            <td><?php echo $b->hoten; ?></td>
                                            <td><?php echo $r->ngayghi; ?></td>
                                            <td><?php echo $a->tenphong; ?></td>
                                            <td><?php echo $r->tongtien; ?> VNĐ</td>
                                            </td>
                                        </tr>
                                        <?php
                                                }
                                              }
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                            <a href="../QuanLyThuTien/XemDSPhieuThu" class="right__tableMore"><p>Xem tất cả các phiếu thu</p> <img src="../public/home/assets/arrow-right-black.svg" alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
</div>
    
    <script src="../public/home/js/main.js"></script>

