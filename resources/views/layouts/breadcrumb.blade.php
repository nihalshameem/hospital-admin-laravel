<div class="page-titles">
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0)"><i class="fa fa-home"></i></a></li>
        <?php $segments = '/';
        $last_segment = false; ?>
        @foreach (Request::segments() as $segment)
            @if ($loop->last)
                @php $last_segment = true; @endphp
            @endif
            <?php $segments .= '/' . $segment; ?>
            <li class="breadcrumb-item {{ $last_segment == true ? 'active' : '' }}">
                <a href="{{ $segments }}">{{ $segment }}</a>
            </li>
        @endforeach
    </ol>
</div>
