 @extends ('admin_view.master')
 @section('S&DAdminHome')
     {{-- <div class="container-fluid pt-25">
         <!-- Row -->
         <div class="row">
             <div class="col-sm-12">
                 <div class="panel panel-default card-view">
                     <div class="panel-heading">
                         <div class="pull-left">
                             <h6 class="panel-title txt-dark">customer support</h6>
                         </div>
                         <div class="pull-right">
                             <a href="#" class="pull-left inline-block full-screen">
                                 <i class="zmdi zmdi-fullscreen"></i>
                             </a>
                         </div>
                         <div class="clearfix"></div>
                     </div>
                     <div class="panel-wrapper collapse in">
                         <div class="panel-body row pa-0">
                             <div class="table-wrap">
                                 <div class="table-responsive">
                                     <table class="table display product-overview border-none" id="support_table">
                                         <thead>
                                             <tr>
                                                 <th>ticket ID</th>
                                                 <th>Customer</th>
                                                 <th>issue</th>
                                                 <th>Date</th>
                                                 <th>Status</th>
                                                 <th>Actions</th>
                                             </tr>
                                         </thead>
                                         <tbody>
                                             <tr>
                                                 <td>#85457898</td>
                                                 <td>Jens Brincker</td>
                                                 <td>Elmer chart</td>
                                                 <td>Oct 27</td>
                                                 <td>
                                                     <span class="label label-primary">done</span>
                                                 </td>
                                                 <td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip"
                                                         title="completed"><i class="zmdi zmdi-check"></i></a> <a
                                                         href="javascript:void(0)" class="text-inverse" title="Delete"
                                                         data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
                                             </tr>
                                             <tr>
                                                 <td>#85457897</td>
                                                 <td>Mark Hay</td>
                                                 <td>PSD resolution</td>
                                                 <td>Oct 26</td>
                                                 <td>
                                                     <span class="label label-warning ">Pending</span>
                                                 </td>
                                                 <td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip"
                                                         title="completed"><i class="zmdi zmdi-check"></i></a> <a
                                                         href="javascript:void(0)" class="text-inverse" title="Delete"
                                                         data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
                                             </tr>
                                             <tr>
                                                 <td>#85457896</td>
                                                 <td>Anthony Davie</td>
                                                 <td>Cinnabar</td>
                                                 <td>Oct 25</td>
                                                 <td>
                                                     <span class="label label-primary">done</span>
                                                 </td>
                                                 <td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip"
                                                         title="completed"><i class="zmdi zmdi-check"></i></a> <a
                                                         href="javascript:void(0)" class="text-inverse" title="Delete"
                                                         data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
                                             </tr>
                                             <tr>
                                                 <td>#85457895</td>
                                                 <td>David Perry</td>
                                                 <td>Felix PSD</td>
                                                 <td>Oct 25</td>
                                                 <td>
                                                     <span class="label label-danger">pending</span>
                                                 </td>
                                                 <td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip"
                                                         title="completed"><i class="zmdi zmdi-check"></i></a> <a
                                                         href="javascript:void(0)" class="text-inverse" title="Delete"
                                                         data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
                                             </tr>
                                             <tr>
                                                 <td>#85457894</td>
                                                 <td>Anthony Davie</td>
                                                 <td>Beryl iphone</td>
                                                 <td>Oct 25</td>
                                                 <td>
                                                     <span class="label label-primary">done</span>
                                                 </td>
                                                 <td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip"
                                                         title="completed"><i class="zmdi zmdi-check"></i></a> <a
                                                         href="javascript:void(0)" class="text-inverse" title="Delete"
                                                         data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
                                             </tr>
                                             <tr>
                                                 <td>#85457893</td>
                                                 <td>Alan Gilchrist</td>
                                                 <td>Pogody button</td>
                                                 <td>Oct 22</td>
                                                 <td>
                                                     <span class="label label-warning ">Pending</span>
                                                 </td>
                                                 <td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip"
                                                         title="completed"><i class="zmdi zmdi-check"></i></a> <a
                                                         href="javascript:void(0)" class="text-inverse" title="Delete"
                                                         data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
                                             </tr>
                                             <tr>
                                                 <td>#85457892</td>
                                                 <td>Mark Hay</td>
                                                 <td>Beavis sidebar</td>
                                                 <td>Oct 18</td>
                                                 <td>
                                                     <span class="label label-primary">done</span>
                                                 </td>
                                                 <td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip"
                                                         title="completed"><i class="zmdi zmdi-check"></i></a> <a
                                                         href="javascript:void(0)" class="text-inverse" title="Delete"
                                                         data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
                                             </tr>
                                             <tr>
                                                 <td>#85457891</td>
                                                 <td>Sue Woodger</td>
                                                 <td>Pogody header</td>
                                                 <td>Oct 17</td>
                                                 <td>
                                                     <span class="label label-danger">pending</span>
                                                 </td>
                                                 <td><a href="javascript:void(0)" class="pr-10" data-toggle="tooltip"
                                                         title="completed"><i class="zmdi zmdi-check"></i></a> <a
                                                         href="javascript:void(0)" class="text-inverse" title="Delete"
                                                         data-toggle="tooltip"><i class="zmdi zmdi-delete"></i></a></td>
                                             </tr>
                                         </tbody>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>
             </div>
         </div>
         <!-- /Row -->
     </div> --}}
 @stop

 @section('ToastrWellcom')
     <script>
         toastr.success('Trang Chủ!');
     </script>
 @stop
