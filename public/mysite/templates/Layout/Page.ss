<div class="<% if $Children || $Parent %>large-6 large-push-3<% else %>large-9<% end_if %> columns">
	<article>
		<h2>$Title</h2>
		$Content
		$Form
		
	</article>
</div>

<div class="large-3 columns <% if $Children || $Parent %>large-push-3<% end_if %>">
	<% include SignupColumn %>
</div>



<% if $Children || $Parent %><%--Determine if Side Nav should be rendered, you can change this logic--%>
<div class="large-3 large-pull-9 columns">
	<div class="panel">
		<% include SideNav %>
	</div>
</div>
<% end_if %>