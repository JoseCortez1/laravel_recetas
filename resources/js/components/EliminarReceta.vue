<template>
    <div>
        <input 
            type="submit" 
            value="Eliminar"
            class="btn btn-danger " 
            @click="eliminarReceta"
            >
    </div>
</template>


<script>
    export default {
        props:['recetaId','recetaTitulo'],
        mounted(){
            console.log(this.recetaId)
        },
        methods:{
            eliminarReceta(){
                this.$swal({
                    title: `¿Estas Seguro de eliminar ${this.recetaTitulo}?`,
                    text: "No puedes revertir la acción!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Eliminar!',
                    cancelButtonText: 'No'
                    }).then((result) => {
                        const params = {
                            id: this.recetaId
                        }
                    if (result.value) {
                        axios.post(`/recetas/${this.recetaId}/destroy`, { params, _method: 'delete'} )
                        .then(res=>{
                            this.$swal({
                            title: 'Eliminado',
                             icon: 'success'
                            
                            })
                            this.$el.parentElement.parentElement.parentElement.remove();
                        })
                        .cath(err=>{
                            console.log(err)
                        })
                        
                    }
                    })
            }
        }
    }
</script>