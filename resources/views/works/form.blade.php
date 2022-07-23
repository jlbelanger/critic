@csrf

<div class="form-row">
	<label class="form-label required" for="type">Type</label>
	<div class="form-input">
		<select id="type" name="type" required>
			<option value="Album"{{ old('type', !empty($row) ? $row->type : $defaultType) === 'Album' ? ' selected' : '' }}>Album</option>
			<option value="Book"{{ old('type', !empty($row) ? $row->type : $defaultType) === 'Book' ? ' selected' : '' }}>Book</option>
			<option value="Movie"{{ old('type', !empty($row) ? $row->type : $defaultType) === 'Movie' ? ' selected' : '' }}>Movie</option>
			<option value="Tv"{{ old('type', !empty($row) ? $row->type : $defaultType) === 'Tv' ? ' selected' : '' }}>TV</option>
		</select>
		@error('type')
			<span class="form-error">{{ $message }}</span>
		@enderror
	</div>
</div>

<div class="form-row">
	<label class="form-label required" for="title">Title</label>
	<div class="form-input">
		<input id="title" maxlength="255" name="title" required type="text" value="{{ old('title', !empty($row) ? $row->title : '') }}" />
		@error('title')
			<span class="form-error">{{ $message }}</span>
		@enderror
	</div>
</div>

<div class="form-row">
	<label class="form-label required" for="start_release_year">Year</label>
	<div class="form-input">
		<input
			aria-label="Start Year"
			id="start_release_year"
			maxlength="4"
			name="start_release_year"
			required
			size="4"
			type="text"
			value="{{ old('start_release_year', !empty($row) ? $row->start_release_year : '') }}"
		/>
		<input
			aria-label="End Year"
			data-show-for-type="Tv"
			id="end_release_year"
			maxlength="4"
			name="end_release_year"
			size="4"
			type="text"
			value="{{ old('end_release_year', !empty($row) ? $row->end_release_year : '') }}"
		/>
		@error('start_release_year')
			<span class="form-error">{{ $message }}</span>
		@enderror
		@error('end_release_year')
			<span class="form-error">{{ $message }}</span>
		@enderror
	</div>
</div>

<div class="form-row">
	<label class="form-label required" for="slug">Slug</label>
	<div class="form-input">
		<input
			data-slug="#title,#start_release_year,#end_release_year"
			id="slug"
			maxlength="255"
			name="slug"
			required
			type="text"
			value="{{ old('slug', !empty($row) ? $row->slug : '') }}"
		/>
		@error('slug')
			<span class="form-error">{{ $message }}</span>
		@enderror
	</div>
</div>

<div class="form-row" data-show-for-type="Album,Book">
	<label class="form-label" for="author">
		<span data-show-for-type="Book">Author</span>
		<span data-show-for-type="Album">Artist</span>
	</label>
	<div class="form-input">
		<input id="author" maxlength="255" name="author" size="40" type="text" value="{{ old('author', !empty($row) ? $row->author : '') }}" />
		@error('author')
			<span class="form-error">{{ $message }}</span>
		@enderror
	</div>
</div>

<div class="form-row">
	<label class="form-label" for="start_date">Date</label>
	<div class="form-input">
		<input
			id="start_date"
			maxlength="12"
			name="start_date"
			size="12"
			type="text"
			value="{{ old('start_date', !empty($row) ? $row->start_date : '') }}"
		/>
		<input
			aria-label="End Date"
			data-show-for-type="Book,Tv"
			id="end_date"
			name="end_date"
			size="12"
			type="text"
			value="{{ old('end_date', !empty($row) ? $row->end_date : '') }}"
		/>
		<small class="form-note">YYYY-MM-DD</small>
		@error('start_date')
			<span class="form-error">{{ $message }}</span>
		@enderror
		@error('end_date')
			<span class="form-error">{{ $message }}</span>
		@enderror
	</div>
</div>

<div class="form-row">
	<label class="form-label" for="rating">Rating</label>
	<div class="form-input">
		<input id="rating" maxlength="3" name="rating" size="3" type="text" value="{{ old('rating', !empty($row) ? $row->rating : '') }}" />
		out of 5
		@error('rating')
			<span class="form-error">{{ $message }}</span>
		@enderror
	</div>
</div>

<div class="form-row">
	<label class="form-label" for="content">Content</label>
	<div class="form-input">
		<textarea id="content" name="content">{{ old('content', !empty($row) ? $row->content : '') }}</textarea>
		<div id="word-count"></div>
		@error('content')
			<span class="form-error">{{ $message }}</span>
		@enderror
	</div>
</div>

<div class="form-row form-row--checkbox">
	<label class="form-label" for="is_favourite">Favourite?</label>
	<div class="form-input">
		<input
			id="is_favourite"
			name="is_favourite"
			type="checkbox"
			value="1"
			{{ old('is_favourite', !empty($row) ? $row->is_favourite : false) ? 'checked' : '' }}
		/>
		@error('is_favourite')
			<span class="form-error">{{ $message }}</span>
		@enderror
	</div>
</div>

<div class="form-row form-row--checkbox">
	<label class="form-label" for="is_private">Private?</label>
	<div class="form-input">
		<input
			id="is_private"
			name="is_private"
			type="checkbox"
			value="1"
			{{ old('is_private', !empty($row) ? $row->is_private : false) ? 'checked' : '' }}
		/>
		@error('is_private')
			<span class="form-error">{{ $message }}</span>
		@enderror
	</div>
</div>

<div class="form-row">
	<label class="form-label" for="published_at">Published</label>
	<div class="form-input">
		<input
			id="published_at"
			maxlength="19"
			name="published_at"
			size="19"
			type="text"
			value="{{ old('published_at', !empty($row) ? $row->published_at : '') }}"
		/>
		<small class="form-note">YYYY-MM-DD HH:MM:SS</small>
		@error('published_at')
			<span class="form-error">{{ $message }}</span>
		@enderror
	</div>
</div>

<div class="form-row">
	<label class="form-label" for="tags">Tags</label>
	<div class="form-input">
		@include(
			'shared.autocomplete',
			[
				'id' => 'tags',
				'items' => $tags,
			]
		)
		@error('tags')
			<span class="form-error">{{ $message }}</span>
		@enderror
	</div>
</div>
