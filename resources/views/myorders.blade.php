@extends('master')
@section("contetn")
<div class="custom-product"> 
    <div class="col-sm-10">
        <div class="trending-wrapper">
            <h4>My orders:</h4>
            @foreach($orders as $item)
            <div class="row searched-item cart-list">
                <div class="col-sm-3">
                    <a href="detail/{{$item->id}}">
                        <img class="trending-img" src="{{$item->gallery}}">
                        
                    </a>
                </div>
                <div class="col-sm-4">
                   
                        <div class="">
                            <h2>Name: {{$item->name}}</h2>
                            <h5>Delivery status: {{$item->status}}</h5>
                            <h5>Address: {{$item->addres}}</h5>
                            <h5>Payment status: {{$item->payment_status}}</h5>
                            <h5>Payment method: {{$item->payment_method}}</h5>
                        </div>
                    
                </div>
            </div>
            @endforeach
        </div>
    </div>
    <div class="col-sm-2">
        <li><a href="#" data-toggle="modal" data-target="#editModal">Edit profile</a></li>
        <li><a href="#" data-toggle="modal" data-target="#deleteModal">Delete profile</a></li>
    </div>

    <!-- The EDIT Modal -->
  <div class="modal" id="editModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 class="modal-title">Edit profile</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!--  Modal body -->
        <div class="modal-body">
          <h3>Enter new user info</h3>
          <form action="/api/update/{{Session::get('user')['id']}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="exampleInputEmail1">User name</label>
                    <input type="text" name="name" class="form-control" id="exampleInputEmail1" placeholder="{{Session::get('user')['name']}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="{{Session::get('user')['email']}}">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="{{Session::get('user')['password']}}">
                </div>
                <input type="hidden" name="_method" value="put">
                <button type="submit" class="btn btn-default">Update</button>
            </form>
          
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

  <!-- ************************************************************************************************************ -->

   <!-- The DELETE Modal -->
   <div class="modal" id="deleteModal">
    <div class="modal-dialog">
      <div class="modal-content">
      
        <!-- Modal Header -->
        <div class="modal-header">
          <h1 class="modal-title">DelETE profile??</h1>
          <button type="button" class="close" data-dismiss="modal">×</button>
        </div>
        
        <!--  Modal body -->
        <div class="modal-body">
          <h3>Are u sure? are u really really sure???</h3>
        </div>
        
        <!-- Modal footer -->
        <div class="modal-footer">
            <form action="/api/delete/{{Session::get('user')['id']}}" method="POST">
                @csrf
                <input type="hidden" name="_method" value="delete">
                <button type="submit" class="btn btn-default">Yes...</button>
            </form>
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        </div>
        
      </div>
    </div>
  </div>

</div>
@endsection