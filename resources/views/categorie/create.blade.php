@extends('layouts.master')

@Section('content')

<div class="container-fluid py-4">
    <div class="row">
      <div class="col-12">
        <div class="card my-4">
          <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
            <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
              <h6 class="text-white <!--text-capitalize--> ps-3">Ajouter une nouvelle catégorie</h6>
            </div>
          </div>
          <div class="card-body px-0 pb-2">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <form action="{{ url('catégories') }}" method="POST">
                            {{ csrf_field() }}
                            <div class="form-group my-3">
                                <label for="nom-categorie">Catégorie</label>
                                <input type="text" name="nom-categorie" class="form-control border border-primary" required>
                            </div>
            
                            <div class="form-group my-3">
                                <input type="submit" class="form-control btn btn-primary" value="Enregistrer" required>
                            </div>
            
                    </form>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>




@endsection('content')