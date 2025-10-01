<script setup>
const props = defineProps({
  employee: Object,
});
</script>

<template>
  <div class="p-6">
    <h1 class="text-xl font-bold mb-4">Detalle de {{ employee.name }}</h1>

    <ul class="space-y-2">
      <li><b>Email:</b> {{ employee.email }}</li>
      <li><b>Teléfono:</b> {{ employee.phone }}</li>
      <li><b>Dirección:</b> {{ employee.address }}</li>
      <li><b>Cargo:</b> {{ employee.position }}</li>
      <li><b>Salario:</b> {{ employee.salary }}</li>
      <li><b>Habilidades:</b> {{ employee.skills?.join(', ') }}</li>
    </ul>
  </div>
</template>
