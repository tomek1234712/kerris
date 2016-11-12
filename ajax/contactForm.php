<?php
require_once '../../../../wp-config.php';

$valid = false;
$i = 0;
$target = 4;
$alert = array();
$message = $_POST['msg'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$address = $_POST['address'];

if(!empty($fname)){
        $i++;
}else{ 
    $alert['fname'] = true;
}
if(!empty($lname)){
        $i++;
}else{ 
    $alert['lname'] = true;
}
if(!empty($email)){
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $i++;  
    }else{
         $alert['email'] = true;
    }
}else{ 
    $alert['email'] = true;
}

if(!empty($message)){
        $i++;
}else{ 
    $alert['msg'] = true;
}


if($i == $target){
    $to = get_field('contact_form_email', 'option');
    
    $message_html = "First name: ".$fname."<br />";
    $message_html .= "Last name: ".$lname."<br />";
    if(isset($address) && !empty($address)){
        $message_html .= "Address: ".$address."<br />";
    }
    $message_html .= "Email: ".$email."<br />";
    if(isset($subject)){
        $message_html .= "Subject: ".$subject."<br />";
    }
    $message_html .= "Message: ".$message."<br />";
    
    add_filter( 'wp_mail_content_type', 'set_html_content_type' );

    $headers[] = 'From: '.get_bloginfo( 'name', 'display' ).' <no-replay@auto.com.au>';

    $valid = wp_mail( array($to), 'New message from contact form', $message_html, $headers );

    remove_filter( 'wp_mail_content_type', 'set_html_content_type' );
}
$arr = array('valid'=>$valid,'alert'=>$alert);        
echo json_encode($arr);        
?>