@extends('layout')

@section('content')
	<div id="widgets">
		<section class="widget widget--2col widget--2row" id="recent-movies" style="animation-delay: 100ms">
			<h1 class="widget__title">Recent Movies</h1>
			@if (!$recentMovies->isEmpty())
				<ul class="widget__list">
					@foreach ($recentMovies as $movie)
						<li class="widget__list-item">
							<cite>{{ $movie->title }}</cite> <span class="year">({{ $movie->start_release_year }})</span>
							<div class="date">{{ date('F j, Y', strtotime($movie->start_date)) }}</div>
							<div class="star star--{{ $movie->rating * 10 }}">{{ $movie->rating }} out of 5</div>
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
					<a class="widget__link" href="/movies"><span class="num">{{ !empty($stats['Movie']) ? number_format($stats['Movie']) : 0 }}</span> Movies</a>
				</li>
				<li class="widget__list-item">
					<a class="widget__link" href="/tv"><span class="num">{{ !empty($stats['Tv']) ? number_format($stats['Tv']) : 0 }}</span> TV</a>
				</li>
				<li class="widget__list-item">
					<a class="widget__link" href="/books"><span class="num">{{ !empty($stats['Book']) ? number_format($stats['Book']) : 0 }}</span> Books</a>
				</li>
				<li class="widget__list-item">
					<a class="widget__link" href="/albums"><span class="num">{{ !empty($stats['Album']) ? number_format($stats['Album']) : 0 }}</span> Albums</a>
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
					@foreach ($moviesByDecade as $row)
						<li class="graph__list-item">
							<a class="graph__link" href="/movies?decade={{ $row->decade }}0s">
								<span class="graph__bar">{{ $row->num }}</span>
								<span class="graph__label">&rsquo;{{ substr($row->decade, 2) }}0s</span>
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
					@foreach ($moviesByRating as $row)
						<li class="graph__list-item">
							<a class="graph__link" href="/movies?rating={{ $row->rating }}">
								<span class="graph__bar">{{ $row->num }}</span>
								<span class="graph__label">{{ $row->rating }}</span>
							</a>
						</li>
					@endforeach
				</ul>
			@else
				<p>No results.</p>
			@endif
		</section>

		<section class="widget widget--2col" id="current-tv" style="animation-delay: 600ms">
			<h1 class="widget__title">Current TV</h1>
			@if (!$currentTv->isEmpty())
				<ul class="widget__list widget__list--columns">
					@foreach ($currentTv as $tv)
						<li class="widget__list-item">
							<cite>{{ $tv->title }}</cite> <span class="year">({{ $tv->start_release_year }}&ndash;{{ $tv->end_release_year }})</span>
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
							<cite>{{ $tv->title }}</cite> <span class="year">({{ $tv->start_release_year }}&ndash;{{ $tv->end_release_year }})</span>
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
							<cite>{{ $movie->title }}</cite> <span class="year">({{ $movie->start_release_year }})</span>
						</li>
					@endforeach
				</ul>
			@else
				<p>No results.</p>
			@endif
		</section>
	</div>
@stop
