<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('public/backend/plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/plugins/fontawesome-free/css/all.min.css')}}">
    <link rel="stylesheet" href="{{asset('public/backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/themes/default/style.min.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <title>Demo Page</title>
</head>

<body>
    <!-- Model form -->
    <div id="myModal" class="modal fade" id="model_add">
        <div class="modal-dialog">
            <div class="modal-content bg-secondary">
                <div class="modal-header">
                    <h4 class="modal-title">Add New Icon</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form method="post" action="{{route('menu-management.icon.store')}}" id="myForm">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Icon Name</label>
                            <input id="name" type="text" value="{{ !empty($editData->name)? $editData->name : old('name') }}" class="form-control @error('name') is-invalid @enderror" name="name" placeholder="Icon Name"> @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span> @enderror
                        </div>
                    </div>
                    <div class="modal-footer justify-content-between">
                        <button type="button" class="btn btn-outline-light" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-outline-light">Save Icon</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal form -->
    <div class="card-body">
        <div class="row">
            <div class="col-md-3">
                <div class="form-group">
                    <label>Minimal</label>
                    <select class="form-control select2bs4" style="width: 100%;">
                        <option selected="selected">Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
                </div>
            </div>
            <div class="form-group col-md-4">
                <label>Start Time*</label>
                <div class="timepicker input-group date " id="" data-target-input="nearest">
                    <input type="text" value="{{ (@$editData->start_time)? date('h:i A',strtotime($editData->start_time)) : old('start_time') }}" name="start_time" autocomplete="off" class="form-control datetimepicker-input @error('start_time') is-invalid @enderror" data-target=".timepicker" />
                    <div class="input-group-append" data-target=".timepicker" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="far fa-clock"></i></div>
                    </div>
                </div>
                @error('start_time')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span> @enderror
            </div>
            <div class="col-md-3">
                <label>Notify</label><br>
                <button type="button" class="noti btn-lg btn-secondery">Notify Me</button>
            </div>
            <div class="col-md-3">
                <div class="form-group">
                    <label>Multiple</label>
                    <select class="select2bs4" multiple="multiple" data-placeholder="Select a State" style="width: 100%;">
                        <option>Alabama</option>
                        <option>Alaska</option>
                        <option>California</option>
                        <option>Delaware</option>
                        <option>Tennessee</option>
                        <option>Texas</option>
                        <option>Washington</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label>Date and time:</label>
                <div class="input-group " id="reservationdatetime" data-target-input="nearest">
                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdatetime" />
                    <div class="input-group-append" data-target="#reservationdatetime" data-toggle="datetimepicker">
                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-md-3">
                <label>Click Here</label><br>
                <button type="button" class="btn btn-lg btn-secondery">Show Modal</button>
            </div>
            <div class="col-md-4">
                <div id="jstree" class="checkboxesTree" >
                    <!-- in this example the tree is populated from inline HTML -->
                    <ul>
                        <li data-jstree='{"opened":true}'>Root node 1 
                            <ul>
                                <li id="child_node_1">Child node 1</li>
                                <li>Child node 2</li>
                            </ul>
                        </li>
                        <li>Root node 2</li>
                    </ul>
                </div>
                <button>demo button</button>
            </div>
        </div>
    </div>
     <script>
  $(function () {
    // 6 create an instance when the DOM is ready
    $('#jstree').jstree();
    // 7 bind to events triggered on the tree
    $('#jstree').on("changed.jstree", function (e, data) {
      console.log(data.selected);
    });
    // 8 interact with the tree - either way is OK
    $('button').on('click', function () {
      $('#jstree').jstree(true).select_node('child_node_1');
      $('#jstree').jstree('select_node', 'child_node_1');
      $.jstree.reference('#jstree').select_node('child_node_1');
    });
  });
  </script>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    </script>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <script src="{{asset('public/backend/plugins/jquery/jquery.min.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jstree/3.2.1/jstree.min.js"></script>
    <script src="{{asset('public/backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/select2/js/select2.full.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/moment/moment.min.js')}}"></script>
    <script src="{{asset('public/backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Notifyjs -->
    <script src="{{asset('public/backend/js/notify.js')}}"></script>
    <!-- <script src="{{asset('public/backend/js/nestable.js')}}"></script> -->
    <script type="text/javascript">
    $(document).on('click', '.noti', function() {
        $.notify("Inactive", { globalPosition: 'top right', className: 'error' });
    });

    </script>
    <script type="text/javascript">
    $(document).on('click', '.btn', function() {
        $("#myModal").modal('show');
    });

    </script>
    <script>
    $(function() {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })

    </script>
    <script>
    // Date and Time
    $(function() {

        $('#reservationdatetime').datetimepicker({ icons: { time: 'far fa-clock' } });
    })

    </script>
    <!-- Time -->
    <script type="text/javascript">
    //Timepicker
    $(function() {
        $('.timepicker').datetimepicker({
            format: 'LT'
        })
        $('#timepicker').datetimepicker({
            format: 'LT'
        })
    })
    $(document).ready(function() {
        var counter = 0;
        $(document).on("click", ".addeventmore", function() {
            var whole_extra_item_add = $(".whole_extra_item_add").html();
            $(this).closest(".add_item").append(whole_extra_item_add);
            counter++;
        });
        $(document).on("click", ".removeeventmore", function(event) {
            // alert('test');
            $(this).closest(".remove_item").remove();
            counter -= 1
        });
    });
    $(function() {});

    </script>
</body>

</html>
