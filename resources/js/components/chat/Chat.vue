<template>
    <div>
        <div class="form-group">
            <textarea @keydown="keydownMessage" v-model="body" placeholder="Sua mensagem" class="form-control"></textarea>
        </div>
            <button :disabled="loading || !this.body || this.body.trim() ==''" @click.prevent="sendMessage" class="btn btn-success">
                <sync-loader 
                :loading="loading" 
                color="#FFF" 
                size="8px"
                class="float-left"
                >
                </sync-loader>
                
                Enviar</button>
    </div>
</template>
<script>
import SyncLoader from 'vue-spinner/src/SyncLoader'

export default {
    data(){
        return{
            body:'',
            loading:false
        }
    },
    methods:{
        keydownMessage(e){
            
                if(e.keyCode === 13 && !e.shiftKey){
                    e.preventDefault()
                    this.sendMessage()
                }
        },
        sendMessage(){
            if(!this.body || this.body.trim() =='' || this.loading){
                return
            }else{
                this.loading =true
                this.$store.dispatch('storeMessage',{body:this.body})
                    .then(()=> this.body = '')
                    .finally(()=>this.loading =false)
            }
           
        }
    },
     components: {
         SyncLoader
  }
}
</script>

<style>
.float-left{
    float:left   
}
</style>





