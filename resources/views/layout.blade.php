<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width,initial-scale=1">
		<meta name="description" content="Movie/TV/music reviews.">
		<meta name="keywords" content="reviews, movies, tv, television, music">
		<meta property="og:title" content="{{ !empty($metaTitle) ? $metaTitle . ' | ' : '' }}Critic">
		<meta property="og:description" content="Movie/TV/music reviews.">
		<meta property="og:image" content="{{ url('/assets/img/share.png') }}">
		<title>{{ !empty($metaTitle) ? $metaTitle . ' | ' : '' }}Critic</title>
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
		<link rel="icon" type="image/png" sizes="32x32" href="/favicon.png">
		<link rel="icon" href="/favicon.ico">
		<link rel="stylesheet" href="{{ mix('/assets/css/style.min.css') }}">
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
							<button id="menu-button" type="button">Menu</button>
							<div id="menu">
								<a class="link{{ Request::is('albums') ? ' link--active' : '' }}" href="/albums">Albums</a>
								<a class="link{{ Request::is('books') ? ' link--active' : '' }}" href="/books">Books</a>
								<a class="link{{ Request::is('movies') ? ' link--active' : '' }}" href="/movies">Movies</a>
								<a class="link{{ Request::is('tv') ? ' link--active' : '' }}" href="/tv">TV Shows</a>
								<span id="page-auth-flex"></span>
								@if (Request::is('tags/*') && !Request::is('tags/create') && !Request::is('tags/*/edit'))
									<a class="link" href="{{ $row->editUrl() }}">
										Edit Tag
									</a>
								@endif
								@if (Request::is('tags/*/edit'))
									<a class="link" href="{{ $row->url() }}">
										View Tag
									</a>
								@endif
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
		<script src="{{ mix('/assets/js/app.min.js') }}"></script>
		@if (Auth::user())
			<script src="{{ mix('/assets/js/admin.min.js') }}"></script>
			<script src="{{ url('/assets/js/ckeditor.min.js') }}"></script>
		@endif
	</body>
</html>
