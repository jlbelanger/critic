@extends('layout')

@section('content')
	<div id="widgets">
		<section class="widget widget--m2row widget--l2col widget--l2row" id="recent-movies" style="animation-delay: 100ms">
			<h1 class="widget__title">Recent Movies</h1>
			@if (!$recentMovies->isEmpty())
				<ul class="widget__list">
					@foreach ($recentMovies as $movie)
						<li class="widget__list-item">
							@if (Auth::user())
								<a href="{{ $movie->editUrl() }}"><cite>{{ $movie->title }}</cite></a>{{ $movie->is_private ? ' *' : '' }}
							@else
								<cite>{{ $movie->title }}</cite>
							@endif
							<span class="year">({{ $movie->year() }})</span>
							<div class="date"><span class="sr">Date: </span>{{ date('F j, Y', strtotime($movie->start_date)) }}</div>
							<div class="star star--{{ $movie->rating * 10 }}"><span class="sr">Rating: </span>{{ $movie->rating }} out of 5</div>
						</li>
					@endforeach
				</ul>
			@else
				<p>No results.</p>
			@endif
		</section>

		<section class="widget" id="stats" style="animation-delay: 200ms">
			<h1 class="widget__title sr">Stats</h1>
			<ul class="widget__list">
				<li class="widget__list-item">
					<a class="widget__link" href="/movies?sort=-date">
						<span class="num">{{ !empty($stats['Movie']) ? number_format($stats['Movie']) : 0 }}</span> Movies
					</a>
				</li>
				<li class="widget__list-item">
					<a class="widget__link" href="/tv?sort=-date">
						<span class="num">{{ !empty($stats['Tv']) ? number_format($stats['Tv']) : 0 }}</span> TV
					</a>
				</li>
				<li class="widget__list-item">
					<a class="widget__link" href="/books?sort=-date">
						<span class="num">{{ !empty($stats['Book']) ? number_format($stats['Book']) : 0 }}</span> Books
					</a>
				</li>
				<li class="widget__list-item">
					<a class="widget__link" href="/albums?sort=-date">
						<span class="num">{{ !empty($stats['Album']) ? number_format($stats['Album']) : 0 }}</span> Albums
					</a>
				</li>
			</ul>
		</section>

		<section class="widget widget--cloud" id="tags" style="animation-delay: 300ms">
			<h1 class="widget__title sr">Tags</h1>
			@if (!$tags->isEmpty())
				<ul class="cloud">
					@foreach ($tags as $tag)
						@if (!empty($tagCounts[$tag->slug]))
							<li class="cloud__list-item">
								<a class="cloud__link" href="{{ $tag->url() }}">
									<span class="cloud__text">{{ $tag->short_title ? $tag->short_title : $tag->title }}</span>
									<span class="cloud__num">{{ $tagCounts[$tag->slug] }}</span>
								</a>
							</li>
						@endif
					@endforeach
				</ul>
			@else
				<p>No results.</p>
			@endif
		</section>

		<section class="widget widget--graph" id="movies-by-decade" style="animation-delay: 400ms">
			<h1 class="widget__title">Movies by Decade</h1>
			@if (!$moviesByDecade->isEmpty())
				<ul class="graph">
					@foreach ($moviesByDecade as $movie)
						<li class="graph__list-item">
							<a
								aria-label="{{ $movie->decade }}0s: {{ $movie->num }} movie{{ $movie->num !== 1 ? 's' : '' }}"
								class="graph__link"
								href="/movies?year={{ $movie->decade }}"
							>
								<span class="graph__bar">{{ $movie->num }}</span>
								<span class="graph__label">&rsquo;{{ substr($movie->decade, 2) }}0s</span>
							</a>
						</li>
					@endforeach
				</ul>
			@else
				<p>No results.</p>
			@endif
		</section>

		<section class="widget widget--graph" id="movies-by-decade" style="animation-delay: 500ms">
			<h1 class="widget__title">Movies by Rating</h1>
			@if (!$moviesByRating->isEmpty())
				<ul class="graph">
					@foreach ($moviesByRating as $movie)
						<li class="graph__list-item">
							<a
								aria-label="{{ $movie->rating }} out of 5: {{ $movie->num }} movie{{ $movie->num !== 1 ? 's' : '' }}"
								class="graph__link"
								href="/movies?rating={{ $movie->rating }}"
							>
								<span class="graph__bar">{{ $movie->num }}</span>
								<span class="graph__label">{{ $movie->rating }}</span>
							</a>
						</li>
					@endforeach
				</ul>
			@else
				<p>No results.</p>
			@endif
		</section>

		<section class="widget widget--m2col widget--l2col" id="current-tv" style="animation-delay: 600ms">
			<h1 class="widget__title">Current TV</h1>
			@if (!$currentTv->isEmpty())
				<ul class="widget__list widget__list--columns">
					@foreach ($currentTv as $tv)
						<li class="widget__list-item">
							@if (Auth::user())
								<a href="{{ $tv->editUrl() }}"><cite>{{ $tv->title }}</cite></a>{{ $tv->is_private ? ' *' : '' }}
							@else
								<cite>{{ $tv->title }}</cite>
							@endif
							<span class="year">({{ $tv->year() }})</span>
						</li>
					@endforeach
				</ul>
			@else
				<p>No results.</p>
			@endif
		</section>

		<section class="widget" id="favourite-tv" style="animation-delay: 700ms">
			<h1 class="widget__title">Favourite TV</h1>
			@if (!$favouriteTv->isEmpty())
				<ul class="widget__list">
					@foreach ($favouriteTv as $tv)
						<li class="widget__list-item">
							@if (Auth::user())
								<a href="{{ $tv->editUrl() }}"><cite>{{ $tv->title }}</cite></a>{{ $tv->is_private ? ' *' : '' }}
							@else
								<cite>{{ $tv->title }}</cite>
							@endif
							<span class="year">({{ $tv->year() }})</span>
						</li>
					@endforeach
				</ul>
			@else
				<p>No results.</p>
			@endif
		</section>

		<section class="widget" id="favourite-movies" style="animation-delay: 800ms">
			<h1 class="widget__title">Favourite Movies</h1>
			@if (!$favouriteMovies->isEmpty())
				<ul class="widget__list">
					@foreach ($favouriteMovies as $movie)
						<li class="widget__list-item">
							@if (Auth::user())
								<a href="{{ $movie->editUrl() }}"><cite>{{ $movie->title }}</cite></a>{{ $movie->is_private ? ' *' : '' }}
							@else
								<cite>{{ $movie->title }}</cite>
							@endif
							<span class="year">({{ $movie->year() }})</span>
						</li>
					@endforeach
				</ul>
			@else
				<p>No results.</p>
			@endif
		</section>
	</div>
@stop
