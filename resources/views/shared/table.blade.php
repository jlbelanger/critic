@if (!$works->isEmpty())
	<button
		aria-controls="thead"
		aria-expanded="false"
		class="button--secondary toggle-button"
		data-toggleable="#thead"
		data-toggleable-hide="Hide Sort &amp; Filter Options"
		data-toggleable-show="Show Sort &amp; Filter Options"
		type="button"
	>
		Show Sort &amp; Filter Options
	</button>

	<table
		data-filterable-list
		data-sortable-list
		data-sortable-default-key="{{ !empty($defaultSortKey) ? $defaultSortKey : 'title' }}"
		data-sortable-default-dir="{{ !empty($defaultSortDir) ? $defaultSortDir : 'asc' }}"
	>
		<thead class="toggle-hide" id="thead">
			<tr>
				<th class="column--title" scope="col">
					<button aria-label="Sort by Title" class="button--link sortable-button" data-sortable-key="title" type="button">Title</button>
				</th>
				<th class="column--{{ !empty($longYear) ? 'long-' : '' }}year" scope="col">
					<button aria-label="Sort by Year" class="button--link sortable-button" data-sortable-key="year" type="button">Year</button>
				</th>
				@if (!empty($showAuthor))
					<th class="column--author" scope="col">
						<button
							aria-label="Sort by {{ $authorTitle ? $authorTitle : 'Author' }}"
							class="button--link sortable-button"
							data-sortable-key="author"
							type="button"
						>
							{{ $authorTitle ? $authorTitle : 'Author' }}
						</button>
					</th>
				@endif
				<th class="column--date" scope="col">
					<button aria-label="Sort by Date" class="button--link sortable-button" data-sortable-key="date" type="button">Date</button>
				</th>
				@if (!empty($showEndDate))
					<th class="column--date" scope="col">
						<button aria-label="Sort by End Date" class="button--link sortable-button" data-sortable-key="end_date" type="button">
							End Date
						</button>
					</th>
				@endif
				<th class="column--rating" scope="col">
					<button aria-label="Sort by Rating" class="button--link sortable-button" data-sortable-key="rating" type="button">Rating</button>
				</th>
				<th class="column--tags" scope="col">
					<button aria-label="Sort by Tags" class="button--link sortable-button" data-sortable-key="tags" type="button">Tags</button>
				</th>
			</tr>
			<tr id="filters">
				<td>
					<label class="filter-label" for="title">Filter Title</label>
					<input aria-label="Filter Title" data-filterable-input="title" id="title" type="text" value="{{ $defaults['title'] }}" />
				</td>
				<td>
					<label class="filter-label" for="year">Filter Year</label>
					<input
						aria-label="Filter Year"
						data-filterable-input="year"
						id="year"
						maxlength="{{ !empty($longYear) ? '9' : '4' }}"
						size="4"
						type="text"
						value="{{ $defaults['year'] }}"
					/>
				</td>
				@if (!empty($showAuthor))
					<td>
						<label class="filter-label" for="author">Filter {{ $authorTitle ? $authorTitle : 'Author' }}</label>
						<input
							aria-label="Filter {{ $authorTitle ? $authorTitle : 'Author' }}"
							data-filterable-input="author"
							id="author"
							type="text"
							value="{{ $defaults['author'] }}"
						/>
					</td>
				@endif
				<td>
					<label class="filter-label" for="date">Filter Date</label>
					<input aria-label="Filter Date" data-filterable-input="date" id="date" type="text" value="{{ $defaults['date'] }}" />
				</td>
				@if (!empty($showEndDate))
					<td>
						<label class="filter-label" for="end_date">Filter End Date</label>
						<input
							aria-label="Filter End Date"
							data-filterable-input="end_date"
							id="end_date"
							type="text"
							value="{{ $defaults['end_date'] }}"
						/>
					</td>
				@endif
				<td>
					<label class="filter-label" for="rating">Filter Rating</label>
					<select aria-label="Filter Rating" data-filterable-input="rating" data-filterable-exact="true" id="rating">
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
				<td>
					<label class="filter-label" for="tags">Filter Tags</label>
					<input aria-label="Filter Tags" data-filterable-input="tags" id="tags" type="text" value="{{ $defaults['tags'] }}" />
				</td>
			</tr>
		</thead>
		<tbody data-sortable-container>
			@foreach ($works as $work)
				<tr data-filterable-item data-sortable-item>
					<td data-key="title" data-value="{{ $work->slug }}">
						@if (Auth::user())
							<a href="{{ $work->editUrl() }}"><cite>{{ $work->title }}</cite></a>{{ $work->is_private ? ' *' : '' }}
						@else
							<cite>{{ $work->title }}</cite>
						@endif
					</td>
					<td data-key="year">{{ $work->year() }}</td>
					@if (!empty($showAuthor))
						<td data-key="author">{{ $work->author }}</td>
					@endif
					<td data-key="date" data-sortable-value="{{ $work->start_date }}">{{ $work->date() }}</td>
					@if (!empty($showEndDate))
						<td data-key="end_date" data-sortable-value="{{ $work->end_date }}">{{ $work->endDate() }}</td>
					@endif
					<td data-key="rating">{{ $work->rating }}</td>
					@if (!empty($work->tags->count()))
						<td data-key="tags">
							<ul class="tag-list">
								@foreach ($work->tags as $tag)
									<li class="tag-list__item">
										<a href="{{ $tag->url() }}">{{ $tag->title() }}</a>
									</li>
								@endforeach
							</ul>
						</td>
					@else
						<td data-key="tags"></td>
					@endif
				</tr>
			@endforeach
		</tbody>
	</table>
@else
	<p>No results.</p>
@endif
