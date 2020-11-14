<template>
    <div>
        <form action="#" @submit.prevent="handleLogin">
            <input type="hidden" :value="csrfToken" name="_token"/>

            <div class="form-group row justify-content-center">
                <div class="col-md-4">
                    <span>Demo user credentials are pre-populated for test purposes</span>
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Email</label>

                <div class="col-md-4">
                    <input type="email" v-model="formData.email" id="email" class="form-control" />
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">Password</label>

                <div class="col-md-4">
                    <input type="password" v-model="formData.password" class="form-control" />
                </div>
            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">Sign in</button>
                </div>
            </div>
        </form>
    </div>
</template>

<script>

import Auth from '../services/auth';
const auth = new Auth();

export default {
    data() {
        return {
            csrfToken: null,
            formData: {
                email: 'demoUser@test.com',
                password: 'SomePass123!'
            },
        }
    },
    methods: {
        handleLogin() {
            axios.get('/sanctum/csrf-cookie').then(response => {
                axios.post('/login', this.formData).then(response => {
                    axios.post('/api/sanctum/token', this.formData).then(response => {
                        localStorage.setItem('token', response.data);
                        window.location.href = '/home';
                    }).catch(error => {
                        console.log(error);
                        alert("These credentials do not match our records.");
                    });
                }).catch(error => {
                    console.log(error);
                    alert("These credentials do not match our records.");
                });;
            });
        },
    },

    mounted() {
        this.csrfToken = document.querySelector('meta[name="csrf-token"]').content
    },

}
</script>
