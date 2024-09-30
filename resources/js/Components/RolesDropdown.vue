<script setup>
import { ref, onMounted } from 'vue';
import axios from 'axios';

const model = defineModel({
    type: String,
    required: true,
});


const roles = ref([]);

const fetchRoles = async () => {
    try {
        const response = await axios.get(route('roles.index'));
        roles.value = response.data;
    } catch (error) {
        console.error('Failed to fetch roles:', error);
    }
};

onMounted(() => {
    fetchRoles();
});
</script>

<template>
    <div>
        <select v-model="model"
                class="border-gray-300 dark:border-gray-700 dark:bg-gray-900 dark:text-gray-300 focus:border-indigo-500 dark:focus:border-indigo-600 focus:ring-indigo-500 dark:focus:ring-indigo-600 rounded-md shadow-sm">
            <option v-for="role in roles" :key="role.id" :value="role.id">
                {{ role.name }}
            </option>
        </select>
    </div>
</template>
