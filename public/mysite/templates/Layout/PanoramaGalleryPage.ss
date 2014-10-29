<div class="large-12 columns">

	<article>
		<h2>$Title</h2>
		$Content
		$Form
	</article>

	<div class="PanoramaList">
		<% loop $SortedImages %>
			<a href="$SetWidth(3000).URL">
				<img src="$CroppedFocusedImage(1000,300).URL" />
			</a>
		<% end_loop %>

	</div>



</div>
