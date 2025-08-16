<div class="text-sm text-gray-500">
    @foreach ($items as $index => $item)
        @if (!empty($item['url']))
            <a href="{{ $item['url'] }}" class="text-blue-500 hover:underline">
                {{ $item['label'] }}
            </a>
        @else
            <span>{{ $item['label'] }}</span>
        @endif

        @if (!$loop->last)
            <span class="mx-2">/</span>
        @endif
    @endforeach
</div>