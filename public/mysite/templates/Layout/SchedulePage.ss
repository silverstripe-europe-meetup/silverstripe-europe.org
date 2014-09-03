<div class="large-9 columns">
	<article>
		<h2>$Title</h2>
		$Content
		$Form

		<div class="days">
			<% loop $Days %>
				<div class="day">
					<h2 class="hr">$Date.Format('l')
						<small>$Date.Format('j. F')</small>
					</h2>
					<table>
						<% loop $TalkList %>
							<tr class="$EvenOdd">
								<td class="time">
									<% if $Tracks %>
										<span>$Time</span>
									<% end_if %>
								</td>
								<% loop $Tracks %>
									<td class="talk" <% if $Length > 1 %>rowspan="$Length"<% end_if %>
										<% if $First && $Up.Colspan > 1 %> colspan="$Up.Colspan"<% end_if %>>
										<div class="talk-container">
											<h5>$Title</h5>
											<% if $Speaker %>
												<h6>by $Speaker.Title</h6>
											<% end_if %>
											$Content
										</div>
									</td>
								<% end_loop %>
							</tr>
						<% end_loop %>
					</table>
				</div>
			<% end_loop %>
		</div>
	</article>
</div>

<div class="large-3 columns">
	<% include SignupColumn %>
</div>
