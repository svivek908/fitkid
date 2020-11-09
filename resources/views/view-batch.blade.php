@extends('layout.app')
@section('content')

    <!-- LOAD PAGE -->


    <!-- CONTENT -->
     <div class="container-fluid"> 
      <!-- Title -->
      <div class="row heading-bg">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h5 class="txt-dark" style="float: left;">{{ __('messages.Students')}}</h5>
          
        </div>
      </div>
     
      <br>
      <div class="row">
        <div class="col-xs-12">
          <div class="panel panel-default card-view">
            <div class="panel-wrapper collapse in">
              <div class="datatable-responsive table-responsive">
                <table id="simpletable" class="table  table-bordered nowrap dark">
                  <thead>
                    <tr>
                      <th>{{ __('messages.Student ID')}}</th>
                      <th>{{ __('messages.Course ID')}}</th>
                      <th>{{ __('messages.Name')}}</th>
                      <th>{{ __('messages.Email')}}</th>
                      <th>{{ __('messages.Mobile')}}</th>
                      <th>{{ __('messages.Gender')}}</th>
                      <th>{{ __('messages.Address')}}</th>
                      <th>{{ __('messages.Education')}}</th>
                   <!--    <th>Created Date</th> -->
                   <!--    <th>Status</th> -->
                      <th>{{ __('messages.Action')}}</th>
                    </tr>
                  </thead>
                  <tbody>
                    @if(isset($data))
                    @foreach($data as $pro)
                    <tr >
                      <td>{{ $pro->id }}</td>
                      <td>{{ $pro->cname }}</td>
                      <td>{{ $pro->name }}</td>
                      <td>{{ $pro->email }}</td>
                      <td>{{ $pro->mobile }}</td>
                      <td>{{ $pro->gender }}</td>
                      <td>{{ $pro->address }}</td>
                      <td>{{ $pro->education }}</td>
                     <!--  <td>{{ $pro->created_at }}</td> -->
                    <!--   <td>
                        <select class="form-control" id="order_status" data-id="{{$pro->id}}">
                          <option {{ $pro->status == 'pending' ? 'selected'  : ''}} value='pending'>Pending</option>
                          <option {{ $pro->status == 'approved' ? 'selected'  : ''}} value='approved'>Approved</option>
                          <option {{ $pro->status == 'blocked' ? 'selected'  : ''}} value='blocked'>Blocked</option>
                          <option {{ $pro->status == 'disable' ? 'selected'  : ''}} value='disabled'>Disabled</option>
                        </select>

                      </td> -->
                      <td class="text-center"><a class="text-inverse" title="View student" data-toggle="tooltip" data-original-title="view student "><i class="fa fa-eye font-18 txt-primary data-table-edit" data-id="{!! $pro->id; !!}" data-editurl="{{url('admin/view-student')}}" style="cursor: pointer;"></i></a></td>
                     </tr>
                    @endforeach
                    @endif
                    
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /Row --> 
    </div>
@endsection