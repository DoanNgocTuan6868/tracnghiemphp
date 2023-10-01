

<div class="container">
    <div class="row">
        <?php 
        if(isset($_GET['maLop'])){
            $malop=$_GET['maLop'];
            $db= new giaovien();
            $result=$db->tenLop($malop);
            $tenlop=$result['tenLop'];
        }
        ?>
        <h2 class="text-center text-danger mb-md-3">BẢNG ĐIỂM SINH VIÊN LỚP <?php echo $tenlop; ?> </h2>
        <div class="d-flex justify-content-end m-2"> 
        <button onclick="printTable()" class="btn btn-primary" style="width:170px;" padding-right="0%;" > <i class="fas fa-print"></i> In bảng điểm</button>
        </div> 
        

        <table id="student-table" class="table table-bordered text-center ">
            <tr class="bg bg-secondary text-light">
                <th scope="col">Tên sinh viên</th>
                <th scope="col">Mã sinh viên</th>
                <th scope="col">Tên môn học</th>
                <th scope="col">Mã đề</th>
                <th scope="col">Số câu đúng</th>
                <th scope="col">Điểm</th>
            </tr>

            <?php
            if(isset($_GET['maLop']) && isset($_GET['maMon']) && isset($_SESSION['maGV'])):
                $malop=$_GET['maLop'];
                $mamon=$_GET['maMon'];
                $magv=$_SESSION['maGV'];
                $db= new giaovien();
                $result=$db->listDiemHs($magv,$mamon,$malop);
                while($set= $result->fetch()):
                    ?>
                    <tr>
                        <td><?php echo $set['tenHS'] ?></td>
                        <td><?php echo $set['maHS'] ?></td>
                        <td><?php echo $set['tenMon'] ?></td>
                        <td><?php echo $set['maDe'] ?></td>
                        <td><?php echo $set['socaudung'] ?>/<?php echo $set['soluongcauhoi'] ?></td>
                        <td><?php echo $set['diem'] ?></td>
                    </tr>
                    <?php
                endwhile;
            ?>
            <?php
            endif;
            ?>
        </table>

        

        <script>
            function printTable() {
                var table = document.getElementById("student-table");
                var newWin = window.open('', '_blank');
                newWin.document.write('<html><head><title>Bảng điểm sinh viên</title>');
                newWin.document.write('<style>');
                newWin.document.write('table {width: 100%;}');
                newWin.document.write('table, th, td {border: 1px solid black; border-collapse: collapse; padding: 8px;}');
                newWin.document.write('.bg-secondary {background-color: #343a40; color: #fff;}');
                newWin.document.write('.text-danger {color: red;}');
                newWin.document.write('</style></head><body>');
                newWin.document.write('<h2 class="text-center text-danger mb-md-3">BẢNG ĐIỂM SINH VIÊN LỚP <?php echo $tenlop; ?> </h2>');
                newWin.document.write(table.outerHTML);
                newWin.document.write('</body></html>');
                newWin.document.close();
                newWin.print();
            }
        </script>
    </div>
</div>

