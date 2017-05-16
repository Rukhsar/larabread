<ul class="breadcrumb">
    @foreach ($breads as $bread)
        <li>
            @if ($bread->url)
                <a href="{{ $bread->url }}">
                    {{ $bread->title }}
                </a>
            @else
                <span>
            {{ $bread->title }}
        </span>
            @endif
        </li>
    @endforeach
</ul>