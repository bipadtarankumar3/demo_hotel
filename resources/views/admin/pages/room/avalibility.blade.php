@extends('admin.layouts.main')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <h6 class="py-3 mb-4"><span class="text-muted fw-light">Admin/</span>
        {{ Request::segment(2) . '/' . Request::segment(3) }}

    </h6>

    <div class="row">
      <div class="col-md-4">
        <form action="">
          <div class="form-floating form-floating-outline mb-4">
              <select name="room_type" id="room_type" class="form-control" onchange="this.form.submit()">
                  <option value="">-- Select Room Type --</option>
                  @foreach ($roomTypes as $item)
                      <option value="{{ $item->id }}" {{ isset($_GET['room_type']) && $_GET['room_type'] == $item->id ? 'selected' : '' }}>{{ $item->type }}</option>
                  @endforeach
              </select>
              <label for="basic-default-name">Room Type</label>
          </div>
        </form>
        
      </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div id="calendar"></div>
      </div>
    </div>


</div>

@endsection

@section('js')
  <script>
      $(document).ready(function() {
        ShowCalendar();
      });

      var calendarEl = document.getElementById('calendar');
      var calendar = new FullCalendar.Calendar(calendarEl, {
          initialView: 'dayGridMonth',
          events: function(info, successCallback, failureCallback) {
            var roomType = $('#room_type').val();
              $.ajax({
                  url: "{{URL::to('admin/room/fetchEvents')}}",
                  type: 'GET',
                  data: { room_type: roomType },
                  success: function(data) {
                      successCallback(data);
                  },
                  error: function() {
                      failureCallback();
                  }
              });
          },
      });

      function ShowCalendar() {
          calendar.render();
      }

      $("#addEvent").on("click", function() {
          var event = {
              customer_id: $("#customerId").val(),
              room_type: $("#eventName").val(), // Example: using event name as room type
              room_id: $("#roomId").val(),
              adults: $("#adults").val(),
              child: $("#child").val(),
              price: $("#price").val(),
              start: $("#fromDate").val(),
              end: $("#toDate").val(),
              payment_type: $("#paymentType").val(),
              no_of_rooms: $("#noOfRooms").val(),
              due_amount: $("#dueAmount").val(),
              b_status: $("#bStatus").val(),
          };

          $.ajax({
              url: '/events',
              type: 'POST',
              data: event,
              success: function() {
                  calendar.refetchEvents();
              }
          });
      });
  </script>
@endsection