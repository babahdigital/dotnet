<?php
/*
Form Kontak
*/
?>
<form id="kontak" class="needs-validation" method="post" target="_self" novalidate>
	<div class="mb-3">
		<label for="name" class="form-label">Nama</label>
		<input type="text" class="form-control" id="name" name="visitor_name" placeholder="Abdullah" pattern=[A-Z\sa-z]{3,20} required>
	</div>
	<div class="mb-3">
		<label for="email" class="form-label">Email address</label>
		<input type="email" class="form-control" id="email" name="visitor_email" placeholder="abdullah@contoh.com" required>
	</div>
		<div class="mb-3">
		<label for="telpon" class="form-label">Nomor Telpon</label>
		<input type="number" class="form-control" id="telpon" name="visitor_telpon" placeholder="08115xxxx" required>
	</div>
	<div class="mb-3">
		<label for="message" class="form-label">Detail Pesan</label>
		<textarea class="form-control" id="message" name="visitor_message" rows="3" placeholder="Sampaikan Detail Keluhan Atau Informasi Yang Dibutuhkan" required></textarea>
	</div>
	<div class="mb-3">
		<label id="ebcaptchatext" class="form-label"></label>
		<input type="text" class="form-control" id="ebcaptchainput" placeholder="Masukan Jumlahnya" required>
	</div>
	<div class="d-grid gap-2">
		<button class="btn btn-primary" type="submit">Kirim</button>
	</div>
</form>