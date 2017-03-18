<div class="list-group">
    @foreach($categories as $category)
        <a href="{{ route('catalog.category', $category->slug) }}" class="list-group-item depth-{{ $category->depth }}{{ request('category') == $category->id ? ' active' : '' }}">{{ $category->name }}</a>
    @endforeach
</div>