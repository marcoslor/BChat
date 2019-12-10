<template>
    <div>
        <input type="email" name="user" v-for="user in users" v-bind="user">
        <button type="submit" v-on:click="createChat"/>
    </div>
</template>

<script>
    class User {
        constructor() {
            this.email = '';
        }
    }
    export default {
        name: "CreateChat",
        data() {
            return {
                users: [new User]
            }
        },
        methods: {
            createChat() {
                axios.post('/chats',{
                    users: this.users
                })
            }
        }
    }
</script>

<style scoped>

</style>
