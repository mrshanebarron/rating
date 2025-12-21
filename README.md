# Rating

A star rating component for Laravel applications. Supports interactive ratings and read-only display. Works with Livewire and Vue 3.

## Installation

```bash
composer require mrshanebarron/rating
```

## Livewire Usage

### Basic Usage

```blade
<livewire:sb-rating wire:model="rating" />
```

### Display Only (Read-only)

```blade
<livewire:sb-rating :value="4" :readonly="true" />
```

### Different Max Stars

```blade
<livewire:sb-rating wire:model="rating" :max="10" />
```

### Different Sizes

```blade
<livewire:sb-rating wire:model="rating" size="sm" />
<livewire:sb-rating wire:model="rating" size="md" />
<livewire:sb-rating wire:model="rating" size="lg" />
```

### Different Colors

```blade
<livewire:sb-rating wire:model="rating" color="yellow" />
<livewire:sb-rating wire:model="rating" color="orange" />
<livewire:sb-rating wire:model="rating" color="red" />
<livewire:sb-rating wire:model="rating" color="blue" />
```

### Livewire Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `wire:model` | number | - | Bound rating value |
| `max` | number | `5` | Maximum stars |
| `readonly` | boolean | `false` | Disable interaction |
| `size` | string | `'md'` | Size: `sm`, `md`, `lg` |
| `color` | string | `'yellow'` | Color theme |

## Vue 3 Usage

### Setup

```javascript
import { SbRating } from './vendor/sb-rating';
app.component('SbRating', SbRating);
```

### Basic Usage

```vue
<template>
  <SbRating v-model="rating" />
  <p>You rated: {{ rating }} stars</p>
</template>

<script setup>
import { ref } from 'vue';
const rating = ref(0);
</script>
```

### Read-only Display

```vue
<template>
  <SbRating :model-value="4.5" readonly />
</template>
```

### Custom Max

```vue
<template>
  <!-- 10-star rating -->
  <SbRating v-model="rating" :max="10" />
</template>
```

### Sizes

```vue
<template>
  <SbRating v-model="rating" size="sm" />  <!-- 16px stars -->
  <SbRating v-model="rating" size="md" />  <!-- 24px stars -->
  <SbRating v-model="rating" size="lg" />  <!-- 32px stars -->
</template>
```

### Colors

```vue
<template>
  <SbRating v-model="rating" color="yellow" />
  <SbRating v-model="rating" color="orange" />
  <SbRating v-model="rating" color="red" />
  <SbRating v-model="rating" color="blue" />
</template>
```

### Product Review Example

```vue
<template>
  <div class="space-y-4">
    <div>
      <label class="block text-sm font-medium mb-1">Your Rating</label>
      <SbRating v-model="review.rating" size="lg" />
    </div>

    <div>
      <label class="block text-sm font-medium mb-1">Review</label>
      <textarea v-model="review.comment" class="w-full border rounded p-2" />
    </div>

    <button @click="submitReview">Submit Review</button>
  </div>
</template>

<script setup>
import { ref } from 'vue';

const review = ref({
  rating: 0,
  comment: ''
});

const submitReview = () => {
  // Submit review
};
</script>
```

### Average Rating Display

```vue
<template>
  <div class="flex items-center gap-2">
    <SbRating :model-value="Math.round(averageRating)" readonly />
    <span class="text-sm text-gray-600">
      {{ averageRating.toFixed(1) }} ({{ totalReviews }} reviews)
    </span>
  </div>
</template>
```

### Vue Props

| Prop | Type | Default | Description |
|------|------|---------|-------------|
| `modelValue` | Number | `0` | Current rating (v-model) |
| `max` | Number | `5` | Maximum number of stars |
| `readonly` | Boolean | `false` | Prevent interaction |
| `size` | String | `'md'` | Star size: `sm`, `md`, `lg` |
| `color` | String | `'yellow'` | Fill color: `yellow`, `orange`, `red`, `blue` |

### Events

| Event | Payload | Description |
|-------|---------|-------------|
| `update:modelValue` | `number` | Emitted when rating changes |

## Size Reference

| Size | Dimensions |
|------|------------|
| `sm` | 16x16px |
| `md` | 24x24px |
| `lg` | 32x32px |

## Color Options

| Color | Tailwind Class |
|-------|----------------|
| `yellow` | text-yellow-400 |
| `orange` | text-orange-400 |
| `red` | text-red-400 |
| `blue` | text-blue-400 |

## Features

- **Interactive**: Click to set rating
- **Read-only Mode**: Display ratings without interaction
- **Hover Effects**: Scale animation on hover
- **Customizable**: Colors, sizes, max stars

## Styling

Uses Tailwind CSS:
- Filled stars use selected color
- Empty stars are gray
- Hover scale animation
- Smooth transitions

## Requirements

- PHP 8.1+
- Laravel 10, 11, or 12
- Tailwind CSS 3.x

## License

MIT License
