@if($errors->any())
      <div class="alert alert-warning">
                @foreach ($errors->all() as $error)
                   <p>{{ $error }}</p>
                  @endforeach
        </div>


@endif

@if($errors->any())
              <div class="alert alert-success">                
                   <p>{{ session('success') }}</p>                  
              </div>

 @endif

@if($errors->any())
              <div class="alert alert-danger">
                
                   <p>{{ session('error') }}</p>
                  
              </div>

 @endif