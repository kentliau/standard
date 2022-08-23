<script setup lang="ts">
import { ref, onMounted } from 'vue';
import userApi from '@/api/user.ts';

import Swal from 'sweetalert2';
import { useRouter } from "vue-router";

const router = useRouter();

const timestamp = ref('');

onMounted(async () => {
  const data = await userApi.getData();

  timestamp.value = data.timestamp;
});

const logoutButtonPressed = async () => {
  const { data } = await axios.post('logout');

  window.localStorage.removeItem('token');

  Swal.fire({
    text: 'Logged Out',
    confirmButtonColor: '#ea4c88'
  });

  await router.push({
    name: 'login'
  });
};

</script>

<template>
  <div class="grid h-screen place-items-center font-mono text-white">
    <div class="text-center">
      <div class="text-3xl">
        {{ timestamp }}
      </div>
      <div class="mt-5">
        <a
          href="#"
          @click="logoutButtonPressed"
        >Logout</a>
      </div>
    </div>
  </div>
</template>
