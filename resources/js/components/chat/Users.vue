<template>
    <div>
        <h3>{{users.length == 1 ? 'Ninguém Online': users.length + ' online'}}</h3>
        <div class="usuarios scroll">
            <div class="usuario" v-for="usuario in users" :key="usuario.id">
                <div class="usuario-img" v-if="usuario.image">
                    <img :src="`/storage/users/${usuario.image}`" :alt="usuario.name"/>
                </div>
                <div class="usuario-img" v-else >
                      <img src="/img/user.png" :alt="usuario.name"/>                   
                </div>
               
                <strong>{{users.length == 1 ? 'Eu': usuario.name}}</strong>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    computed:{
        users(){
            return this.$store.state.chat.users
        }
    }
}
</script>

<style scoped>
.usuarios{
    float: left;
    width:100%;
    overflow-x: hidden;
    overflow-y:auto;
    height:400px;
    max-height: 400px;
}
.usuario{
    float: left;
    width:100%;
    margin:10px 0 ;
}
.usuario-img{
    float: left;
    max-width: 60px;
    min-width: 60px;
  
    border-radius: 100%;
    float:left;
}
img{
max-width: 60px;
width: 60px;
border:1px solid #fff;
border-radius:100%;
}
.usuario strong{
    float: left;
    margin: 19px 8px;
}
</style>
