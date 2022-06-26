@csrf

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
	<label class="form-label" for="short_title">Short Title</label>
	<div class="form-input">
		<input
			id="short_title"
			maxlength="255"
			name="short_title"
			type="text"
			value="{{ old('short_title', !empty($row) ? $row->short_title : '') }}"
		/>
		@error('short_title')
			<span class="form-error">{{ $message }}</span>
		@enderror
	</div>
</div>

<div class="form-row">
	<label class="form-label required" for="slug">Slug</label>
	<div class="form-input">
		<input
			data-slug="#title"
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

<div class="form-row form-row--checkbox">
	<label class="form-label" for="hide_from_cloud">Hide from Cloud?</label>
	<div class="form-input">
		<input
			id="hide_from_cloud"
			name="hide_from_cloud"
			type="checkbox"
			value="1"
			{{ old('hide_from_cloud', !empty($row) ? $row->hide_from_cloud : false) ? 'checked' : '' }}
		/>
		@error('hide_from_cloud')
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
