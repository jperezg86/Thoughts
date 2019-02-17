<template>
    <div class="card">
        	 	<div class="card-header">Publicado en {{thought.createdAt}}</div>
        	 	<div class="card-body">
        	 		<p> {{thought.description }}</p>
        	 	</div>
        	 	<div class="card-footer">
        	 		<button class="btn btn-default">
        	 			Editar
        	 		</button>
        	 		<button class="btn btn-danger">
        	 			Eliminar
        	 		</button>
        	 	</div>
        	</div>
</template>

<script>
    export default {
    	props : ["thought"],
    	data () {
			return {
				thought : {
	 				id : 0,
	 				description : '',
	 				createdAt: ''
	 			}
			}    			
    	},
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
