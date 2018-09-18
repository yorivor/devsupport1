<?php include "header.php"; ?>
<div class="br-line"></div>
<div class="form-section">
	<form method="POST" action="signature.php">
		<table>
			<tr>
				<td>Name: <span class="req">*</span></td>
				<td>
					<input class="input_text" type="text" name="fname" />
				</td>
			</tr>
			<tr>
				<td>Position: <span class="req">*</span></td>
				<td>
					<input class="input_text" type="text" name="position" />
				</td>
			</tr>
			<tr>
				<td>WeChat: <span class="req">*</span></td>
				<td>
					<input class="input_text" type="text" name="wechatid" />
				</td>
			</tr>
			<tr>
				<td>Skype: <span class="req">*</span></td>
				<td>
					<input class="input_text" type="text" name="skypeid" />
				</td>
			</tr>
			<tr>
				<td>Mobile: </td>
				<td>
					<input class="input_number" type="text" placeholder="917" maxlength="3" name="mobileid" />
					<input class="input_number" type="text" placeholder="XXX" maxlength="3" name="mobileid2" />
					<input class="input_number" type="text" placeholder="XXXX" maxlength="4" name="mobileid3" />
				</td>
			</tr>
		</table>
		<div class="btn-section">
			<input type="submit" name="submit" class="btn-gen" value="Generate" />
		</div>
		<h4>
			<span class="req">*</span> Indicates required field.
		</h4>
	</form>
</div>
<?php include "footer.php"; ?>
