<template>
    <input type="submit" class="btn btn-danger mr-1" value="Eliminar" v-on:click="eliminarBlog">
</template>

<script>
    export default {
        props: ['blogId'],
        methods: {
            eliminarBlog(){
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
                                id: this.blogId
                            }

                            //Enviar petición al servidor
                            axios.post(`/blogs/${this.blogId}`, {params, _method: 'delete'})
                                .then(respuest => {
                                    this.$swal({
                                        title: 'Blog Eliminado',
                                        text: 'Se eliminó la entrada',
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
