<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="https://www.sitemaps.org/schemas/sitemap/0.9">
	<url><loc>{{ url('/') }}</loc></url>
	<url><loc>{{ url('/albums') }}</loc></url>
	<url><loc>{{ url('/books') }}</loc></url>
	<url><loc>{{ url('/movies') }}</loc></url>
	<url><loc>{{ url('/tv') }}</loc></url>
	@foreach ($tags as $tag)
		<url><loc>{{ url($tag->url()) }}</loc></url>
	@endforeach
</urlset>
