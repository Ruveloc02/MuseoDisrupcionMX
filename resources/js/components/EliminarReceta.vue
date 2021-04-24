<template>
    <input type="submit" class="btn btn-danger mr-1" value="Eliminar" v-on:click="eliminarReceta">
</template>

<script>
    export default {
        props: ['recetaId'],
        methods: {
            eliminarReceta(){
                this.$swal({
                    title: '¿Deseas eliminar esta publicación?',
                    text: "Una vez eliminada, no se puede recuperar",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar',
                    cancelButtonText: 'Cancelar'
                    }).then((result) => {
                        if (result.isConfirmed) { 
                            const params = {
                                id: this.recetaId
                            }

                            //Enviar petición al servidor
                            axios.post(`/recetas/${this.recetaId}`, {params, _method: 'delete'})
                                .then(respuest => {
                                    this.$swal({
                                        title: 'Obra Eliminada',
                                        text: 'Se eliminó la receta',
                                        icon: 'success'
                                    });

                                    // Eliminar obra del DOM
                                    this.$el.parentNode.parentNode.parentNode.removeChild(this.$el.parentNode.parentNode);
                                })
                                .catch(error => {
                                    console.log(error);
                                })


                    }
                })
            }
        }
    }
</script>
