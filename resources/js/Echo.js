import store from './store/store'

Echo.join('chat')
    .here(users => {
        store.commit('LOAD_USERS',users)
    })
    //acabou de entrar no chat
    .joining(user => {
        store.commit('ENTRA_USER',user)    
    })
    //quando sai do chat
    .leaving(user =>{
        store.commit('SAIR_USER',user)
    })
    .listen('Chat.MessageCreated',e =>{
        console.log(e.message)
        store.commit('ADD_MESSAGE',e.message)
    })