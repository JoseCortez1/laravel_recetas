<template>
    <!-- otra manera de mostrarlo seria 
    <span> {{formatFecha}} </span>     
     -->
    <span v-text="formatFecha"> </span> 
</template>

<script>
    export default {
        props:['fecha'],
       
        computed: {
            formatFecha(){
                return moment(this.fecha).locale('es').format('DD [de] MMMM [del] YYYY');
            }
        },
    }
</script>