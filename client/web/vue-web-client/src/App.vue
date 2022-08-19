<script setup lang="ts">
import { onMounted } from 'vue';
import { useRouter, RouterLink, RouterView } from "vue-router";
import { useCheckLogin } from './composable/useCheckLogin';
import Swal from 'sweetalert2';

const router = useRouter();

onMounted(async () => {
  const isLoggedIn = await useCheckLogin();
  if (isLoggedIn) {
    await router.push({
      name: 'data'
    });
  } else {
    await router.push({
      name: 'login'
    });
  }
});
</script>

<template>
  <router-view
    v-slot="slotProps"
  >
    <transition
      name="route"
      mode="out-in"
    >
      <component
        :is="slotProps.Component"
      />
    </transition>
  </router-view>
</template>
