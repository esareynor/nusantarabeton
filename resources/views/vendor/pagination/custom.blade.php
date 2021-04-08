@if ($paginator->hasPages())
<ul class="pagination col-auto m-auto">

    @foreach ($elements as $element)

    @if (is_string($element))
    <li class="disabled"><span>{{ $element }}</span></li>
    @endif

    @if (is_array($element))
    @foreach ($element as $page => $url)
    @if ($page == $paginator->currentPage())
    <li class="active my-active btn btn-primary m-1"><span>{{ $page }}</span></li>
    @else
    <li><a class="btn btn-light m-1" href="{{ $url }}">{{ $page }}</a></li>
    @endif
    @endforeach
    @endif
    @endforeach

</ul>
@endif
