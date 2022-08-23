<script setup lang="ts">
import { ref } from 'vue';
import axios from '@/axios';
import { useRouter } from "vue-router";
import { useCheckLogin } from '@/composable/useCheckLogin';
import Swal from 'sweetalert2';

const router = useRouter();

const nickname             = ref('');
const email                = ref('');
const password             = ref('');
const passwordConfirmation = ref('');

const registerButtonPressed = async () => {
  const { data } = await axios.post('register', {
    name: nickname.value,
    email: email.value,
    password: password.value,
    password_confirmation: passwordConfirmation.value
  }).then(async (res) => {
    // console.log({res});
    Swal.fire({
      text: 'Successfully register an account.',
      confirmButtonColor: '#ea4c88'
    });
    await router.push({
      name: 'login'
    });
  }).catch((error) => {
    console.log({error});
    Swal.fire({
      text: 'Something invalid',
      confirmButtonColor: '#ea4c88'
    });
  });
};
</script>

<template>
  <!-- https://codepen.io/marcobiedermann/pen/nbpKWV -->
  <!-- https://fontawesome.com/search?q=email&s=solid%2Cbrands -->
  <div class="login-box-container align">
    <div class="grid">
      <form
        action="https://httpbin.org/post"
        method="POST"
        class="form login"
      >
        <div class="form__field">
          <label for="login__nickname"><svg class="icon">
            <use xlink:href="#icon-user" />
          </svg><span class="hidden">Full Name</span></label>
          <input
            id="login__nickname"
            v-model="nickname"
            autocomplete="nickname"
            type="text"
            name="nickname"
            class="form__input"
            placeholder="Nickname"
            required
          >
        </div>
        <div class="form__field">
          <label for="login__email"><svg class="icon">
            <use xlink:href="#icon-email" />
          </svg><span class="hidden">Email</span></label>
          <input
            id="login__email"
            v-model="email"
            autocomplete="email"
            type="email"
            name="email"
            class="form__input"
            placeholder="Email"
            required
          >
        </div>

        <div class="form__field">
          <label for="login__password"><svg class="icon">
            <use xlink:href="#icon-lock" />
          </svg><span class="hidden">Password</span></label>
          <input
            id="login__password"
            v-model="password"
            type="password"
            name="password"
            class="form__input"
            placeholder="Password"
            required
          >
        </div>

        <div class="form__field">
          <label for="login__password"><svg class="icon">
            <use xlink:href="#icon-lock" />
          </svg><span class="hidden">Password Confirmation</span></label>
          <input
            id="login__password"
            v-model="passwordConfirmation"
            type="password"
            name="password"
            class="form__input"
            placeholder="Password Confirmation"
            required
          >
        </div>

        <div class="form__field">
          <input
            type="button"
            value="Sign Up"
            @click="registerButtonPressed"
          >
        </div>
      </form>

      <p class="text--center">
        <svg class="icon -scale-100">
          <use xlink:href="#icon-arrow-right" />
        </svg>
        <router-link :to="{ name: 'login' }">
          Back
        </router-link>
      </p>
    </div>

    <svg
      xmlns="http://www.w3.org/2000/svg"
      class="icons"
    >
      <symbol
        id="icon-arrow-right"
        viewBox="0 0 1792 1792"
      >
        <path d="M1600 960q0 54-37 91l-651 651q-39 37-91 37-51 0-90-37l-75-75q-38-38-38-91t38-91l293-293H245q-52 0-84.5-37.5T128 1024V896q0-53 32.5-90.5T245 768h704L656 474q-38-36-38-90t38-90l75-75q38-38 90-38 53 0 91 38l651 651q37 35 37 90z" />
      </symbol>
      <symbol
        id="icon-lock"
        viewBox="0 0 1792 1792"
      >
        <path d="M640 768h512V576q0-106-75-181t-181-75-181 75-75 181v192zm832 96v576q0 40-28 68t-68 28H416q-40 0-68-28t-28-68V864q0-40 28-68t68-28h32V576q0-184 132-316t316-132 316 132 132 316v192h32q40 0 68 28t28 68z" />
      </symbol>
      <symbol
        id="icon-user"
        viewBox="0 0 1792 1792"
      >
        <path d="M1600 1405q0 120-73 189.5t-194 69.5H459q-121 0-194-69.5T192 1405q0-53 3.5-103.5t14-109T236 1084t43-97.5 62-81 85.5-53.5T538 832q9 0 42 21.5t74.5 48 108 48T896 971t133.5-21.5 108-48 74.5-48 42-21.5q61 0 111.5 20t85.5 53.5 62 81 43 97.5 26.5 108.5 14 109 3.5 103.5zm-320-893q0 159-112.5 271.5T896 896 624.5 783.5 512 512t112.5-271.5T896 128t271.5 112.5T1280 512z" />
      </symbol>
      <symbol
        id="icon-email"
        viewBox="0 0 512 512"
      >
        <path d="M207.8 20.73c-93.45 18.32-168.7 93.66-187 187.1c-27.64 140.9 68.65 266.2 199.1 285.1c19.01 2.888 36.17-12.26 36.17-31.49l.0001-.6631c0-15.74-11.44-28.88-26.84-31.24c-84.35-12.98-149.2-86.13-149.2-174.2c0-102.9 88.61-185.5 193.4-175.4c91.54 8.869 158.6 91.25 158.6 183.2l0 16.16c0 22.09-17.94 40.05-40 40.05s-40.01-17.96-40.01-40.05v-120.1c0-8.847-7.161-16.02-16.01-16.02l-31.98 .0036c-7.299 0-13.2 4.992-15.12 11.68c-24.85-12.15-54.24-16.38-86.06-5.106c-38.75 13.73-68.12 48.91-73.72 89.64c-9.483 69.01 43.81 128 110.9 128c26.44 0 50.43-9.544 69.59-24.88c24 31.3 65.23 48.69 109.4 37.49C465.2 369.3 496 324.1 495.1 277.2V256.3C495.1 107.1 361.2-9.332 207.8 20.73zM239.1 304.3c-26.47 0-48-21.56-48-48.05s21.53-48.05 48-48.05s48 21.56 48 48.05S266.5 304.3 239.1 304.3z" />
      </symbol>
    </svg>
  </div>
</template>
