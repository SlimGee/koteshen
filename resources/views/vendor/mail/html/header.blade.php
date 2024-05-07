@props(['url'])
<tr>
    <td class="header">
        <a href="{{ $url }}" style="display: inline-block;">
            @if (trim($slot) === 'Laravel')
                <img src="{{ asset('images/logo/koteshen_cropped.png') }}" class="logo" alt="Koteshen Logo">
            @else
                {{ $slot }}
            @endif
        </a>
    </td>
</tr>
