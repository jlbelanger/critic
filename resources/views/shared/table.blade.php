@if (!$works->isEmpty())
	<table data-filterable-list data-sortable-list data-sortable-default-key="title">
		<thead>
			<tr>
				<th class="column--title"><button class="button--link sortable-button" data-sortable-key="title" type="button">Name</button></th>
				<th class="column--year"><button class="button--link sortable-button" data-sortable-key="year" type="button">Year</button></th>
				@if (!empty($showAuthor))
					<th class="column--author">
						<button class="button--link sortable-button" data-sortable-key="author" type="button">{{ $authorTitle ? $authorTitle : 'Author' }}</button>
					</th>
				@endif
				<th class="column--date"><button class="button--link sortable-button" data-sortable-key="date" type="button">Date</button></th>
				<th class="column--rating"><button class="button--link sortable-button" data-sortable-key="rating" type="button">Rating</button></th>
				<th class="column--tags"><button class="button--link sortable-button" data-sortable-key="tags" type="button">Tags</button></th>
			</tr>
			<tr>
				<td class="column--title">
					<input data-filterable-input="title" type="text" value="{{ $defaults['title'] }}">
				</td>
				<td>
					<input data-filterable-input="year" maxlength="4" size="4" type="text" value="{{ $defaults['year'] }}">
				</td>
				@if (!empty($showAuthor))
					<td>
						<input data-filterable-input="author" type="text" value="{{ $defaults['author'] }}">
					</td>
				@endif
				<td>
					<input data-filterable-input="date" type="text" value="{{ $defaults['date'] }}">
				</td>
				<td>
					<select data-filterable-input="rating" data-filterable-exact="true">
						<option></option>
						<option{{ $defaults['rating'] === '1' ? ' selected' : '' }}>1</option>
						<option{{ $defaults['rating'] === '1.5' ? ' selected' : '' }}>1.5</option>
						<option{{ $defaults['rating'] === '2' ? ' selected' : '' }}>2</option>
						<option{{ $defaults['rating'] === '2.5' ? ' selected' : '' }}>2.5</option>
						<option{{ $defaults['rating'] === '3' ? ' selected' : '' }}>3</option>
						<option{{ $defaults['rating'] === '3.5' ? ' selected' : '' }}>3.5</option>
						<option{{ $defaults['rating'] === '4' ? ' selected' : '' }}>4</option>
						<option{{ $defaults['rating'] === '4.5' ? ' selected' : '' }}>4.5</option>
						<option{{ $defaults['rating'] === '5' ? ' selected' : '' }}>5</option>
					</select>
				</td>
				<td class="column--tags">
					<input data-filterable-input="tags" type="text" value="{{ $defaults['tags'] }}">
				</td>
			</tr>
		</thead>
		<tbody data-sortable-container>
			@foreach ($works as $work)
				<tr data-filterable-item data-sortable-item>
					<td class="column--title" data-key="title" data-value="{{ $work->slug }}">
						@if (Auth::user())
							<a href="{{ $work->editUrl() }}"><cite>{{ $work->title }}</cite></a>{{ $work->is_private ? ' *' : '' }}
						@else
							<cite>{{ $work->title }}</cite>
						@endif
					</td>
					<td data-key="year">{{ $work->year() }}</td>
					@if (!empty($showAuthor))
						<td>{{ $work->author }}</td>
					@endif
					<td data-key="date" data-sortable-value="{{ $work->start_date }}">{{ $work->date() }}</td>
					<td data-key="rating">{{ $work->rating }}</td>
					<td class="column--tags" data-key="tags">
						<ul class="tag-list">
							@foreach ($work->tags as $tag)
								<li class="tag-list__item">
									<a href="{{ $tag->url() }}">{{ $tag->short_title ? $tag->short_title : $tag->title }}</a>
								</li>
							@endforeach
						</ul>
					</td>
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	<p>No results.</p>
@endif
