<?php 
$data = file_get_contents('iplist/deny.txt');
$array = explode("\n" , $data);
?>

<!-- Modal -->
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="ModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h1 class="modal-title fs-5" id="ModalLabel">Permanent IP Blacklist </h1>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body ip-black">
				<?php $i = 0;
				echo "<ul class='list-group list-group-horizontal'><li class='list-group-item'>";
				foreach ($array as $line) {
					$i++;
					echo "$line" . "<br />";
					if ($i == 3) {
						echo "</li></ul><ul class='list-group list-group-horizontal'><li class='list-group-item'>";
						$i = 0;
					}
				}
				echo "</li></ul>"; ?>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
			</div>
		</div>
	</div>
</div>