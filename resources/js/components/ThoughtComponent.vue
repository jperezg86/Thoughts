<template>
    <div class="card">
        	 	<div class="card-header">Publicado en {{thought.createdAt}}</div>
        	 	<div class="card-body">
        	 		<p v-if="!editMode"> {{thought.description }}</p>
                     <input v-else class="form-control" v-model="thought.description">
        	 	</div>
        	 	<div class="card-footer">
        	 		<button v-if="!editMode" class="btn btn-default" v-on:click="editComment">
        	 			Editar
        	 		</button>
                     <button v-else class="btn btn-submit" v-on:click="submitComment">
        	 			Actualizar Comentario
        	 		</button>
        	 		<button class="btn btn-danger" v-on:click="deleteComment">
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
                editMode : false
			}    			
    	},
        mounted() {
            console.log('Component mounted.')
        },
        methods : {
            deleteComment() {
                axios.delete('api/thoughts/'+this.thought.id).then(
                    (result) => {
                        this.$emit("onDeleteThought",this.thought);
                    }
                );
            },

            editComment(){
                
                this.editMode = true;
            },

            submitComment(){
                let params = {
                    description : this.thought.description
                };
                axios.put('api/thoughts/'+this.thought.id, params).then(
                    (result) => {
                        console.log(result);
                        this.editMode = false;
                    });
                
            }
        }
    }
</script>
