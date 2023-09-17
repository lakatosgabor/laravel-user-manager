<template>
  <span @click.prevent="toggleDarkMode()">
    <span v-if="isDark" class="pi pi-sun"></span>
    <span v-else class="pi pi-moon"></span>
  </span>
</template>

<script setup lang="ts">
import { useDark, useToggle } from '@vueuse/core'

// is dark mode enabled?
const isDark = useDark()

// toggle dark mode
const toggleDarkMode = useToggle(isDark)
</script>
