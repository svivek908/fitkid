<!--   <table id="simpletable1" class="table table-striped table-bordered nowrap">
                    <thead>
                      <tr>
                        
                        <th>Student name</th>
                        <th>Email</th>
                        <th>Mobile</th>
                        <th>Course</th>
                        <th>Present days</th>
                        <th>Absent days</th>
                        <th>Batch start from</th>
                        <th>Batch end to</th>
                        <th>Total days</th>
                      </tr>
                    </thead>
                    <tbody>
                        @if($data)
                        @foreach($data as $mc)
                        <tr>
                           
                           <td>{!! $mc->year; !!}</td>
                           <td>{!! $mc->email; !!}</td>
                          
                           <td>{!! $mc->mobile; !!}</td>
                           <td>{!! $mc->cname; !!}</td>
                           @php if($mc->batch_status == 'not_expire'){
                              $now = time();
                              $your_date = strtotime($mc->start_date);
                              $datediff = $now - $your_date;

                              $end_date=round($datediff / (60 * 60 * 24));
                            
                           }else
                           {
                            $end_date= $mc->expiry_day;
                           }
                           @endphp
                           <td>{!!  $end_date - $mc->total_abs !!}</td>
                           <td>{!! $mc->total_abs; !!}</td>
                           <td>{!! $mc->start_date; !!}</td>
                           <td>{!! $mc->end_date; !!}</td>
                           <td>{!! $mc->expiry_day; !!}</td>
                       
                           
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
                  </table>-->