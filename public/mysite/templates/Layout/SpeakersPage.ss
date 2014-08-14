<div class="large-9 columns">
	<article>
		<h2>$Title</h2>
		$Content
		$Form

		<div class="speakers">
			<% loop $Speakers %>
				<div class="speaker row">
					<div class="medium-4 columns img">
						<% with $Picture.GreyscaleImage %>
							$CroppedImage(200, 200)
						<% end_with %>
					</div>
					<div class="medium-8 columns text">
						<h2>
							$FullName
							<br />
							<small>$Oneliner</small>
						</h2>
						$Description
					</div>
				</div>
	
			<% end_loop %>
		</div>
		
	</article>
</div>

<div class="large-3 columns">
	<% include SignupColumn %>
</div>


