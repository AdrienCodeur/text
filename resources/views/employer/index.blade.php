@extends('./../layouts.master')

@section('content')
@section('title' ,'Liste des Employers')

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Employer</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    <div class="col-auto">
                        <form class="table-search-form row gx-1 align-items-center">
                            <div class="col-auto">
                                @foreach ($InputSearch as $item)
                        
                                <input type="text" id="search-orders" name="search"
                                    class="form-control search-orders" placeholder="recherche" value="{{ $item->search ?  $item->search :  ''}}">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn app-btn-secondary">Search</button>
                            </div>
                            @endforeach

                        </form>

                    </div>
                    <!--//col-->
                   
                    <div class="col-auto">

                        <a class="btn app-btn-secondary" href="{{route('employer.create')}}">
                        <span class="fas fa-user fa-xl"></span>

                              Ajouter un Employer

                    </a>

                    </div>
                </div>
                <!--//row-->
            </div>
            <!--//table-utilities-->
        </div>
        <!--//col-auto-->
    </div>
    <!--//row-->


   


    <div class="tab-content" id="orders-table-tab-content">
        <div class="tab-pane fade show active" id="orders-all" role="tabpanel"
            aria-labelledby="orders-all-tab">
            <div class="app-card app-card-orders-table shadow-sm mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table app-table-hover mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">#</th>
                                    <th class="cell">departement</th>
                                    <th class="cell">nom</th>
                                    <th class="cell">email</th>
                                    <th class="cell">Salaire</th>
                                    <th class="cell">photos</th>
                                    <th class="cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
@foreach ($employers as $item)
<tr>

    <td>@if($item->sexe === 'F')
<img src="{{asset('assets/images/femme.png')}}" alt="F" class='img-fluid rounded ' style="width:24px;">
@else
<img src="{{asset('assets/images/homme-daffaire.png')}}" alt="F" class='img-fluid rounded ' style="width:24px;">

        @endif

    </td>
    <td>{{$item->departement->nom}}</td>
    <td>{{$item->nom}}</td>
    <td>{{$item->email}}</td>
    <td><span class="badge bg-success text-white fw-bold"> {{$item->salaire * 30}} $ </span></td>
    <td> 
        <img src="{{$item->imgUrl()}}" alt="" class='img-fluid rounded ' style="width:24px;">


    </td>
    <div class="d-flex">
        
    <td class="cell"><a class="badge text-white bg-info"
        href="{{route('employer.edit' ,$item->id)}}">Edit</a>
        <a class="badge text-white bg-danger"
                href="#">Suprimer</a></td>
    </div>
</tr>
    
@endforeach

                            </tbody>
                        </table>

                        <div class="col-md-6">

                        </div>
                    </div>
                    <!--//table-responsive-->

                </div>
                <!--//app-card-body-->
            </div>
            <!--//app-card-->
            <nav class="app-pagination">
               {{$employers->links()}}
            </nav>
            <!--//app-pagination-->

        </div>
        <!--//tab-pane-->

       
        <!--//tab-pane-->

      
        <!--//tab-pane-->
       
        <!--//tab-pane-->
    </div>
    <!--//tab-content-->



</div>
    <!-- Javascript -->
@endsection
