<?php 
    require('../../../../../dao/pdo.php');
    require('../../../../carbon/autoload.php');
    require('../../../../../dao/thonke.php');
    use Carbon\Carbon;



    if(isset($_POST['time'])){
        $time = $_POST['time'];
    }else{
        $time = '';
        $subdays = Carbon::now('Asia/Ho_Chi_Minh') -> subdays(365)->toDateString();
    }

    if($time == '7ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh') -> subdays(7)->toDateString();
    }elseif($time =='14ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh') -> subdays(14)->toDateString();
    }elseif($time =='21ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh') -> subdays(21)->toDateString();
    }elseif($time =='30ngay'){
        $subdays = Carbon::now('Asia/Ho_Chi_Minh') -> subdays(30)->toDateString();
    }
    $now = Carbon::now('Asia/Ho_Chi_Minh')->toDateString();
    $thongkes = thongke_doanhthu($subdays,$now);
    foreach($thongkes as $thongke ){
        extract($thongke);
        $chart_data[] = array(
            'date'=>$ngaydat,
            'order'=>$donhang,
            'sales'=>$doanhthu,
            'quality'=>$soluong
        );
    };

    echo $data = json_encode($chart_data);
?>