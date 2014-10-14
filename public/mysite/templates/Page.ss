<!doctype html>
<html class="no-js" lang="$ContentLocale.ATT" dir="$i18nScriptDirection.ATT">
<head>
	<% base_tag %>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title><% if $MetaTitle %>$MetaTitle<% else %>$Title<% end_if %> - $SiteConfig.Title</title>
	<meta name="description" content="$MetaDescription.ATT" />
	<%--http://ogp.me/--%>
	<meta property="og:site_name" content="$SiteConfig.Title.ATT" />
	<meta property="og:type" content="website" />
	<meta property="og:title" content="$Title.ATT" />
	<meta property="og:description" content="$MetaDescription.ATT" />
	<meta property="og:url" content="$AbsoluteLink.ATT" />
	<% if $Image %>
	<meta property="og:image" content="<% with $Image.SetSize(500,500) %>$AbsoluteURL.ATT<% end_with %>" />
	<% end_if %>
	<link rel="icon" type="image/png" href="$ThemeDir/favicon.ico" />
	<%--See [Requirements](http://doc.silverstripe.org/framework/en/reference/requirements) for loading from controller--%>
	<script src="$ThemeDir/bower_components/modernizr/modernizr.js"></script>
</head>
<body class="$ClassName.ATT">

<div class="container">

	<header class="header" role="banner">
		<a href="/">
			<img src="/mysite/images/logo-meetup-2014.png" alt="SilverStripe Europe Meetup"/>
		</a>
	</header>
	
	<div class="contain-to-grid">
		<% include TopBar %>
	</div>

<%--	<img id="badge" src="/mysite/images/2014-badge.png" alt="Badge" /> --%>
	
	<div class="main typography" role="main">
		<div class="row">
			$Layout
		</div>
	</div>

	<%--
	<nav role="navigation">
		<div class="row">
			<div class="large-12 columns">
				<% include Breadcrumbs %>
			</div>
		</div>
	</nav>

	<footer class="footer" role="contentinfo">
		<div class="row">
			<div class="large-12 columns">
				<p>$Now.Year $SiteConfig.Title</p>
			</div>
		</div>
	</footer>
	--%>

	
</div>

<div class="credits">
	<a href="/credits/">credits</a>
</div>

	<%--Login Modal--%>
	<div id="login-form-modal" class="reveal-modal medium" data-reveal>
		<h2>Login</h2>
		$LoginForm
		<a class="close-reveal-modal">&#215;</a>
	</div>

	<%--See [Requirements](http://doc.silverstripe.org/framework/en/reference/requirements) for loading from controller--%>
	<script src="$ThemeDir/bower_components/jquery/dist/jquery.min.js"></script>
	<script src="$ThemeDir/bower_components/foundation/js/foundation.min.js"></script>
	<script src="$ThemeDir/javascript/app.js"></script>
	
	<script>
	  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
	  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
	  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
	  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');
	
	  ga('create', 'UA-54794642-1', 'auto');
	  ga('send', 'pageview');
	
	</script>
</body>
</html>
