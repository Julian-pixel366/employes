<script setup>
import { ref } from 'vue';
import { usePage, router } from '@inertiajs/vue3';

const props = defineProps({
  employees: Object,
  filters: Object,
});

const email = ref(props.filters.email || '');

function search() {
  router.get('/empleados', { email: email.value }, { preserveState: true });
}
</script>

<template>
  <div class="p-6">
    <h1 class="text-xl font-bold mb-4">Lista de Empleados</h1>

    <input
      v-model="email"
      @keyup.enter="search"
      type="text"
      placeholder="Buscar por email"
      class="border rounded p-2 mb-4 w-full"
    />

    <table class="w-full border">
      <thead>
        <tr class="bg-gray-100 text-gray-700 border-b">
          <th class="p-2 text-left">Nombre</th>
          <th class="p-2 text-left">Email</th>
          <th class="p-2 text-left">Cargo</th>
          <th class="p-2 text-left">Salario</th>
        </tr>
      </thead>
      <tbody>
        <tr v-for="emp in employees.data" :key="emp.id" class="border-t">
          <td class="p-2">
            <a :href="`/empleados/${emp.id}`" class="text-blue-600 hover:underline">
              {{ emp.name }}
            </a>
          </td>
          <td class="p-2">{{ emp.email }}</td>
          <td class="p-2">{{ emp.position }}</td>
          <td class="p-2">{{ emp.salary }}</td>
        </tr>
      </tbody>
    </table>
  </div>
</template>
