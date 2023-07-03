<?php
    function thongke_doanhthu($subdays,$now){
        $sql = "SELECT * FROM thongke where ngaydat  BETWEEN '$subdays' and '$now' ORDER BY ngaydat ASC";
        
        return pdo_query($sql);
    }
 ?>