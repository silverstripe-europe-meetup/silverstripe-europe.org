<div class="large-12 columns">
	<article>
		<h2>$Title</h2>
		$Content
		$Form

		<div class="days row">
			<% loop $Days %>
				<div class="day medium-4 columns">
					<h3>
						<span class="day">$Weekday</span>
						<span class="date">$Date</span>
					</h3>
					<div class="items">
						<% loop $Items %>
							<div class="item">
								<h4>
									<span class="time">$StartTime.Nice</span>
									<span class="title">$Title</span>
									<% if $Speaker %>
										<span class="speaker">by $Speaker.FullName</span>
									<% end_if %>
									<% if $Description %>
										$Description
									<% end_if %>
								</h4>
							</div>
						<% end_loop %>
					</div>
				</div>
			<% end_loop %>
		</div>
		
	</article>
</div>

<div class="large-12 columns">
	<% include SignupColumn %>
</div>


