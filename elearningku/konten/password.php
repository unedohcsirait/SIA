<h3>Ganti Password</h3>
<?php
if ($_SESSION['guru']){
?>		<form method="POST" action="proses.php?pilih=guru&untukdi=gantipassword" name="editpassword" id="editpassword">
		<?php
		echo "<input type='hidden' name='nip' value='$_SESSION[guru]'>";
		?>
		<table style="margin: 20px 0 20px 0;">
			<tr class="form"><th class="garis" colspan="3" style="text-align: center">Form Password</th></tr>
			<tr class="form"><td width="150"><b>Password</b></td><td><input type="password" class="panjang" name="password"></td></tr>
			<tr class="form"><td width="150"><b>Ulang Password</b></td><td><input type="password" class="panjang" name="password2"></td></tr>
			<tr class="form"><td width="150"></td><td><input type="submit" class="tombol" value="Simpan">&nbsp;<input type="button" class="tombol" value="Batal" onclick="self.history.back()"></td></tr>
		</table>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editpassword");
			frmvalidator.addValidation("password","req","Password harus diisi");
			frmvalidator.addValidation("password","maxlen=20","Password terlalu panjang, maksimal 20 karakter");
			frmvalidator.addValidation("password","minlen=6","Password terlalu pendek, minimal 6 karakter");
			frmvalidator.addValidation("password2","eqelmnt=password","Password tidak sama");
			
			//]]>
		</script>
<?php }

else { 
?>		<form method="POST" action="proses.php?pilih=siswa&untukdi=gantipassword" name="editpassword" id="editpassword">
		<?php
		echo "<input type='hidden' name='nis' value='$_SESSION[siswa]'>";
		?>
		<table style="margin: 20px 0 20px 0;">
			<tr class="form"><th class="garis" colspan="3" style="text-align: center">Form Password</th></tr>
			<tr class="form"><td width="150"><b>Password</b></td><td><input type="password" class="panjang" name="password"></td></tr>
			<tr class="form"><td width="150"><b>Ulang Password</b></td><td><input type="password" class="panjang" name="password2"></td></tr>
			<tr class="form"><td width="150"></td><td><input type="submit" class="tombol" value="Simpan">&nbsp;<input type="button" class="tombol" value="Batal" onclick="self.history.back()"></td></tr>
		</table>
		</form>
		<script language="JavaScript" type="text/javascript" xml:space="preserve">
			//<![CDATA[
			var frmvalidator  = new Validator("editpassword");
			frmvalidator.addValidation("password","req","Password harus diisi");
			frmvalidator.addValidation("password","maxlen=20","Password terlalu panjang, maksimal 20 karakter");
			frmvalidator.addValidation("password","minlen=6","Password terlalu pendek, minimal 6 karakter");
			frmvalidator.addValidation("password2","eqelmnt=password","Password tidak sama");
			
			//]]>
		</script>
<?php } ?>