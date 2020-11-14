<template>

    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-md-6">
                    <input type="text" @keyup="searchLogs" placeholder="Search" v-model="search" class="form-control">
                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <th scope="col">ID</th>
                        <th scope="col">Log</th>
                        <th scope="col">Time</th>
                    </thead>
                    <tbody>
                        <tr v-for="log in logs.data" :key="log.id">
                            <th scope="row">{{ log.id }}</th>
                            <td>{{ log.log }}</td>
                            <td>{{ log.created_at }}</td>
                        </tr>
                    </tbody>
                </table>

                <pagination :data="logs" @pagination-change-page="fetchLogsByPage" :limit="10"></pagination>
            </div>
        </div>
    </div>
</template>

<script>

import _ from "lodash";

import Auth from '../services/auth';
const auth = new Auth();

export default {
    data() {
        return {
            logs: {},
            search: "",
        }
    },
    methods: {
        getHeader() {
            const config = {
                headers: { Authorization: 'Bearer ' + auth.getToken() }
            };

            return config;
        },

        fetchAllLogs() {
            axios.get("api/logs", this.getHeader()).then( response => {
                this.logs = response.data;
            });
        },

        fetchLogsByPage(page = 1) {
            axios.get("api/logs/search?search=" + this.search + "&page=" + page, this.getHeader())
                .then((response) => {
                    this.logs = response.data;
                });
        },

        searchLogs:_.debounce(function() {
            axios.get("api/logs/search?search=" + this.search, this.getHeader())
                .then((response) => {
                    this.logs = response.data;
                });
        }),
    },

    created() {
        this.fetchAllLogs();
    },

}
</script>
