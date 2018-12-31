@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
    
        <div class="col-9">
        <Message></Message>

        <Chat></Chat>        
        </div>

        <div class="col-3">
        <User></User>

        </div>
    </div>
</div>
<!-- <script>
    export default {
        methods:{
            sendMessage(){
                alert(clcio)
            }
        }
    }
</script> -->

@endsection