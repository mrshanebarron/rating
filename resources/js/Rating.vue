<template>
  <div class="flex items-center gap-1">
    <button v-for="i in max" :key="i" type="button" @click="!readonly && setRating(i)" :disabled="readonly" :class="[readonly ? 'cursor-default' : 'cursor-pointer hover:scale-110 transition-transform']">
      <svg :class="[sizeClass, i <= modelValue ? colorClass : 'text-gray-300']" fill="currentColor" viewBox="0 0 20 20">
        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
      </svg>
    </button>
  </div>
</template>

<script>
import { computed } from 'vue';

export default {
  name: 'SbRating',
  props: {
    modelValue: { type: Number, default: 0 },
    max: { type: Number, default: 5 },
    readonly: { type: Boolean, default: false },
    size: { type: String, default: 'md' },
    color: { type: String, default: 'yellow' }
  },
  emits: ['update:modelValue'],
  setup(props, { emit }) {
    const sizes = { sm: 'w-4 h-4', md: 'w-6 h-6', lg: 'w-8 h-8' };
    const colors = { yellow: 'text-yellow-400', orange: 'text-orange-400', red: 'text-red-400', blue: 'text-blue-400' };
    const sizeClass = computed(() => sizes[props.size] || sizes.md);
    const colorClass = computed(() => colors[props.color] || colors.yellow);
    const setRating = (value) => emit('update:modelValue', value);
    return { sizeClass, colorClass, setRating };
  }
};
</script>
