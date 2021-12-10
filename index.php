<?php 
    $content = file_get_contents("php://input");
    if ($content) {
        $token = '5073614406:AAEf7-M6-82p0WgCvS6RgzdMwiuorzMZnDo';
        
        $apiLink = "https://api.telegram.org/bot$token/";  

        echo '<pre>content = '; print_r($content); echo '</pre>';
        $update = json_decode($content, true);
        if(!@$update["message"]) $val = $update['callback_query'];
        else $val = $update;

        $chat_id = $val['message']['chat']['id'];
        $text = $val['message']['text'];
        $update_id = $val['update_id'];
        $sender = $val['message']['from'];
    }
?>

<?php 
    function sendRecomendtoBuy($msgSendtoBuy){
        global $arrayChatId;

        global $chat_id;

        for ($i=0; $i < count($arrayChatId); $i++) { 
            $api = "https://api.telegram.org/bot5073614406:AAEf7-M6-82p0WgCvS6RgzdMwiuorzMZnDo/sendmessage?chat_id=$chat_id&text=$msgSendtoBuy";
            $konten = file_get_contents($api);
        }
    }

    function splitRecomendtoBuy(){
        global $arrayDataBuy;
        $msg1 = "";
        $msg2 = "";
        $msg3 = "";
        $msg4 = "";
        $msg5 = "";
        $msg6 = "";
        $msg7 = "";
        $msg8 = "";
        for ($i=0; $i < count($arrayDataBuy)/8; $i++) { 
            $msg1 .= $arrayDataBuy[$i];
        }
        for ($i=count($arrayDataBuy)/8; $i < count($arrayDataBuy)*2/8; $i++) { 
            $msg2 .= $arrayDataBuy[$i];
        }
        for ($i=count($arrayDataBuy)*2/8; $i < count($arrayDataBuy)*3/8; $i++) { 
            $msg3 .= $arrayDataBuy[$i];
        }
        for ($i=count($arrayDataBuy)*3/8; $i < count($arrayDataBuy)*4/8; $i++) { 
            $msg4 .= $arrayDataBuy[$i];
        }
        for ($i=count($arrayDataBuy)*4/8; $i < count($arrayDataBuy)*5/8; $i++) { 
            $msg5 .= $arrayDataBuy[$i];
        }
        for ($i=count($arrayDataBuy)*5/8; $i < count($arrayDataBuy)*6/8; $i++) { 
            $msg6 .= $arrayDataBuy[$i];
        }
        for ($i=count($arrayDataBuy)*6/8; $i < count($arrayDataBuy)*7/8; $i++) { 
            $msg7 .= $arrayDataBuy[$i];
        }
        for ($i=count($arrayDataBuy)*7/8; $i < count($arrayDataBuy)*8/8; $i++) { 
            $msg8 .= $arrayDataBuy[$i];
        }
        sendRecomendtoBuy($msg1);
        sendRecomendtoBuy($msg2);
        sendRecomendtoBuy($msg3);
        sendRecomendtoBuy($msg4);
        sendRecomendtoBuy($msg5);
        sendRecomendtoBuy($msg6);
        sendRecomendtoBuy($msg7);
        sendRecomendtoBuy($msg8);
    }

    function sendRecomendtoSell($msgSendtoSell){
        global $arrayChatId;
        global $chat_id;
        for ($i=0; $i < count($arrayChatId); $i++) { 
            $api = "https://api.telegram.org/bot5073614406:AAEf7-M6-82p0WgCvS6RgzdMwiuorzMZnDo/sendmessage?chat_id=$chat_id&text=$msgSendtoSell";
            $konten = file_get_contents($api);
        }
    }

    function splitRecomendtoSell(){
        global $arrayDataSell;
        $msg1 = "";
        $msg2 = "";
        $msg3 = "";
        $msg4 = "";
        $msg5 = "";
        $msg6 = "";
        $msg7 = "";
        $msg8 = "";

        for ($i=0; $i < count($arrayDataSell)/8; $i++) { 
            $msg1 .= $arrayDataSell[$i];
        }
        for ($i=count($arrayDataSell)/8; $i < count($arrayDataSell)*2/8; $i++) { 
            $msg2 .= $arrayDataSell[$i];
        }
        for ($i=count($arrayDataSell)*2/8; $i < count($arrayDataSell)*3/8; $i++) { 
            $msg3 .= $arrayDataSell[$i];
        }
        for ($i=count($arrayDataSell)*3/8; $i < count($arrayDataSell)*4/8; $i++) { 
            $msg4 .= $arrayDataSell[$i];
        }
        for ($i=count($arrayDataSell)*4/8; $i < count($arrayDataSell)*5/8; $i++) { 
            $msg5 .= $arrayDataSell[$i];
        }
        for ($i=count($arrayDataSell)*5/8; $i < count($arrayDataSell)*6/8; $i++) { 
            $msg6 .= $arrayDataSell[$i];
        }
        for ($i=count($arrayDataSell)*6/8; $i < count($arrayDataSell)*7/8; $i++) { 
            $msg7 .= $arrayDataSell[$i];
        }
        for ($i=count($arrayDataSell)*7/8; $i < count($arrayDataSell)*8/8; $i++) { 
            $msg8 .= $arrayDataSell[$i];
        }
        sendRecomendtoSell($msg1);
        sendRecomendtoSell($msg2);
        sendRecomendtoSell($msg3);
        sendRecomendtoSell($msg4);
        sendRecomendtoSell($msg5);
        sendRecomendtoSell($msg6);
        sendRecomendtoSell($msg7);
        sendRecomendtoSell($msg8);
    }
