<?php

namespace MrShaneBarron\Rating\Livewire;

use Livewire\Component;

class Rating extends Component
{
    public int|float $value = 0;
    public int $max = 5;
    public bool $readonly = false;
    public string $size = 'md';
    public string $color = 'yellow';
    public string $type = 'stars';

    public function mount(
        int|float $value = 0,
        int $max = 5,
        bool $readonly = false,
        string $size = 'md',
        string $color = 'yellow',
        string $type = 'stars'
    ): void {
        $this->value = $value;
        $this->max = $max;
        $this->readonly = $readonly;
        $this->size = $size;
        $this->color = $color;
        $this->type = $type;
    }

    public function setRating(int $rating): void
    {
        if (!$this->readonly) {
            $this->value = $rating;
            $this->dispatch('rating-changed', value: $this->value);
        }
    }

    public function vote(string $direction): void
    {
        if (!$this->readonly) {
            if ($direction === 'up') {
                $this->value++;
            } elseif ($direction === 'down') {
                $this->value--;
            }
            $this->dispatch('rating-changed', value: $this->value);
        }
    }

    public function render()
    {
        return view('sb-rating::livewire.rating');
    }
}
