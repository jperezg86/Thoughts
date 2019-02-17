<template>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">        
	    	<thought-form></thought-form>
	<br/>
        	<thought-component v-for="thought in thoughts" :key="thought.id" :thought="thought">
        	
        	</thought-component>
        </div>
    </div>
</div>
</template>

<script>
 export default {
	  data (){
 		return {
 			thoughts : [{
 				id : 123,
 				description : 'abc',
 				createdAt: '16/febrero/2019'
 			},{
 				id : 246,
 				description : 'def',
 				createdAt: '15/febrero/2019'
 			}]
 		}
 	  },
      mounted() {
          console.log('MyThoughtsComponent mounted.')
      }
    }
</script>