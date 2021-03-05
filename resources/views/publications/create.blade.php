@extends('layouts.app')
 

@section('content')

@if(count($errors))
<div class="container alert " style="background-color: #2A8CA9; " role="alert" style="margin-top: 100px;margin-left: 220px;">
	<ul>
		@foreach($errors->all() as $message)
		<li>
			{{ $message }}
		</li>
		@endforeach
	</ul>
</div>
@endif


<div class="container" id="ap">
  <div class="row justify-content-center" style="margin-top: 100px;margin-left: 200px;">
     <div class="col-md-11" style="background-color: #eee; border: 5px solid #eee;box-shadow: 0 2px 2px rgba(0,0,0,0.3);border-radius: 2%;margin-top: -25px;">

     	<form enctype="multipart/form-data" action="{{url('publications/store')}}" method="post">
     		{{csrf_field()}}
     		<div class="form-group">
     			<label for="">titre :</label>
     			<input type="text" name="titre" class="form-control"
     			value="{{old('titre')}}" style="background-color: white;border: 1px solid #2A8CA9;">
     		</div>

     		<div class="form-group">
     			<label for="">body :</label>
     			<textarea name="body" class="form-control" style="height: 100px;background-color: white;border: 1px solid #2A8CA9;">{{old('body')}}</textarea>
     		</div>

               
                    <input type="hidden" name="module" v-model="modul">
              

     		<div class="form-group">
     			<label for="">add a file :</label>
     			<input type="file" name="file" class="btn btn-default " value="{{old('file')}}">
     		</div>

                <div class="form-control">
                    <label>choisir le niveau :</label>
                    <select v-model="niveau" class="custom-select" style="width: 180px;background-color: white;margin-bottom: 35px;border: 1px solid #2A8CA9;">
                      <option value="none_specifier">none specifier</option>
                      <option value="l1">1er License</option>
                      <option value="l2">2éme License</option>
                      <option value="l3">3éme License</option>
                      <option value="m1">1er Master</option>
                      <option value="m2">2éme Master</option>
                    </select>
                     <div v-if="niveau != 'none_specifier' " class="btn-group" style="float: right;margin-bottom: 25px;border: 1px solid #2A8CA9;margin-right: 400px;">
                    
                       <button style="background-color: #fff;float: right;" v-if="fillter != 6" type="button" class="btn btn-outline-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        @{{modul}} 
                       </button>
                       <div  class="dropdown-menu">
                         <a class="dropdown-item" v-for="module in modules"  href="#" @click="modul = module.nom">@{{module.nom}}</a>
                        
                       </div>

                     </div>
                    
                    
               </div>

     		<div class="form-group">
     			<label for=""></label>
     			<input type="submit" value="Publier" class="btn " style="float: right;background-color: #2A8CA9 ;color: #fff;margin-right: 20px;margin-bottom: 20px;width: 100px;">
     		</div>
     	</form>
     </div>
 </div>
</div>

@endsection

@section('script')

  <script>
     
      const app = new Vue ({
       el: '#ap',
      data: {
      niveau : 'none_specifier',
      modul: 'modules',
      modules: {},
      },

      watch: {

       niveau: function() {

         this.getModules();
        }

        },

      methods: {
         getModules() {

          axios.get('/api/modules/'+this.niveau)
            .then((response) => {
              this.modules = response.data.data;
              })
            .catch(function (error) {
              console.log(error);
              })
        },
     },
      
      
       });

</script>

@endsection

