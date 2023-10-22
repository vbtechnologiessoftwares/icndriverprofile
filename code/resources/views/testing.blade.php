  <!DOCTYPE html>
  <html>
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <head>
  	<title></title>
  </head>
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <body>
  
  <form class="form-horizontal"  method="POST" id="myform" action="{{ route('formsubmit') }}">
    @csrf

 <select id="dispositions_name" name="queues_id" required class="form-control" autocomplete="off" >
                                                    <option value="">Select List</option>
                                                    @foreach($automake as $ticketqueues)
                                                    <option value="{{$ticketqueues->id}}" >{{$ticketqueues->name}}</option>
                                                    @endforeach
                                                </select>


                                                <div class="col-md-9 form-group">
                                                        <select class="form-control subcategory" name="subcategory" id="subcategory" >
                                                            <option value="" selected>Parent Disposition</option>
                                                        </select>
                                                    </div>

                                                    <div class="col-md-9 form-group">
                                                        <select class="form-control" name="subcategorys" id="subcategorys">
                                                            <option value="" selected>Parent Disposition</option>
                                                        </select>
                                                    </div>


                                                  {{--   <div class="col-md-9 form-group">
                                                        <select class="form-control" name="subcategory" id="subcategory">
                                                            <option value="" selected>Parent Disposition</option>
                                                        </select>
                                                    </div> --}}
</form>

  </body>
  </html>
  <script type="text/javascript">
$.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
</script>

     <script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

<script type="text/javascript">
	

	    $(document).ready(function() {
            $('#dispositions_name').on('change', function(e) {
                var cat_id = e.target.value;
                $.ajax({

                    url: "{{ route('testingsub') }}",
                    type: "POST",
                    data: {
                    	"_token": "{{ csrf_token() }}",
 
                        cat_id: cat_id
                    },
                    success: function(data) {
                        $('#subcategory').empty();
                        $.each(data.automodelmake, function(index, subcategory) {
                            $('#subcategory').append('<option value="' + subcategory
                                .id + '">' + subcategory.name + '</option>');
                        })
                    }
                })
            });
        });
</script>
<script type="text/javascript">
	

	    $(document).ready(function() {
            $('.subcategory').on('change', function(e) {
                var cat_id = e.target.value;
                $.ajax({

                    url: "{{ route('testingsubsub') }}",
                    type: "POST",
                    data: {
                    	"_token": "{{ csrf_token() }}",
 
                        cat_id: cat_id
                    },
                    success: function(data) {
                        $('#subcategorys').empty();
                        $.each(data.autosubmodelmake, function(index, subcategorys) {
                            $('#subcategorys').append('<option value="' + subcategorys
                                .id + '">' + subcategorys.name + '</option>');
                        })
                    }
                })
            });
        });
</script>
