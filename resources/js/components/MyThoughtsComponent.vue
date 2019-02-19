<template>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">        
	    	<thought-form @onThoughtSubmit = "onThoughtSubmit"></thought-form>
	<br/>
        	<thought-component v-for="thought in thoughts" 
                    :key="thought.id" :thought="thought" @onDeleteThought="onDeleteThought" >
        	</thought-component>
        </div>
    </div>
</div>
</template>

<script>
 export default {
	  data (){
 		return {
 			thoughts : []
 		}
 	  },
      mounted() {
          this.getSavedThoughts();
      },

      methods : {
          getSavedThoughts(){
               var config = {
                headers: {
                        'Content-Type': 'application/json'
                },

                transformResponse: function (data) {
                     // Do whatever you want to transform the data
                     data = JSON.parse(data);
                     data.forEach(function(item, index, items){
                         item.createdAt = item.created_at;
                     });
                     data.createdAt = data.created_at;
                     return data;
                }
              };
              axios.get("api/thoughts",config).then((result) => {
                  this.thoughts = result.data;
              });
          },
          
          onThoughtSubmit(thought){
              let params = {
                    description : thought.description
                };

              var config = {
                transformResponse: function (data) {
                     // Do whatever you want to transform the data
                     data = JSON.parse(data);
                     data.createdAt = data.created_at;
                     return data;
                }
              };


              axios.post('api/thoughts',params,config).then((result) => {
                  this.thoughts.push(result.data);
              });
              
          },

          onDeleteThought(thought){
           this.thoughts = this.thoughts.filter(item => item.id != thought.id);
          }
      }
    }
</script>