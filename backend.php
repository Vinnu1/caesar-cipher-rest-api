<?php
$text = $_GET['text'];
$type = $_GET['type'];
$key = 4;
if(isset($text) && isset($type)){
    if($type == "encrypt"){
        $encryptedText = encrypt($text,$key);
        $value = string2hexa($encryptedText);
    }
    else if($type == "decrypt"){   
        $encryptedText = hexa2string($text);
        $value = decrypt($encryptedText,$key);
    }
    else{
        echo "Type field can only be 'encrypt' or 'decrypt'";
        exit(1);
    }
    $result = new \stdClass();
    $result->value = "$value";
    $result->type = "$type";
    $json = json_encode($result);
    echo $json;
}
else{
    echo 'Error. Set text and type fields properly.';
}

function encrypt($str, $key) {
    $encrypted_text = "";
    $offset = $key % 26;
    if($offset < 0) {
        $offset += 26;
    }
    $i = 0;
    while($i < strlen($str)) {
        $c = strtoupper($str{$i}); 
        if(($c >= "A") && ($c <= 'Z')) {
            if((ord($c) + $offset) > ord("Z")) {
                $encrypted_text .= chr(ord($c) + $offset - 26);
        } else {
            $encrypted_text .= chr(ord($c) + $offset);
        }
      } else {
          $encrypted_text .= " ";
      }
      $i++;
    }
    return $encrypted_text;
}

function decrypt($str, $key) {
    $decrypted_text = "";
    $offset = $key % 26;
    if($offset < 0) {
        $offset += 26;
    }
    $i = 0;
    while($i < strlen($str)) {
        $c = strtoupper($str{$i}); 
        if(($c >= "A") && ($c <= 'Z')) {
            if((ord($c) - $offset) < ord("A")) {
                $decrypted_text .= chr(ord($c) - $offset + 26);
        } else {
            $decrypted_text .= chr(ord($c) - $offset);
        }
      } else {
          $decrypted_text .= " ";
      }
      $i++;
    }
    return $decrypted_text;
}

function hexa2string( $hex ) {
    return pack('H*', $hex);
}

function string2hexa( $str ) {
    return unpack('H*', $str)[1];
}  
?>