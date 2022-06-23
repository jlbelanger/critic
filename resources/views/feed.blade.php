<?xml version="1.0" encoding="UTF-8"?>
<rss version="2.0" xmlns:atom="http://www.w3.org/2005/Atom">
	<channel>
		<atom:link href="{{ url('/feed.xml') }}" rel="self" type="application/rss+xml" />
		<title>Critic</title>
		<description>Movie/TV/music reviews.</description>
		<link>{{ url('/') }}</link>
		@foreach ($works as $work)
			<item>
				<title>{{ $work->title }}</title>
				<pubDate>{{ date('r', strtotime($work->published_at)) }}</pubDate>
				<guid isPermaLink="false">{{ url($work->url()) }}</guid>
				<description><![CDATA[<p>{{ $work->rating }} out of 5</p>]]></description>
			</item>
		@endforeach
	</channel>
</rss>
