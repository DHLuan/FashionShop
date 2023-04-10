<li>
    <a href="cart.html" class="sf-with-ul">{{ $category->name }}</a>
    @if ($category->children->count())
        <ul>
            @foreach ($category->children as $child)
                @include('frontend.child', ['category' => $child])
            @endforeach
        </ul>
    @endif
</li>
