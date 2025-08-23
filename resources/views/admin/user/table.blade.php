<div>
    <div class="table-responsive">
        <table class="table align-middle mb-0">
            <thead class="table-light">
                <tr>                    
                    <th>Name</th>
                    <th>Email</th>
                    <th>Mobile</th>
                    <th>Date Created</th>
                    <th>Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach($data_list as $key=> $value)
                <tr >
                    <td>
                        <div class="d-flex gap-2 align-items-center">
                            <div class="flex-shrink-0">
                                <img class="avatar-xs rounded-circle"
                                    onerror="this.src='{{asset('storage/app/public/upload/default.jpg')}}'"
                                    src="{{asset('storage/app/public/upload/')}}/{{$value->image}}" alt="banner image"/>
                            </div>
                            <div class="flex-grow-1">
                                {{$value->name}}<br>
                                <b>{{sort_name.$value->user_id}}</b>
                            </div>
                        </div>
                    </td>
                    
                    <td>{{$value->email}}</td>
                    <td>{{$value->phone}}</td>
                    <td>{{date("D d F Y h:i A", strtotime($value->add_date_time))}}</td>
                    <td>
                        @if($value->status==1)
                        <span class="badge bg-success">Active</span>
                        @endif
                        @if($value->status==0)
                        <span class="badge bg-danger">Blocked</span>
                        @endif
                    </td>
                    <td>                        
                        <a href="{{route('user.account-action').'/'.Crypt::encryptString($value->id)}}" class="btn btn-sm btn-info mb-1 w-100">Account View</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- end table -->
    </div>
</div>


<div class="card pagination" >
    {{$data_list->links()}}
</div>
