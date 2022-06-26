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
		@if (!empty($canonical))
			<link rel="canonical" href="{{ url($canonical) }}">
		@endif
		<script>document.documentElement.classList.remove('no-js');</script>
	</head>
	<body class="{{ Auth::user() ? 'auth' : '' }}">
		<a class="button" href="#article" id="skip">Skip to content</a>
		<main>
			<header id="page-header">
				@if (Request::is('/'))
					<span id="page-title">Critic</span>
				@else
					<a href="/" id="page-title">Critic</a>
				@endif
				@if (Auth::user())
					<div id="page-auth">
						<div class="contain" id="page-auth-inner">
							<a class="link{{ Request::is('albums') ? ' link--active' : '' }}" href="/albums">Albums</a>
							<a class="link{{ Request::is('books') ? ' link--active' : '' }}" href="/books">Books</a>
							<a class="link{{ Request::is('movies') ? ' link--active' : '' }}" href="/movies">Movies</a>
							<a class="link{{ Request::is('tv') ? ' link--active' : '' }}" href="/tv">TV Shows</a>
							<span id="page-auth-flex"></span>
							<a
								class="link{{ Request::is('works/create') && $defaultType === 'Album' ? ' link--active' : '' }}"
								href="/works/create?type=Album"
							>
								+ Album
							</a>
							<a
								class="link{{ Request::is('works/create') && $defaultType === 'Book' ? ' link--active' : '' }}"
								href="/works/create?type=Book"
							>
								+ Book
							</a>
							<a
								class="link{{ Request::is('works/create') && $defaultType === 'Movie' ? ' link--active' : '' }}"
								href="/works/create?type=Movie"
							>
								+ Movie
							</a>
							<a
								class="link{{ Request::is('works/create') && $defaultType === 'Tv' ? ' link--active' : '' }}"
								href="/works/create?type=Tv"
							>
								+ TV
							</a>
							<a
								class="link{{ Request::is('tags/create') ? ' link--active' : '' }}"
								href="/tags/create"
							>
								+ Tag
							</a>
							<form action="/logout" id="logout" method="post">
								@csrf
								<button class="button--link" type="submit">Logout</button>
							</form>
						</div>
					</div>
				@endif
			</header>
			<article class="contain" id="article">
				@yield('content')
			</article>
			<footer id="page-footer">
				<div class="contain" id="page-footer-inner">
					@if (!Auth::user() && !Request::is('login'))
						<a class="link" href="/login">Login</a>
					@endif
					<a class="link" href="https://github.com/jlbelanger/critic">GitHub</a>
				</div>
			</footer>
		</main>
		<script src="/assets/js/functions.min.js?20220622"></script>
	</body>
</html>