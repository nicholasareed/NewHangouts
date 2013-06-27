<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-header">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h3 id="myModalLabel">InstaShare</h3>
	</div>
	<div class="modal-body">
		<form action="instantshare.php" method="post" class="form-horizontal">
			<fieldset>
				<legend>Instantly share a message</legend>
				<textarea name="message" class="full-sized" required></textarea>
			</fieldset><br>
			<button type="submit" class="btn btn-info">Send Message</button>
		</form>
	</div>
	<div class="modal-footer">
		<div class="btn-group">
			<a href="instantshare.php" class="btn btn-info">View Posts</a>
			<button class="btn btn-info" data-dismiss="modal" aria-hidden="true">Close InstaShare</button>    
		</div>
	</div>
</div>