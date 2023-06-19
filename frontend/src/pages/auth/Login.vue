<script setup>
import { onMounted, ref, watch } from 'vue';
import { useRouter, useRoute } from 'vue-router'
import { useAuthStore } from '../../store/auth-store';
import { useSnackbar } from "vue3-snackbar";

const authStore = useAuthStore()
const snackbar = useSnackbar()
const router = useRouter()

const formContainer = ref(null);
const loginForm = ref({
  email: '',
  password: '',
  remember: false
})

function handleLogin() {
  if (loginForm.value.email && loginForm.value.password)
  {
    authStore.submitLogin(loginForm.value.email, loginForm.value.password)
  } else
  {
    snackbar.add({
      type: 'error',
      text: "Email dan Password harus di isi",
    })
  }
}

authStore.$subscribe((mutatuin, state) => {
  console.log(state.responseMessage)
})

watch(
  () => authStore.isError,
  () => {
    if (authStore.isError)
    {
      snackbar.add({
        type: 'error',
        text: authStore.responseMessage,
      })
    }
  }
)

watch(
  () => authStore.isSuccess,
  () => {
    if (authStore.isSuccess)
    {
      snackbar.add({
        type: 'success',
        text: "Login Berhasil",
      })

      router.push('/')
    }
  }
)

onMounted(() => {
  const isRemember = localStorage.getItem("remember")
  if (isRemember)
  {
    loginForm.value.email = isRemember.email
    loginForm.value.password = isRemember.password
  }
})

</script>

<template>
  <body class="hold-transition login-page">
    <div class="login-box">
      <div class="login-logo">
        <a href="../../index2.html">Senat App</a>
      </div>
      <!-- /.login-logo -->
      <div class="card">
        <div class="card-body login-card-body">
          <p class="login-box-msg">Sign in to start your session</p>

          <form @submit.prevent="handleLogin" :ref="formContainer">
            <div class="input-group mb-3">
              <input type="email" class="form-control" placeholder="Email" v-model="loginForm.email" />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-envelope"></span>
                </div>
              </div>
            </div>
            <div class="input-group mb-3">
              <input type="password" class="form-control" placeholder="Password" v-model="loginForm.password" />
              <div class="input-group-append">
                <div class="input-group-text">
                  <span class="fas fa-lock"></span>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-8">
                <div class="icheck-primary">
                  <input type="checkbox" id="remember" v-model="loginForm.remember" />
                  <label for="remember"> Remember Me </label>
                </div>
              </div>
              <!-- /.col -->
              <div class="col-4">
                <button type="submit" class="btn btn-primary btn-block">
                  Sign In
                </button>
              </div>
              <!-- /.col -->
            </div>
          </form>

          <div class="social-auth-links text-center mb-3">
            <p>- OR -</p>
            <a href="#" class="btn btn-block btn-primary">
              <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
            </a>
            <a href="#" class="btn btn-block btn-danger">
              <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
            </a>
          </div>
          <!-- /.social-auth-links -->

          <p class="mb-1">
            <a href="forgot-password.html">I forgot my password</a>
          </p>
          <p class="mb-0">
            <a href="register.html" class="text-center">Register a new membership</a>
          </p>
        </div>
        <!-- /.login-card-body -->
      </div>
    </div>
  </body>
</template>