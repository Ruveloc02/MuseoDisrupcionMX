<template>
<input type="submit" value="Enviar" class="boton w-100" v-on:click="enviarFormulario">    
</template>

<script>
    export default{
        methods: {
            enviarFormulario(){
                this.$swal({
                    title: 'DisrupciónMX',
                    text: 'Mensaje enviado con exito',
                    icon: 'success',
                    timer: 3000
                })
            }
        }
    }
</script>
