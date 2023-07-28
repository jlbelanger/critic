<div class="autocomplete" data-autocomplete="{{ url('/tags.json?q=') }}" data-autocomplete-name="{{ $id }}">
	<div class="autocomplete__input-wrapper">
		<input autocomplete="off" class="autocomplete__input" id="{{ $id }}" placeholder="Search" type="text" />

		<button class="autocomplete__clear button--secondary" type="button">Clear</button>

		<span class="autocomplete__loading">Loading...</span>

		<div class="autocomplete__results" style="display:none" tabindex="-1">
			<ul class="autocomplete__results-list"></ul>
			<p class="autocomplete__results-none">No results.</p>
		</div>
	</div>

	<ul class="autocomplete__selected-list"></ul>

	<input data-autocomplete-value type="hidden" value="{{ json_encode($items) }}" />
</div>