?>

<?php 
    $sumber = "https://indodax.com/api/tickers";
    $konten = file_get_contents($sumber);
    $data = json_decode($konten, true);
    $data = $data['tickers'];
    $a = 1;
    $panjangData = count($data);

    if ($text=="/view_indodax") {
        $msg .= "Bot Developed by Kelompok API 7!%0a%0a%0a";
        for ($i=0; $i < ($panjangData*1/8); $i++) { 
            $nomor = $i+1;
            $asset = array_keys($data)[$i];
            $last = $data[$asset]['last'];
            $high = $data[$asset]['high'];
            $low = $data[$asset]['low'];
            $sell = $data[$asset]['sell'];
            $buy = $data[$asset]['buy'];
            if ($last == $high) {
                $status = "Harga Tertinggi !!!";
            }elseif($last == $low){
                $status = "Harga terendah !!!";
            }else{
                $status = "Harga diantara !!!";
            }
            $msg1 .= "Nomor : ".$nomor."%0aAsset : ".$asset."%0aLast Price : ".$last."%0aHigh 24H : ".$high."%0aLow 24H : ".$low."%0aSell : ".$sell."%0aBuy : ".$buy."%0a".$status."%0a%0a";
        }
        for ($i= floor(($panjangData*1/8))+1 ; $i < floor(($panjangData*2/8)); $i++) { 
            $nomor = $i+1;
            $asset = array_keys($data)[$i];
            $last = $data[$asset]['last'];
            $high = $data[$asset]['high'];
            $low = $data[$asset]['low'];
            $sell = $data[$asset]['sell'];
            $buy = $data[$asset]['buy'];
            if ($last == $high) {
                $status = "Harga Tertinggi !!!";
            }elseif($last == $low){
                $status = "Harga terendah !!!";
            }else{
                $status = "Harga diantara !!!";
            }
            $msg2 .= "Nomor : ".$nomor."%0aAsset : ".$asset."%0aLast Price : ".$last."%0aHigh 24H : ".$high."%0aLow 24H : ".$low."%0aSell : ".$sell."%0aBuy : ".$buy."%0a".$status."%0a%0a";
        }
        for ($i= floor(($panjangData*2/8))+1 ; $i < floor(($panjangData*3/8)); $i++) { 
            $nomor = $i+1;
            $asset = array_keys($data)[$i];
            $last = $data[$asset]['last'];
            $high = $data[$asset]['high'];
            $low = $data[$asset]['low'];
            $sell = $data[$asset]['sell'];
            $buy = $data[$asset]['buy'];
            if ($last == $high) {
                $status = "Harga Tertinggi !!!";
            }elseif($last == $low){
                $status = "Harga terendah !!!";
            }else{
                $status = "Harga diantara !!!";
            }
            $msg3 .= "Nomor : ".$nomor."%0aAsset : ".$asset."%0aLast Price : ".$last."%0aHigh 24H : ".$high."%0aLow 24H : ".$low."%0aSell : ".$sell."%0aBuy : ".$buy."%0a".$status."%0a%0a";
        }
        for ($i= floor(($panjangData*3/8))+1 ; $i < floor(($panjangData*4/8)); $i++) { 
            $nomor = $i+1;
            $asset = array_keys($data)[$i];
            $last = $data[$asset]['last'];
            $high = $data[$asset]['high'];
            $low = $data[$asset]['low'];
            $sell = $data[$asset]['sell'];
            $buy = $data[$asset]['buy'];
            if ($last == $high) {
                $status = "Harga Tertinggi !!!";
            }elseif($last == $low){
                $status = "Harga terendah !!!";
            }else{
                $status = "Harga diantara !!!";
            }
            $msg4 .= "Nomor : ".$nomor."%0aAsset : ".$asset."%0aLast Price : ".$last."%0aHigh 24H : ".$high."%0aLow 24H : ".$low."%0aSell : ".$sell."%0aBuy : ".$buy."%0a".$status."%0a%0a";
        }
        for ($i= floor(($panjangData*4/8))+1 ; $i < floor(($panjangData*5/8)); $i++) { 
            $nomor = $i+1;
            $asset = array_keys($data)[$i];
            $last = $data[$asset]['last'];
            $high = $data[$asset]['high'];
            $low = $data[$asset]['low'];
            $sell = $data[$asset]['sell'];
            $buy = $data[$asset]['buy'];
            if ($last == $high) {
                $status = "Harga Tertinggi !!!";
            }elseif($last == $low){
                $status = "Harga terendah !!!";
            }else{
                $status = "Harga diantara !!!";
            }
            $msg5 .= "Nomor : ".$nomor."%0aAsset : ".$asset."%0aLast Price : ".$last."%0aHigh 24H : ".$high."%0aLow 24H : ".$low."%0aSell : ".$sell."%0aBuy : ".$buy."%0a".$status."%0a%0a";
        }
        for ($i= floor(($panjangData*5/8))+1 ; $i < floor(($panjangData*6/8)); $i++) { 
            $nomor = $i+1;
            $asset = array_keys($data)[$i];
            $last = $data[$asset]['last'];
            $high = $data[$asset]['high'];
            $low = $data[$asset]['low'];
            $sell = $data[$asset]['sell'];
            $buy = $data[$asset]['buy'];
            if ($last == $high) {
                $status = "Harga Tertinggi !!!";
            }elseif($last == $low){
                $status = "Harga terendah !!!";
            }else{
                $status = "Harga diantara !!!";
            }
            $msg6 .= "Nomor : ".$nomor."%0aAsset : ".$asset."%0aLast Price : ".$last."%0aHigh 24H : ".$high."%0aLow 24H : ".$low."%0aSell : ".$sell."%0aBuy : ".$buy."%0a".$status."%0a%0a";
        }
        for ($i= floor(($panjangData*6/8))+1 ; $i < floor(($panjangData*7/8)); $i++) { 
            $nomor = $i+1;
            $asset = array_keys($data)[$i];
            $last = $data[$asset]['last'];
            $high = $data[$asset]['high'];
            $low = $data[$asset]['low'];
            $sell = $data[$asset]['sell'];
            $buy = $data[$asset]['buy'];
            if ($last == $high) {
                $status = "Harga Tertinggi !!!";
            }elseif($last == $low){
                $status = "Harga terendah !!!";
            }else{
                $status = "Harga diantara !!!";
            }
            $msg7 .= "Nomor : ".$nomor."%0aAsset : ".$asset."%0aLast Price : ".$last."%0aHigh 24H : ".$high."%0aLow 24H : ".$low."%0aSell : ".$sell."%0aBuy : ".$buy."%0a".$status."%0a%0a";
        }
        for ($i= floor(($panjangData*7/8))+1 ; $i < floor(($panjangData*8/8)); $i++) { 
            $nomor = $i+1;
            $asset = array_keys($data)[$i];
            $last = $data[$asset]['last'];
            $high = $data[$asset]['high'];
            $low = $data[$asset]['low'];
            $sell = $data[$asset]['sell'];
            $buy = $data[$asset]['buy'];
            if ($last == $high) {
                $status = "Harga Tertinggi !!!";
            }elseif($last == $low){
                $status = "Harga terendah !!!";
            }else{
                $status = "Harga diantara !!!";
            }
            $msg8 .= "Nomor : ".$nomor."%0aAsset : ".$asset."%0aLast Price : ".$last."%0aHigh 24H : ".$high."%0aLow 24H : ".$low."%0aSell : ".$sell."%0aBuy : ".$buy."%0a".$status."%0a%0a";
        }
        file_get_contents($apiLink . "sendmessage?chat_id=$chat_id&text=".$msg.$msg1."...");
        file_get_contents($apiLink . "sendmessage?chat_id=$chat_id&text=".$msg.$msg2."...");
        file_get_contents($apiLink . "sendmessage?chat_id=$chat_id&text=".$msg.$msg3."...");
        file_get_contents($apiLink . "sendmessage?chat_id=$chat_id&text=".$msg.$msg4."...");
        file_get_contents($apiLink . "sendmessage?chat_id=$chat_id&text=".$msg.$msg5."...");
        file_get_contents($apiLink . "sendmessage?chat_id=$chat_id&text=".$msg.$msg6."...");
        file_get_contents($apiLink . "sendmessage?chat_id=$chat_id&text=".$msg.$msg7."...");
        file_get_contents($apiLink . "sendmessage?chat_id=$chat_id&text=".$msg.$msg8."...");
    }
    if ($text=="/low_indodax") {
        $msgStatusCoinLow = "Coin yang mengalami harga terendah : %0a";
        $coinLowPrice = array();
        $nomor = 0;
        for ($i=0; $i < $panjangData; $i++) { 
            $asset = array_keys($data)[$i];
            $low = $data[$asset]['low'];
            $last = $data[$asset]['last'];
            $buy = $data[$asset]['buy'];
            if ($last == $low) {
                $nomor = $nomor+1;
                $msgLow .= $nomor.".".$asset."%0a"."Harga Beli : ".$low."%0a";
            }
        }
        file_get_contents($apiLink . "sendmessage?chat_id=$chat_id&text=".$msgStatusCoinLow.$msgLow."...");
    }
    if ($text=="/start") {
        $msgWelcome = "Selamat datang di bot Monitoring Harga Cryptocurrency, kamu dapat menyesuaikan command yang tersedia sesuai dengan kebutuhan kamu :)";

        file_get_contents($apiLink . "sendmessage?chat_id=$chat_id&text=".$msgWelcome."...");
    }
    if ($text=="/high_indodax") {
        $msgStatusCoinLow = "Coin yang mengalami harga tertinggi : %0a";
        $coinLowPrice = array();
        $nomor = 0;
        for ($i=0; $i < $panjangData; $i++) { 
            $asset = array_keys($data)[$i];
            $high = $data[$asset]['high'];
            $last = $data[$asset]['last'];
            $sell = $data[$asset]['sell'];
            if ($last == $high) {  
                $nomor = $nomor+1;
                $msgHigh .= $nomor.".".$asset."%0a"."Harga Jual : ".$sell."%0a";
            }
        }
        file_get_contents($apiLink . "sendmessage?chat_id=$chat_id&text=".$msgStatusCoinLow.$msgHigh."...");
    }
    if ($text=="/recommend_to_buy") {
        $arrayDataBuy = array();
        foreach ($data as $row => $value) {
            $msgRecomendtoBuy = "";
            $batasAmanBuy = $value['low'] * 1/100;

            if ($value['last'] > 1 && ($value['last'] - $value['low']) < $batasAmanBuy) {
                $msgRecomendtoBuy = "Recomend to Buy :%0a".$row."%0aLast Price : ".number_format($value['last'])."%0aLow 24H : ".number_format($value['low'])."%0aBuy Price : ".number_format($value['buy'])."%0a%0a";
                array_push($arrayDataBuy,$msgRecomendtoBuy);
            }
        }
        splitRecomendtoBuy($arrayDataBuy);
    }
    if ($text=="/recommend_to_sell") {
        $arrayDataSell = array();
        foreach ($data as $row => $value) {
            $msgRecomendtoSell = "";
            $batasAmanSell = $value['high'] * 1/100;

            if ($value['last'] > 1 && ($value['high'] - $value['last']) < $batasAmanSell) {
                $msgRecomendtoSell = "Recomend to Sell :%0a".$row."%0aLast Price : ".number_format($value['last'])."%0aHigh 24H : ".number_format($value['high'])."%0aSell Price : ". number_format($value['sell'])."%0a%0a";
                array_push($arrayDataSell,$msgRecomendtoSell);
            }
        }
        splitRecomendtoSell();
    }
    else echo 'Only telegram can access this url.';
?>
