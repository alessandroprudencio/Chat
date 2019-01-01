<template>
    <div class="message scroll" ref="refMessage">
        <ring-loader 
        :loading="loading" 
        >
        </ring-loader>

        <div class="chat-message" v-for="message in messages" :key="message.id">
            <div class="chat-info">
                    <i id="nomeUser">{{message.user.name}}</i>
                    <span><i>{{message.user.created_at}}</i></span>
            </div>

           <div class="img" v-if="message.user.image">
               <img :src="`/storage/users/${message.user.image}`" :alt="message.user.name"/>
            </div>
            <div class="img" v-else>
               <img src="/img/user.png" :alt="message.user.name"/>
            </div>
            
            
            <div :class="['message-body', {'owner':message.owner}]">
                {{message.body}}
            </div>

        </div>
    </div>
</template>
<script>
import RingLoader from 'vue-spinner/src/RingLoader.vue'

export default {
    data(){
        return{
            loading:false
        }
    },
    created(){
        this.loadMessage()
    },
    computed:{
        messages(){
          //  return this.$store.state.chat.messages
          return this.$store.getters.messages
        }
    },
    methods:{
        abaixaScroll(){
            setTimeout(() => {
                    this.$refs.refMessage.scroll({
                        top:this.$refs.refMessage.scrollHeight,
                        left:0,
                        behavior:'smooth'                      
                    })
            },10)
        },

        loadMessage(){
            this.loading = true
            this.$store.dispatch('loadMessage')
                .finally(()=>{
                    this.loading = false
                    this.abaixaScroll()
                })
        }
    },
    watch:{
        messages(){
            this.abaixaScroll()
        }
    },
    components:{
        RingLoader
    }
}
</script>

<style scoped>
.message{
    height:400px;
    max-height:400px;
    overflow-x:hidden;
    overflow-y:auto;
}
img{
    max-width: 60px;
    min-width: 60px;
  
    border-radius: 100%;
    float:left;
}
.chat-message{
    float:left;
    width: 100%;
    margin:10px 0;
}
.chat-info{
       float:left;
    width: 100%;
}
.message-body{
    background: white;
    padding:12px;
    border-radius: 5px;
    box-shadow: 5px 5px 5px #aaaaaa;
    position:relative;
    margin: 24px  9px 0 72px;
}  
.message-body.owner{
    background:  #b3ffe6;
}
.message-body:before{
    position:absolute;
    right:100%;
    top:15px;
    border:solid transparent;
    border-right: #fff  ;
    content: ' ';
    height:0;
    width:0;
    pointer-events: none;
    border-width: 6px;
}
.chat-info span{
    margin-right: 1%;
    float: right;
}
</style>

