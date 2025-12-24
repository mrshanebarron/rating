@php
$sizes = ['sm' => '16px', 'md' => '24px', 'lg' => '32px'];
$colors = ['yellow' => '#facc15', 'orange' => '#fb923c', 'red' => '#f87171', 'blue' => '#60a5fa', 'green' => '#22c55e'];
$sizeVal = $sizes[$this->size] ?? $sizes['md'];
$colorVal = $colors[$this->color] ?? $colors['yellow'];
@endphp

<div>
    @if($this->type === 'digg')
        {{-- Digg-style up/down voting --}}
        <div style="display: inline-flex; flex-direction: column; align-items: center; background: linear-gradient(180deg, #4a5568 0%, #2d3748 100%); border-radius: 6px; padding: 4px; box-shadow: 0 2px 4px rgba(0,0,0,0.3);">
            <button
                type="button"
                @if(!$this->readonly) wire:click="vote('up')" @endif
                style="display: flex; align-items: center; justify-content: center; width: 40px; height: 28px; border: none; background: linear-gradient(180deg, #5a6fd6 0%, #4558b8 100%); border-radius: 4px 4px 0 0; {{ $this->readonly ? 'cursor: default; opacity: 0.6;' : 'cursor: pointer;' }} transition: all 0.15s;"
                @if(!$this->readonly)
                    onmouseover="this.style.background='linear-gradient(180deg, #6b7de8 0%, #5669ca 100%)'"
                    onmouseout="this.style.background='linear-gradient(180deg, #5a6fd6 0%, #4558b8 100%)'"
                @endif
                @if($this->readonly) disabled @endif
            >
                <svg style="width: 16px; height: 16px; color: white;" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 4l-8 8h5v8h6v-8h5z"/>
                </svg>
            </button>
            <div style="padding: 6px 12px; font-size: 16px; font-weight: bold; color: {{ $this->value >= 0 ? '#48bb78' : '#fc8181' }}; text-shadow: 0 1px 2px rgba(0,0,0,0.5); min-width: 40px; text-align: center;">
                {{ $this->value }}
            </div>
            <button
                type="button"
                @if(!$this->readonly) wire:click="vote('down')" @endif
                style="display: flex; align-items: center; justify-content: center; width: 40px; height: 28px; border: none; background: linear-gradient(180deg, #718096 0%, #4a5568 100%); border-radius: 0 0 4px 4px; {{ $this->readonly ? 'cursor: default; opacity: 0.6;' : 'cursor: pointer;' }} transition: all 0.15s;"
                @if(!$this->readonly)
                    onmouseover="this.style.background='linear-gradient(180deg, #828fa8 0%, #5b6b7a 100%)'"
                    onmouseout="this.style.background='linear-gradient(180deg, #718096 0%, #4a5568 100%)'"
                @endif
                @if($this->readonly) disabled @endif
            >
                <svg style="width: 16px; height: 16px; color: white;" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 20l8-8h-5V4H9v8H4z"/>
                </svg>
            </button>
        </div>
    @else
        {{-- Star rating (default) --}}
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
    @endif
</div>
