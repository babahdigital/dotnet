<?php
if($_POST) {
    $visitor_name = "";
    $visitor_email = "";
    $email_title = "Kontak Dari Server Utama";
    $visitor_telpon = "";
    $visitor_message = "";
	$recipient = "babahcloud@gmail.com";
	$dari = "no-replay@babahdigital.net";
	$clienttitle = "[No-Replay] - BabahDigital";
	$clientmsg = "Terima Kasih Telah Menghubungi Kami, <br />Team Kami Akan Segera Menghubungi Anda. <br /><br /><br />TTD <br />BabahDigital";
    
    if(isset($_POST['visitor_name'])) {
      $visitor_name = filter_var($_POST['visitor_name'], FILTER_SANITIZE_STRING);
    }
    
    if(isset($_POST['visitor_email'])) {
    	$visitor_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['visitor_email']);
    	$visitor_email = filter_var($visitor_email, FILTER_VALIDATE_EMAIL);
    }
    
    if(isset($_POST['email_title'])) {
    	$email_title = filter_var($_POST['email_title'], FILTER_SANITIZE_STRING);
    }
    
    if(isset($_POST['visitor_telpon'])) {
		$visitor_telpon = preg_replace('/[^0-9]/', '', $_POST['visitor_telpon']);
		//$visitor_telpon = filter_var($_POST['visitor_telpon'], FILTER_SANITIZE_NUMBER_INT);
		$visitor_telpon = filter_var($visitor_telpon, FILTER_SANITIZE_NUMBER_INT);
    }
    
    if(isset($_POST['visitor_message'])) {
    	$visitor_message = htmlspecialchars($_POST['visitor_message']);
    }
    
    $headers  = 'MIME-Version: 1.0' . "\r\n"
    .'Content-type: text/html; charset=utf-8' . "\r\n"
    .'From: ' . $visitor_name . '<'.$dari.'>' . "\r\n";
    
    if(mail($recipient, 
		'[babahdigital.net] ' . $email_title, 
		'Nama: ' . $visitor_name 
		. '<br />' . 
		'Email: ' . $visitor_email 
		. '<br />' . 
		'Telpon: ' . "<a href='tel:$visitor_telpon'>$visitor_telpon</a>" 
		. '<br />' . 
		'Pesan: ' . '<br />' . $visitor_message, 
		$headers)) { 
		echo "<div class='alert alert-success' role='alert'>Terima kasih $visitor_name. Team kami akan segera merespon email anda.</div>";
		mail($visitor_email, $clienttitle, $clientmsg, $headers);
    } 
	else {
    	echo "<div class='alert alert-danger' role='alert'>Mohon maaf email tidak terkirim, anda dapat menghubungi kami melalui <a href='https://wa.me/62811585180?text=Hai%20Team%20BabahDigital,%20Saya%20Mau%20Bertanya%20Tentang%20Produk%20Anda'>whatsapp</a></div>";
    }	
}
?>