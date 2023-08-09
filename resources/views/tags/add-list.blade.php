<div id="edit-tags">
    <div>
        @forelse ($tags as $tag)
            <div class="tag-list">#{{ $tag->name }}
                <span id='removeTag' data-tag-action data-tag-action-type="removeTag" data-tag-target="#removeTag"
                    data-url="{{ route('tags-removeTag', [$story->id, $tag->name]) }}">
                    <li class="close-btn fa fa-window-close"></li>    
                </span>
            </div>
        @empty
            <div>No tags yet.</div>
        @endforelse
    </div>
    {{-- input with options from DB avialable items --}}
    <input type="text" list="tags" id="tag" name="tag">
    <datalist id="tags">
        @foreach ($addTags as $addtag)
            <option value="{{ $addtag->name }}">
        @endforeach
    </datalist>
    
    <button type="button" class="btn btn-success" data-tag-action data-tag-action-type="addTag"
        data-tag-target="#edit-tags" data-url="{{ route('tags-addTag', $story->id) }}">Add</button>
</div>
