
@if (empty($story->loveit))
    <div data-heart-load data-url={{ route('stories-heartsCount', $story) }} class="heart empty">
        <i data-heart-action data-heart-action-type="addHeart" data-url="{{ route('stories-heartsAdd', $story) }}"
            class="fa fa-heart" aria-hidden="true">
        </i>
        <span href="#">{{ $heartsCount == 0 ? '#' : $heartsCount }}</span>
    </div>
@else
    <div data-heart-load data-url={{ route('stories-heartsCount', $story) }} class="heart full">
        <i data-heart-action data-heart-action-type="addHeart" data-url="{{ route('stories-heartsAdd', $story) }}"
            class="fa fa-heart" aria-hidden="true">
        </i>
        <span href="#">{{ $heartsCount == 0 ? '#' : $heartsCount }}</span>
    </div>
@endif
