@extends('layouts.app')

@section('content')

<div class="container">
        <div>
                #messaheassssss
        </div>

    <div class="row">
    
        <div class="col-9">
                <div>
                <div class="form-group">
                    <textarea placeholder="Sua mensagem" class="form-control"></textarea>
                </div>
                    <button class="btn btn-success" @click.prevent="sendMessage">Enviar</button>
            </div>
        </div>

        <div class="col-3">
            <users-component></users-component>
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