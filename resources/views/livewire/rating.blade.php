@php
$sizes = ['sm' => '16px', 'md' => '24px', 'lg' => '32px'];
$colors = ['yellow' => '#facc15', 'orange' => '#fb923c', 'red' => '#f87171', 'blue' => '#60a5fa'];
$sizeVal = $sizes[$this->size] ?? $sizes['md'];
$colorVal = $colors[$this->color] ?? $colors['yellow'];
@endphp

<div style="display: flex; align-items: center; gap: 4px;">
    @for($i = 1; $i <= $this->max; $i++)
        <button
            type="button"
            @if(!$this->readonly) wire:click="setRating({{ $i }})" @endif
            style="padding: 0; border: none; background: transparent; {{ $this->readonly ? 'cursor: default;' : 'cursor: pointer;' }} transition: transform 0.15s;"
            @if(!$this->readonly) onmouseover="this.style.transform='scale(1.1)'" onmouseout="this.style.transform='scale(1)'" @endif
            @if($this->readonly) disabled @endif
        >
            <svg style="width: {{ $sizeVal }}; height: {{ $sizeVal }}; color: {{ $i <= $this->value ? $colorVal : '#d1d5db' }};" fill="currentColor" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
            </svg>
        </button>
    @endfor
</div>
