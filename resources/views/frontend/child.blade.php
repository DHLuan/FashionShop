<li>
    <a href="{{ url('view-category/'.$category->slug) }}" class="sf-with-ul">{{ $category->name }}</a>
    @if ($category->children->count())
        <ul>
            @foreach ($category->children as $child)
                @include('frontend.child', ['category' => $child])
            @endforeach
        </ul>
    @endif
</li>
