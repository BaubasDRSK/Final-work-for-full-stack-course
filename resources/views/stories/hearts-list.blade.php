<i
data-heart-action
data-heart-action-type="addHeart"
data-url="{{ route('stories-heartsAdd', $story) }}"
class="fa fa-heart" aria-hidden="true">
</i>
<span href="#">{{ $heartsCount==0 ? "#" : $heartsCount }}</span>


{{-- <span id='removeTag' data-tag-action data-tag-action-type="removeTag" data-tag-target="#removeTag"
data-url="{{ route('tags-removeTag', [$story->id, $tag->name]) }}"> --}}
