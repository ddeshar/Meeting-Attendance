<?php

    function sendlinemesg() {
                        
        define('LINE_API',"https://notify-api.line.me/api/notify");
        define('LINE_TOKEN','4Ni9Q5SYM7KLXxRdTUfDS36F6LdGXziVrvA75TaCvpq'); // line token

        function notify_message($message){

            $queryData = array('message' => $message);
            $queryData = http_build_query($queryData,'','&');
            $headerOptions = array(
                'http'=>array(
                    'method'=>'POST',
                    'header'=> "Content-Type: application/x-www-form-urlencoded\r\n"
                            ."Authorization: Bearer ".LINE_TOKEN."\r\n"
                            ."Content-Length: ".strlen($queryData)."\r\n",
                    'content' => $queryData
                )
            );
            $context = stream_context_create($headerOptions);
            $result = file_get_contents(LINE_API,FALSE,$context);
            $res = json_decode($result);
            return $res;
        }
    }

    $thai_day_arr=array("อาทิตย์","จันทร์","อังคาร","พุธ","พฤหัสบดี","ศุกร์","เสาร์");   
    $thai_month_arr=array(   
        "0"=>"",   
        "1"=>"มกราคม",   
        "2"=>"กุมภาพันธ์",   
        "3"=>"มีนาคม",   
        "4"=>"เมษายน",   
        "5"=>"พฤษภาคม",   
        "6"=>"มิถุนายน",    
        "7"=>"กรกฎาคม",   
        "8"=>"สิงหาคม",   
        "9"=>"กันยายน",   
        "10"=>"ตุลาคม",   
        "11"=>"พฤศจิกายน",   
        "12"=>"ธันวาคม"                    
    );   
    $thai_month_arr_short=array(   
        "0"=>"",   
        "1"=>"ม.ค.",   
        "2"=>"ก.พ.",   
        "3"=>"มี.ค.",   
        "4"=>"เม.ย.",   
        "5"=>"พ.ค.",   
        "6"=>"มิ.ย.",    
        "7"=>"ก.ค.",   
        "8"=>"ส.ค.",   
        "9"=>"ก.ย.",   
        "10"=>"ต.ค.",   
        "11"=>"พ.ย.",   
        "12"=>"ธ.ค."                    
    );   
    function thai_date_and_time($time){   // 19 ธันวาคม 2556 เวลา 10:10:43
        global $thai_day_arr,$thai_month_arr;   
        $thai_date_return = date("j",$time);   
        $thai_date_return.=" ".$thai_month_arr[date("n",$time)];   
        $thai_date_return.= " ".(date("Y",$time)+543);   
        $thai_date_return.= " เวลา ".date("H:i:s",$time);
        return $thai_date_return;   
    } 
    function thai_date_and_time_short($time){   // 19  ธ.ค. 2556 10:10:4
        global $thai_day_arr,$thai_month_arr_short;   
        $thai_date_return = date("j",$time);   
        $thai_date_return.="&nbsp;&nbsp;".$thai_month_arr_short[date("n",$time)];   
        $thai_date_return.= " ".(date("Y",$time)+543);   
        $thai_date_return.= " ".date("H:i:s",$time);
        return $thai_date_return;   
    } 
    function thai_date_short($time){   // 19  ธ.ค. 2556
        global $thai_day_arr,$thai_month_arr_short;   
        $thai_date_return = date("j",$time);   
        $thai_date_return.="&nbsp;&nbsp;".$thai_month_arr_short[date("n",$time)];   
        $thai_date_return.= " ".(date("Y",$time)+543);   
        return $thai_date_return;   
    } 
    function thai_date_fullmonth($time){   // 19 ธันวาคม 2556
        global $thai_day_arr,$thai_month_arr;   
        $thai_date_return = date("j",$time);   
        $thai_date_return.=" ".$thai_month_arr[date("n",$time)];   
        $thai_date_return.= " ".(date("Y",$time)+543);   
        return $thai_date_return;   
    } 
    function thai_date_short_number($time){   // 19-12-56
        global $thai_day_arr,$thai_month_arr;   
        $thai_date_return = date("d",$time);   
        $thai_date_return.="-".date("m",$time);   
        $thai_date_return.= "-".substr((date("Y",$time)+543),-2);   
        return $thai_date_return;   
    } 

	function DateThai($strDate)
	{
		$strYear = date("Y",strtotime($strDate))+543;
		$strMonth= date("n",strtotime($strDate));
		$strDay= date("j",strtotime($strDate));
		$strHour= date("H",strtotime($strDate));
		$strMinute= date("i",strtotime($strDate));
		$strSeconds= date("s",strtotime($strDate));
		$strMonthCut = Array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		$strMonthThai=$strMonthCut[$strMonth];
		return "$strDay $strMonthThai $strYear, เวลา $strHour:$strMinute";
	}


