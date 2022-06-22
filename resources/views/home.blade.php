@extends('layout')

@section('content')
	<div id="widgets">
		<section class="widget widget--2col widget--2row" id="recent-movies" style="animation-delay: 100ms">
			<h1 class="widget__title">Recent Movies</h1>
			<ul class="widget__list">
				<li class="widget__list-item">
					<cite>Lorem Ipsum</cite> <span class="year">(2000)</span>
					<div class="date">January 1, 2001</div>
					<div class="star star--25">2.5 out of 5</div>
				</li>
				<li class="widget__list-item">
					<cite>Lorem Ipsum</cite> <span class="year">(2000)</span>
					<div class="date">January 1, 2001</div>
					<div class="star star--25">2.5 out of 5</div>
				</li>
				<li class="widget__list-item">
					<cite>Lorem Ipsum</cite> <span class="year">(2000)</span>
					<div class="date">January 1, 2001</div>
					<div class="star star--25">2.5 out of 5</div>
				</li>
				<li class="widget__list-item">
					<cite>Lorem Ipsum</cite> <span class="year">(2000)</span>
					<div class="date">January 1, 2001</div>
					<div class="star star--25">2.5 out of 5</div>
				</li>
				<li class="widget__list-item">
					<cite>Lorem Ipsum</cite> <span class="year">(2000)</span>
					<div class="date">January 1, 2001</div>
					<div class="star star--25">2.5 out of 5</div>
				</li>
			</ul>
		</section>

		<section class="widget" id="stats" style="animation-delay: 200ms">
			<h1 class="widget__title sr">Stats</h1>
			<ul class="widget__list">
				<li class="widget__list-item">
					<a class="widget__link" href="/movies"><span class="num">1,234</span> Movies</a>
				</li>
				<li class="widget__list-item">
					<a class="widget__link" href="/tv"><span class="num">1,234</span> TV</a>
				</li>
				<li class="widget__list-item">
					<a class="widget__link" href="/books"><span class="num">1,234</span> Books</a>
				</li>
				<li class="widget__list-item">
					<a class="widget__link" href="/albums"><span class="num">1,234</span> Albums</a>
				</li>
			</ul>
		</section>

		<section class="widget widget--cloud" id="tags" style="animation-delay: 300ms">
			<h1 class="widget__title sr">Tags</h1>
			<ul class="cloud">
				<li class="cloud__list-item"><a href/="/tags/lorem-ipsum">Lorem Ipsum<span class="cloud__num">1</span></a></li>
				<li class="cloud__list-item"><a href="/tags/lorem-ipsum">Lorem Ipsum<span class="cloud__num">4</span></a></li>
				<li class="cloud__list-item"><a href="/tags/lorem-ipsum">Lorem Ipsum<span class="cloud__num">9</span></a></li>
				<li class="cloud__list-item"><a href="/tags/lorem-ipsum">Lorem Ipsum<span class="cloud__num">3</span></a></li>
				<li class="cloud__list-item"><a href="/tags/lorem-ipsum">Lorem Ipsum<span class="cloud__num">8</span></a></li>
				<li class="cloud__list-item"><a href="/tags/lorem-ipsum">Lorem Ipsum<span class="cloud__num">12</span></a></li>
				<li class="cloud__list-item"><a href="/tags/lorem-ipsum">Lorem Ipsum<span class="cloud__num">2</span></a></li>
				<li class="cloud__list-item"><a href="/tags/lorem-ipsum">Lorem Ipsum<span class="cloud__num">7</span></a></li>
				<li class="cloud__list-item"><a href="/tags/lorem-ipsum">Lorem Ipsum<span class="cloud__num">11</span></a></li>
				<li class="cloud__list-item"><a href="/tags/lorem-ipsum">Lorem Ipsum<span class="cloud__num">13</span></a></li>
				<li class="cloud__list-item"><a href="/tags/lorem-ipsum">Lorem Ipsum<span class="cloud__num">5</span></a></li>
				<li class="cloud__list-item"><a href="/tags/lorem-ipsum">Lorem Ipsum<span class="cloud__num">15</span></a></li>
				<li class="cloud__list-item"><a href="/tags/lorem-ipsum">Lorem Ipsum<span class="cloud__num">6</span></a></li>
				<li class="cloud__list-item"><a href="/tags/lorem-ipsum">Lorem Ipsum<span class="cloud__num">10</span></a></li>
				<li class="cloud__list-item"><a href="/tags/lorem-ipsum">Lorem Ipsum<span class="cloud__num">14</span></a></li>
			</ul>
		</section>

		<section class="widget widget--graph" id="movies-by-decade" style="animation-delay: 400ms">
			<h1 class="widget__title">Movies by Decade</h1>
			<ul class="graph">
				<li class="graph__list-item">
					<a class="graph__link" href="/movies?decade=1930s"><span class="graph__bar">1</span><span class="graph__label">&rsquo;30s</span></a>
				</li>
				<li class="graph__list-item">
					<a class="graph__link" href="/movies?decade=1940s"><span class="graph__bar">2</span><span class="graph__label">&rsquo;40s</span></a>
				</li>
				<li class="graph__list-item">
					<a class="graph__link" href="/movies?decade=1950s"><span class="graph__bar">3</span><span class="graph__label">&rsquo;50s</span></a>
				</li>
				<li class="graph__list-item">
					<a class="graph__link" href="/movies?decade=1960s"><span class="graph__bar">4</span><span class="graph__label">&rsquo;60s</span></a>
				</li>
				<li class="graph__list-item">
					<a class="graph__link" href="/movies?decade=1970s"><span class="graph__bar">5</span><span class="graph__label">&rsquo;70s</span></a>
				</li>
				<li class="graph__list-item">
					<a class="graph__link" href="/movies?decade=1980s"><span class="graph__bar">6</span><span class="graph__label">&rsquo;80s</span></a>
				</li>
				<li class="graph__list-item">
					<a class="graph__link" href="/movies?decade=1990s"><span class="graph__bar">7</span><span class="graph__label">&rsquo;90s</span></a>
				</li>
				<li class="graph__list-item">
					<a class="graph__link" href="/movies?decade=2000s"><span class="graph__bar">8</span><span class="graph__label">&rsquo;00s</span></a>
				</li>
				<li class="graph__list-item">
					<a class="graph__link" href="/movies?decade=2010s"><span class="graph__bar">2</span><span class="graph__label">&rsquo;10s</span></a>
				</li>
				<li class="graph__list-item">
					<a class="graph__link" href="/movies?decade=2020s"><span class="graph__bar">1</span><span class="graph__label">&rsquo;20s</span></a>
				</li>
			</ul>
		</section>

		<section class="widget widget--graph" id="movies-by-decade" style="animation-delay: 500ms">
			<h1 class="widget__title">Movies by Rating</h1>
			<ul class="graph">
				<li class="graph__list-item">
					<a class="graph__link" href="/movies?rating=2"><span class="graph__bar">1</span><span class="graph__label">2</span></a>
				</li>
				<li class="graph__list-item">
					<a class="graph__link" href="/movies?rating=3"><span class="graph__bar">2</span><span class="graph__label">3</span></a>
				</li>
				<li class="graph__list-item">
					<a class="graph__link" href="/movies?rating=4"><span class="graph__bar">3</span><span class="graph__label">4</span></a>
				</li>
				<li class="graph__list-item">
					<a class="graph__link" href="/movies?rating=5"><span class="graph__bar">4</span><span class="graph__label">5</span></a>
				</li>
				<li class="graph__list-item">
					<a class="graph__link" href="/movies?rating=6"><span class="graph__bar">10</span><span class="graph__label">6</span></a>
				</li>
				<li class="graph__list-item">
					<a class="graph__link" href="/movies?rating=7"><span class="graph__bar">4</span><span class="graph__label">7</span></a>
				</li>
				<li class="graph__list-item">
					<a class="graph__link" href="/movies?rating=8"><span class="graph__bar">3</span><span class="graph__label">8</span></a>
				</li>
				<li class="graph__list-item">
					<a class="graph__link" href="/movies?rating=9"><span class="graph__bar">2</span><span class="graph__label">9</span></a>
				</li>
				<li class="graph__list-item">
					<a class="graph__link" href="/movies?rating=10"><span class="graph__bar">1</span><span class="graph__label">10</span></a>
				</li>
			</ul>
		</section>

		<section class="widget widget--2col" id="current-tv" style="animation-delay: 600ms">
			<h1 class="widget__title">Current TV</h1>
			<ul class="widget__list widget__list--columns">
				<li class="widget__list-item"><cite>Lorem Ipsum</cite> <span class="year">(2000&ndash;2001)</span></li>
				<li class="widget__list-item"><cite>Lorem Ipsum</cite> <span class="year">(2000&ndash;2001)</span></li>
				<li class="widget__list-item"><cite>Lorem Ipsum</cite> <span class="year">(2000&ndash;2001)</span></li>
				<li class="widget__list-item"><cite>Lorem Ipsum</cite> <span class="year">(2000&ndash;2001)</span></li>
				<li class="widget__list-item"><cite>Lorem Ipsum</cite> <span class="year">(2000&ndash;2001)</span></li>
				<li class="widget__list-item"><cite>Lorem Ipsum</cite> <span class="year">(2000&ndash;2001)</span></li>
				<li class="widget__list-item"><cite>Lorem Ipsum</cite> <span class="year">(2000&ndash;2001)</span></li>
			</ul>
		</section>

		<section class="widget" id="favourite-tv" style="animation-delay: 700ms">
			<h1 class="widget__title">Favourite TV</h1>
			<ul class="widget__list">
				<li class="widget__list-item"><cite>Lorem Ipsum</cite> <span class="year">(2000&ndash;2001)</span></li>
				<li class="widget__list-item"><cite>Lorem Ipsum</cite> <span class="year">(2000&ndash;2001)</span></li>
				<li class="widget__list-item"><cite>Lorem Ipsum</cite> <span class="year">(2000&ndash;2001)</span></li>
				<li class="widget__list-item"><cite>Lorem Ipsum</cite> <span class="year">(2000&ndash;2001)</span></li>
				<li class="widget__list-item"><cite>Lorem Ipsum</cite> <span class="year">(2000&ndash;2001)</span></li>
			</ul>
		</section>

		<section class="widget" id="favourite-movies" style="animation-delay: 800ms">
			<h1 class="widget__title">Favourite Movies</h1>
			<ul class="widget__list">
				<li class="widget__list-item"><cite>Lorem Ipsum</cite> <span class="year">(2000)</span></li>
				<li class="widget__list-item"><cite>Lorem Ipsum</cite> <span class="year">(2000)</span></li>
				<li class="widget__list-item"><cite>Lorem Ipsum</cite> <span class="year">(2000)</span></li>
				<li class="widget__list-item"><cite>Lorem Ipsum</cite> <span class="year">(2000)</span></li>
				<li class="widget__list-item"><cite>Lorem Ipsum</cite> <span class="year">(2000)</span></li>
			</ul>
		</section>
	</div>
@stop
