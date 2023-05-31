<?php
session_start();
 function datethai($date){
    $da=explode("-",$date);

    $d=$da[2];
    $m=$da[1];
    $y=$da[0];
    $month=month($date); 
    $year=year($date);   
    $data =intval($d)." ".$month." ".$year;
    return  $data;

}
 function month($date){
    $da=explode("-",$date);
    $d=$da[2];
    $m=$da[1];
    $y=$da[0];
    switch ($m){
        case "01":
            $month="ม.ค.";
            break;
        case "02":
            $month="ก.พ.";
            break;
        case "03":
            $month="มี.ค.";
            break;
        case "04":
            $month="เม.ย.";
            break;
        case "05":
            $month="พ.ค.";
            break;
        case "06":
            $month="มิ.ย.";
            break;
        case "07":
            $month="ก.ค.";
            break;
        case "08":
            $month="ส.ค.";
            break;
        case "09":
            $month="ก.ย.";
            break;
        case "10":
            $month="ต.ค.";
            break;
        case "11":
            $month="พ.ย.";
            break;
        case "12":
            $month="ธ.ค.";
            break;
        
    }
    return $month;
}
 function day($date){
    $da=explode("-",$date);
    $d=$da[2];
    $m=$da[1];
    $y=$da[0];    
    return  intval($d);

}
 function year($date){
    $da=explode("-",$date);
    $d=$da[2];
    $m=$da[1];
    $y=$da[0];    
    return  $y+543;

}
function bookId_recive($data){
    return sprintf("%06d",$data);
}
function bookId_reciveRe($data){
    return sprintf("%03d",$data);
}
function yearterm($date){
    $da=explode("-",$date);
    $d=$da[2];
    $m=$da[1];
    $y=$da[0]; 
    $dateck = date($y."-10-01");
    if($date >= $dateck){
        $y=$da[0]+1;
        $da="ตรงปี+1 วันที่กรอก :".$date." วันที่เช็ค :".$dateck."<br>ปีงบประมาณ :";
    }else{
        $y=$da[0];
        $da="ตรงปี วันที่กรอก :".$date." วันที่เช็ค :".$dateck."<br>ปีงบประมาณ :";
    }
    // return  $da;
     return  $y+543;

}
function time_dif($begin,$end){
	$remain=intval(strtotime($end)-strtotime($begin));
	$wan=floor($remain/86400);
	$l_wan=$remain%86400;
	$hour=floor($l_wan/3600);
	$l_hour=$l_wan%3600;
	$minute=floor($l_hour/60);
	$second=$l_hour%60;
	return "ผ่านมาแล้ว ".$wan." วัน ".$hour." ชั่วโมง ".$minute." นาที ".$second." วินาที";
}
function statusRepair($s){
    switch ($s) {
        
    case "1":
        return 260;
        break;
    case "2":
        return 30;
        break;
    case "3":
        return 270;
        break;
    case "4":
        return 130;
        break;
    case "5":
        return 164;
        break;
    case "6":
        return 107;
        break;
    case "7":
        return 205;
        break;
    case "8":
        return 210;
        break;
    case "9":
        return 138;
        break;
    case "10":
        return 151;
        break;
    default:
        return 1;
    }
}
function navMenu($page){
    switch ($page){
        case "home":
            $_SESSION['m_home']="active";
            $_SESSION['m_activity']="";
            $_SESSION['m_download']="";
            $_SESSION['m_manual']="";
            break;
        case "activity":
            $_SESSION['m_home']="";
            $_SESSION['m_activity']="active";
            $_SESSION['m_download']="";
            $_SESSION['m_manual']="";
            break;
        case "download":
            $_SESSION['m_home']="";
            $_SESSION['m_activity']="";
            $_SESSION['m_download']="active";
            $_SESSION['m_manual']="";
            break;
        case "manual":
            $_SESSION['m_home']="";
            $_SESSION['m_activity']="";
            $_SESSION['m_download']="";
            $_SESSION['m_manual']="active";
            break;
        default :
            $_SESSION['m_home']="active";
            $_SESSION['m_activity']="";
            $_SESSION['m_download']="";
            $_SESSION['m_manual']="";
            break;
    }
}
?>