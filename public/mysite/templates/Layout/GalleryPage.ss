<div class="large-12 columns">

	<article>
		<h2>$Title</h2>
		$Content
		$Form
	</article>

	<ul class="clearing-thumbs GalleryList" data-clearing>
		<% loop $SortedImages %>
			<li>
				<a href="$SetWidth(1200).URL">
					<img class="th" src="$CroppedImage(800,480).URL" width="400" height="240" />
				</a>
			</li>
		<% end_loop %>

	</ul>



</div>
