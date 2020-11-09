  @extends('admin.layout.app')
  @section('content')
  <style type="text/css">
    button.btn.btn-danger.btn-rounded {
      background: black !important;
      color: #fff !important;
      border-color: black;
  }
  button.btn.btn-danger.btn-rounded a {
      color: #fff;
  }
  input[type=file]
  {
    margin-top: 0px; 
    width: 100%
  }
textarea.form-control
{
  width: 98%;
} 
  @media (min-width: 768px){
  
  button.btn.btn-success.btn-rounded {
    margin-top: 15px;
    float: left;
}
  }
  </style>
    <div class="container-fluid"> 
      <!-- Title -->
      <div class="row heading-bg">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <h5 class="txt-dark" style="float: left;">Courses</h5>
        </div>
      </div>

      <!-- /Title --> 
      <!-- Row -->
      <div class="row">
        <div class="col-md-12 col-xs-12">
          <div class="panel panel-default card-view">
           
            <div class="panel-wrapper collapse in">
              <div class="panel-body">
                <div class="row">
                  <div class="col-md-12 col-xs-12">
                     @if(session()->has('message'))
             <div class="alert alert-success">
                 {{ session()->get('message') }}
             </div>
                 @elseif(session()->has('emessage'))
                           <div class="alert alert-danger">
                               {{ session()->get('emessage') }}
                           </div>
                 @endif
                    <div class="form-wrap">
                      @if(isset($mc))
                      <form action="{!! url('admin/update_course', $mc->id ); !!}" method="POST" enctype="multipart/form-data">
                     @csrf
                         
                          <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Title</label>
                              <div>
                                <input type="text" name="name" value="{{ old( 'name', $mc->name) }}" class="form-control"  placeholder="Course name">
                                 @if($errors->has('name'))
                                      <p class="error" >{{ $errors->first('name') }}</p>
                                    @endif
                              </div>
                            </div>
                          </div>
                          <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Fees</label>
                              <div>
                                <input type="number" name="fees" step="any" class="form-control"  placeholder="Fees" value="{{ old( 'fees', $mc->fees) }}">
                                @if($errors->has('fees'))
                                      <p class="error" >{{ $errors->first('fees') }}</p>
                                    @endif
                              </div>
                            </div>
                          </div>
                          
                      
                          <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Sex</label>
                              <div>
                                <input type="radio" name="gender" value="boy" @php if($mc->gender == 'boy'){ echo "checked";} @endphp>Boy
                                
                                <input type="radio" name="gender" value="girl" @php if($mc->gender == 'girl'){ echo "checked";} @endphp>Girl
                                
                                <input type="radio" name="gender" value="unisex" @php if($mc->gender == 'unisex'){ echo "checked";} @endphp>Unisex
                                @if($errors->has('gender'))
                                      <p class="error" >{{ $errors->first('gender') }}</p>
                                    @endif
                              </div>
                            </div>
                          </div>
          
           
                      
                          <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Classes type</label>
                              <div>
                                <select class="form-control" name="class_type">
                                    @if($ct)
                                    @foreach($ct as $cts)
                                    <option value="{{$cts->type}}"  @php if($mc->class_type == $cts->type){ echo "selected";} @endphp>{{$cts->type}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('class_type'))
                                      <p class="error" >{{ $errors->first('class_type') }}</p>
                                    @endif
                              </div>
                            </div>
                          </div>
          
                       
                        <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Age (from)</label>
                              <div>
                                <input type="number" name="age_from" class="form-control" placeholder="Age (from)" value="{{ old( 'age_from', $mc->age_from) }}">
                                 @if($errors->has('age_from'))
                                      <p class="error" >{{ $errors->first('age_from') }}</p>
                                    @endif
                              </div>
                            </div>  
                        </div>
                          
                        <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Age (to)</label>
                              <div>
                                <input type="number" name="age_to" class="form-control" placeholder="Age (to)" value="{{ old( 'age_to', $mc->age_to) }}">
                                 @if($errors->has('age_to'))
                                      <p class="error" >{{ $errors->first('age_to') }}</p>
                                    @endif
                              </div>
                            </div>  
                        </div>
                          
                          
                        <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Class Strength</label>
                              <div> 
                                <input type="number" name="class_size"  min="0" max="10" class="form-control" placeholder="Class Strength" value="{{ old( 'class_size', $mc->class_size) }}">
                                 @if($errors->has('class_size'))
                                      <p class="error" >{{ $errors->first('class_size') }}</p>
                                    @endif
                              </div>
                            </div>  
                        </div>
                          
                          
                           <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Image</label>
                              <div>
                                <input type="file" name="image">
                                 @if($errors->has('image'))
                                      <p class="error" >{{ $errors->first('image') }}</p>
                                    @endif
                              </div>
                            </div>  
                            <img height="150" src="{{asset('admin-assets/course/').'/'.$mc->image}}">
                        </div> 
                           <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Document</label>
                              <div>
                                <input type="file" name="document">
                                 @if($errors->has('document'))
                                      <p class="error" >{{ $errors->first('document') }}</p>
                                    @endif
                              </div>
                            </div>  
                            <img height="150" src="{{asset('admin-assets/course/document/').'/'.$mc->document}}">
                        </div> 
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Description</label>
                              <div>
                                <textarea type="time" name="description" class="form-control" placeholder="Description">{{ old( 'description', $mc->description) }}
                                </textarea>
                                 @if($errors->has('description'))
                                      <p class="error" >{{ $errors->first('description') }}</p>
                                    @endif
                              </div>
                            </div>  
                        </div>
                          
                          <div class="col-sm-12 col-xs-12 text-right">
                            <button class="btn  btn-success btn-rounded"><i class="mdi mdi-content-save  mr-5"></i>Update </button>
                          </div>
                      </form>
                     @else
                      <form  method="POST" action="{!! url('admin/add_course') !!}" enctype="multipart/form-data">
                          @csrf
                         
                          <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Name</label>
                              <div>
                                <input type="text" name="name" class="form-control"  placeholder="Course name">
                                @if($errors->has('name'))
                                      <p class="error" >{{ $errors->first('name') }}</p>
                                    @endif
                              </div>
                            </div>
                          </div>
                          
                         <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Fees</label>
                              <div>
                                <input type="number" name="fees" step="any" class="form-control"  placeholder="Fees">
                                @if($errors->has('fees'))
                                      <p class="error" >{{ $errors->first('fees') }}</p>
                                    @endif
                              </div>
                            </div>
                          </div>
                          
                            
                          <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Sex</label>
                              <div>
                                <input type="radio" name="gender" value="boy" checked >Boy
                                
                                <input type="radio" name="gender" value="girl">Girl
                                
                                <input type="radio" name="gender" value="unisex">Unisex
                                @if($errors->has('gender'))
                                      <p class="error" >{{ $errors->first('gender') }}</p>
                                    @endif
                              </div>
                            </div>
                          </div>
          
           
                      
                          <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label class="control-label">Classes type</label>
                              <div>
                                <select class="form-control" name="class_type">
                                    @if($ct)
                                    @foreach($ct as $cts)
                                    <option value="{{$cts->type}}">{{$cts->type}}</option>
                                    @endforeach
                                    @endif
                                </select>
                                @if($errors->has('class_type'))
                                      <p class="error" >{{ $errors->first('class_type') }}</p>
                                    @endif
                              </div>
                            </div>
                          </div>
                          
                        <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Age (from)</label>
                              <div>
                                <input type="number" name="age_from" class="form-control" placeholder="Age (from)">
                                 @if($errors->has('age_from'))
                                      <p class="error" >{{ $errors->first('age_from') }}</p>
                                    @endif
                              </div>
                            </div>  
                        </div>
                          
                        <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Age (to)</label>
                              <div>
                                <input type="number" name="age_to" class="form-control" placeholder="Age (to)">
                                 @if($errors->has('age_to'))
                                      <p class="error" >{{ $errors->first('age_to') }}</p>
                                    @endif
                              </div>
                            </div>  
                        </div>
                          
                          
                        <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Class Strength</label>
                              <div>
                                <input type="number" name="class_size" class="form-control" min="0" max="10" placeholder="Class Strength">
                                 @if($errors->has('class_size'))
                                      <p class="error" >{{ $errors->first('class_size') }}</p>
                                    @endif
                              </div>
                            </div>  
                        </div>
                        
                         <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Image</label>
                              <div>
                                <input type="file" name="image">
                                 @if($errors->has('image'))
                                      <p class="error" >{{ $errors->first('image') }}</p>
                                    @endif
                              </div>
                            </div>  
                        </div>
                         <div class="col-sm-3 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Document</label>
                              <div>
                                <input type="file" name="document">
                                 @if($errors->has('document'))
                                      <p class="error" >{{ $errors->first('document') }}</p>
                                    @endif
                              </div>
                            </div>  
                        </div>

                   
                          
                        <div class="col-md-12 col-xs-12">
                            <div class="form-group">
                              <label  class="control-label">Description</label>
                              <div>
                                <textarea type="time" name="description" class="form-control" placeholder="Description"></textarea>
                                 @if($errors->has('description'))
                                      <p class="error" >{{ $errors->first('description') }}</p>
                                    @endif
                              </div>
                            </div>  
                        </div>
                          
                          <div class="col-sm-12 col-xs-12 text-right" style="padding-left: 0">
                        <button class="btn  btn-success btn-rounded"><i class="mdi mdi-content-save  mr-5"></i> Save </button>
                      </div>
                      </form>
                      @endif
                    </div>
                  </div>
                  
                </div>
              </div>
            </div>
          </div>
        </div>
     
        <div class="col-md-12">
          <div class="panel panel-default card-view">
          
            <div class="panel-wrapper collapse in">
              <div class="panel-body">
                <div class="datatable-responsive table-responsive">
                  <table id="simpletable"class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        
                        <th>Course name</th>
                        <th>Fees</th>
                    
                        <th>Age</th>
                        <th>Class Size</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if($data)
                        @foreach($data as $mc)
                        <tr>
                           
                           <td>{!! $mc->name; !!}</td>
                           <td>{!! $mc->fees; !!}&nbsp;KD</td>
                          
                           <td>{!! $mc->age_from; !!} - {!! $mc->age_to; !!} years</td>
                           <td>{!! $mc->class_size; !!}</td>
                       
                           <td>
                            <i class="fa fa-pencil data-table-edit" data-id="{!! $mc->id; !!}" data-editurl="{{url('admin/edit_course')}}" title="Edit"> </i>
                            <i class="fa fa-trash delete" data-id="{!! $mc->id; !!}" data-url="{{secure_url('admin/delete_course')}}" data-redirecturl="{{url('admin/course')}}" title="Delete"> </i> 
                         </td>
                        </tr>
                        @endforeach
                        @endif
                    </tbody>
                    <tfoot>
                      <tr>
                       <th>Course name</th>
                        <th>Fees</th>
                       
                        <th>Age</th>
                        <th>Class Size</th>
                        <th>Action</th>
                      </tr>
                    </tfoot>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    @endsection
