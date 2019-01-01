
export default {
    state:{
        messages:[],
        users:[]
    },

    mutations:{
        LOAD_MESSAGES (state, messages) {
            state.messages = messages
        },
        ADD_MESSAGE (state, message){
            state.messages.push(message)
        },
        LOAD_USERS(state, users){
            state.users = users
        },
        ENTRA_USER(state, user){
            state.users.push(user)
        },
        SAIR_USER(state, user){
            state.users = state.users.filter(u =>{
                return u.id !== user.id
            })
        }
    },
    actions:{
        storeMessage(context, params){
            return axios.post('/chat',params)
                .then(response => context.commit('ADD_MESSAGE',response.data))
                .catch(()=> console.log('erro'))
        },
        loadMessage(context, params){
            return axios.get('/messages')
                .then(response => context.commit('LOAD_MESSAGES',response.data))
        }

    },
    getters:{
        messages(state) {
            return _.orderBy(state.messages, 'id','asc')
        }
    }
}