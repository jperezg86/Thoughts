<template>
	<div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                	<form action="" v-on:submit.prevent="submitThought()">
                			<div class="form-group">
                				<label for="thought">Ahora estoy pensando en:</label>
                				<input type="text" class="form-control" name="thought" v-model="description">
                			</div>
                			<button type="submit" class="btn btn-primary">
                				Enviar Pensamiento
                			</button>
                	</form>
                </div>
            </div>
</template>

<script>
    export default {
    	
    	data(){
    		return {
    			description : ''
    		}
    	}, 
        mounted() {
            console.log('Component mounted.')
        },
        
        methods:{
        	submitThought(e){
                    let thought = {
                        id : Math.random(),
                        description: this.description,
                        createdAt: new Date()
                    };
        		 	this.$emit("onThoughtSubmit", thought);
        	}
        }
    }
</script>