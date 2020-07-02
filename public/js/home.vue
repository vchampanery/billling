<template>
    <div>
        <p> Server status : {{status}}</p>
        <hr>
        <button @click="changeStatus"> Change status</button>
    </div>
</template>

<script>
   export default{
       data: function(){
           return {
               status :'critical'
           }
       },
       method: {
           changeStatus(){
               this.status = 'Normal'
           }
       }
   }
</script>
