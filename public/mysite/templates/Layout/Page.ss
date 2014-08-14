<div class="<% if $Children || $Parent %>large-6 large-push-3<% else %>large-9<% end_if %> columns">
	<article>
		<h2>$Title</h2>
		$Content
		$Form
		
	</article>
</div>

<div class="large-3 columns <% if $Children || $Parent %>large-push-3<% end_if %>">

	<h2>Sign up</h2>
	<p>
		Attendance is free, but you need to sign up, <strong>Latest the 26th September 2014</strong>
		so we can plan location, catering, and of course <br />
		<strong>Your free SilverStripe t-shirt!</strong>.
	</p>
	<a href="http://www.meetup.com/SilverStripe-Europe-Meetup/events/168730312/" target="_blank" class="button">Sign up!</a>

</div>



<% if $Children || $Parent %><%--Determine if Side Nav should be rendered, you can change this logic--%>
<div class="large-3 large-pull-9 columns">
	<div class="panel">
		<% include SideNav %>
	</div>
</div>
<% end_if %>