@extends('./../layouts.master')

@section('content')

@section('title' ,'Liste des Configuration')
    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Configuration</h1>
        </div>
        <div class="col-auto">
            <div class="page-utilities">
                <div class="row g-2 justify-content-start justify-content-md-end align-items-center">
                    <div class="col-auto">
                        <form class="table-search-form row gx-1 align-items-center">
                            <div class="col-auto">
                                <input type="text" id="search-orders" name="searchorders"
                                    class="form-control search-orders" placeholder="Search">
                            </div>
                            <div class="col-auto">
                                <button type="submit" class="btn app-btn-secondary">Search</button>
                            </div>
                        </form>

                    </div>
                    <!--//col-->
                   
                    <div class="col-auto">
                        <a class="btn app-btn-secondary" href="{{route('config.create')}}">
                            <svg width="1em" height="1em" viewBox="0 0 16 16"
                                class="bi bi-download me-1" fill="currentColor"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5z" />
                                <path fill-rule="evenodd"
                                    d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
                            </svg>
                            Ajouter une Nouvelle Configuration
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
                                    <th class="cell">type</th>
                                    <th class="cell">valeur</th>
                                    <th class="cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
@foreach ($configurations as $item)
<tr>

    <td>{{$item->id}}</td>
    <td>{{$item->type}}</td>
    <td>{{$item->value}}</td>
    <div class="d-flex">
        
    <td class="cell"><a class="badge text-white bg-primary "
        href="{{route('config.edit' ,$item->id)}}">Edit</a>
        <a class="badge text-white bg-danger "
                href="#">Suprimer</a></td>
    </div>
</tr>
    
@endforeach

                            </tbody>
                        </table>
                    </div>
                    <!--//table-responsive-->

                </div>
                <!--//app-card-body-->
            </div>
            <!--//app-card-->
            <nav class="app-pagination">
               {{$configurations->links()}}
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
