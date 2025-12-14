<?php

namespace MrShaneBarron\Rating\Livewire;

use Livewire\Component;
use Livewire\Attributes\Modelable;

class Rating extends Component
{
    #[Modelable]
    public int $value = 0;
    
    public int $max = 5;
    public string $size = 'md';
    public string $color = 'yellow';
    public bool $readonly = false;
    public bool $allowHalf = false;
    public bool $showValue = false;

    public function mount(
        int $value = 0,
        int $max = 5,
        string $size = 'md',
        string $color = 'yellow',
        bool $readonly = false,
        bool $allowHalf = false,
        bool $showValue = false
    ): void {
        $this->value = $value;
        $this->max = $max;
        $this->size = $size;
        $this->color = $color;
        $this->readonly = $readonly;
        $this->allowHalf = $allowHalf;
        $this->showValue = $showValue;
    }

    public function setRating(int $rating): void
    {
        if (!$this->readonly) {
            $this->value = $rating;
            $this->dispatch('rating-changed', value: $rating);
        }
    }

    public function render()
    {
        return view('ld-rating::livewire.rating');
    }
}
