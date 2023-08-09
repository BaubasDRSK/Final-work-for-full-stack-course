js element to load something in it frouth axios request and response
```html 
<div data-tag-load data-url={{route('tags-count')}} ></div>
```

button or link tu handle action
```html
<button type="button" class="btn btn-success"
    data-tag-action 
    data-tag-action-type="load"
    data-url="{{route('tags-edit', $tag)}}"
    data-tag-target="#edit-modal"
>   
```