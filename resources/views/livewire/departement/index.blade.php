@section('title' ,'Liste des Departements')

    <div class="row g-3 mb-4 align-items-center justify-content-between">
        <div class="col-auto">
            <h1 class="app-page-title mb-0">Departement</h1>
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
                        <a class="btn app-btn-secondary" href="{{route('departement.create')}}">
                            <span class="fa-solid fa-bars"></span>
                            Ajout d'un Departement
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
                                    <th class="cell">nom</th>
                                    <th class="cell">Action</th>
                                </tr>
                            </thead>
                            <tbody>
@foreach ($departements as $item)
<tr>

    <td>{{$item->id}}</td>
    <td>{{$item->nom}}</td>
    
    <td class="cell"><a class="badge text-white bg-info"
        href="{{route('departement.edit',$item->id)}}">Edit</a>
        <a class="badge text-white bg-danger"
                href="#">Suprimer</a></td>
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
               {{$departements->links()}}
            </nav>
            <!--//app-pagination-->

        </div>
        <!--//tab-pane-->

        <div class="tab-pane fade" id="orders-paid" role="tabpanel" aria-labelledby="orders-paid-tab">
            <div class="app-card app-card-orders-table mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">

                        <table class="table mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Order</th>
                                    <th class="cell">Product</th>
                                    <th class="cell">Customer</th>
                                    <th class="cell">Date</th>
                                    <th class="cell">Status</th>
                                    <th class="cell">Total</th>
                                    <th class="cell"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="cell">#15346</td>
                                    <td class="cell"><span class="truncate">Lorem ipsum dolor sit amet eget
                                            volutpat erat</span></td>
                                    <td class="cell">John Sanders</td>
                                    <td class="cell"><span>17 Oct</span><span class="note">2:16 PM</span>
                                    </td>
                                    <td class="cell"><span class="badge bg-success">Paid</span></td>
                                    <td class="cell">$259.35</td>
                                    <td class="cell"><a class="btn-sm app-btn-secondary"
                                            href="#">View</a></td>
                                </tr>

                                <tr>
                                    <td class="cell">#15344</td>
                                    <td class="cell"><span class="truncate">Pellentesque diam
                                            imperdiet</span></td>
                                    <td class="cell">Teresa Holland</td>
                                    <td class="cell"><span class="cell-data">16 Oct</span><span
                                            class="note">01:16 AM</span></td>
                                    <td class="cell"><span class="badge bg-success">Paid</span></td>
                                    <td class="cell">$123.00</td>
                                    <td class="cell"><a class="btn-sm app-btn-secondary"
                                            href="#">View</a></td>
                                </tr>

                                <tr>
                                    <td class="cell">#15343</td>
                                    <td class="cell"><span class="truncate">Vestibulum a accumsan lectus sed
                                            mollis ipsum</span></td>
                                    <td class="cell">Jayden Massey</td>
                                    <td class="cell"><span class="cell-data">15 Oct</span><span
                                            class="note">8:07 PM</span></td>
                                    <td class="cell"><span class="badge bg-success">Paid</span></td>
                                    <td class="cell">$199.00</td>
                                    <td class="cell"><a class="btn-sm app-btn-secondary"
                                            href="#">View</a></td>
                                </tr>


                                <tr>
                                    <td class="cell">#15341</td>
                                    <td class="cell"><span class="truncate">Morbi vulputate lacinia neque et
                                            sollicitudin</span></td>
                                    <td class="cell">Raymond Atkins</td>
                                    <td class="cell"><span class="cell-data">11 Oct</span><span
                                            class="note">11:18 AM</span></td>
                                    <td class="cell"><span class="badge bg-success">Paid</span></td>
                                    <td class="cell">$678.26</td>
                                    <td class="cell"><a class="btn-sm app-btn-secondary"
                                            href="#">View</a></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!--//table-responsive-->
                </div>
                <!--//app-card-body-->
            </div>
            <!--//app-card-->
        </div>
        <!--//tab-pane-->

        <div class="tab-pane fade" id="orders-pending" role="tabpanel" aria-labelledby="orders-pending-tab">
            <div class="app-card app-card-orders-table mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Order</th>
                                    <th class="cell">Product</th>
                                    <th class="cell">Customer</th>
                                    <th class="cell">Date</th>
                                    <th class="cell">Status</th>
                                    <th class="cell">Total</th>
                                    <th class="cell"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="cell">#15345</td>
                                    <td class="cell"><span class="truncate">Consectetur adipiscing
                                            elit</span></td>
                                    <td class="cell">Dylan Ambrose</td>
                                    <td class="cell"><span class="cell-data">16 Oct</span><span
                                            class="note">03:16 AM</span></td>
                                    <td class="cell"><span class="badge bg-warning">Pending</span></td>
                                    <td class="cell">$96.20</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <!--//table-responsive-->
                </div>
                <!--//app-card-body-->
            </div>
            <!--//app-card-->
        </div>
        <!--//tab-pane-->
        <div class="tab-pane fade" id="orders-cancelled" role="tabpanel"
            aria-labelledby="orders-cancelled-tab">
            <div class="app-card app-card-orders-table mb-5">
                <div class="app-card-body">
                    <div class="table-responsive">
                        <table class="table mb-0 text-left">
                            <thead>
                                <tr>
                                    <th class="cell">Order</th>
                                    <th class="cell">Product</th>
                                    <th class="cell">Customer</th>
                                    <th class="cell">Date</th>
                                    <th class="cell">Status</th>
                                    <th class="cell">Total</th>
                                    <th class="cell"></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="cell">#15342</td>
                                    <td class="cell"><span class="truncate">Justo feugiat neque</span></td>
                                    <td class="cell">Reina Brooks</td>
                                    <td class="cell"><span class="cell-data">12 Oct</span><span
                                            class="note">04:23 PM</span></td>
                                    <td class="cell"><span class="badge bg-danger">Cancelled</span></td>
                                    <td class="cell">$59.00</td>
                                    <td class="cell"><a class="btn-sm app-btn-secondary"
                                            href="#">View</a></td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                    <!--//table-responsive-->
                </div>
                <!--//app-card-body-->
            </div>
            <!--//app-card-->
        </div>
        <!--//tab-pane-->
    </div>
    <!--//tab-content-->



</div>
    <!-- Javascript -->
