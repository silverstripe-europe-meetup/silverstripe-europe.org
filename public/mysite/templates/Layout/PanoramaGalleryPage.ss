<div class="large-12 columns">

	<article>
		<h2>$Title</h2>
		$Content
		$Form
	</article>

	<div class="PanoramaList">
		<% loop $SortedImages %>
			<div class="panorama">
				<img class="" src="$SetWidth(3000).URL" />
			</div>
		<% end_loop %>

	</div>



</div>
