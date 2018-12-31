export default {
    state:{
        messages:{},
        users:{}
    },

    mutations:{

    },
    actions:{
        storeMessage(context, params){
            return axios.post('/chat',params)
                .then(response => console.log(response))
                .catch(()=> console.log('erro'))
        }
    },
    getters:{

    }
}