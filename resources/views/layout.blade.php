<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="description" content="Movie/TV/music reviews.">
		<meta name="keywords" content="reviews, movies, tv, television, music">
		<meta property="og:title" content="{{ !empty($metaTitle) ? $metaTitle . ' | ' : '' }}Critic">
		<meta property="og:description" content="Movie/TV/music reviews.">
		<title>{{ !empty($metaTitle) ? $metaTitle . ' | ' : '' }}Critic</title>
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon.png">
		<link rel="icon" href="/favicon.ico">
		<link rel="stylesheet" href="/assets/css/style.min.css?20220622">
		<link rel="alternate" type="application/rss+xml" href="/feed.xml">
		<script>document.documentElement.classList.remove('no-js');</script>
	</head>
	<body>
		<main>
			<header id="page-header">
				<a href="/" id="page-title">Critic</a>
				<div id="page-auth">
					@if (Auth::user())
						<form action="/logout" method="post">
							@csrf
							<button type="submit">Logout</button>
						</form>
					@elseif (Request::is('/'))
						<a class="link" href="/login">Login</a>
					@endif
				</div>
			</header>
			<article>
				@yield('content')
			</article>
		</main>
		<script src="/assets/js/functions.min.js?20220622"></script>
	</body>
</html>
