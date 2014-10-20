<div class="large-12 columns">

	<article>
		<h2>$Title</h2>
		$Content
		$Form
	</article>

	<ul class="inline-list">
		<% loop $Children %>
			<li>
				<a href="$Link">
					<h3>$Title</h3>
					<img class="" src="$FirstImage.CroppedFocusedImage(1000,300).URL" style="width:100%;">
				</a>
			</li>
		<% end_loop %>

	</ul>


</div>
