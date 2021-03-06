@include('templates.header')

  <title>Update Event | Asset Management and Procurement System</title>
</head>

<body>
  
  {{-- Create User Frontend --}}
  <div class="landing-bg">

    {{-- Container Creating User --}}
    <div class="user-interface-cont">

      {{-- TOP LABELS --}}
      <div class="login-title">
                <div class="login-logo fl">
                    <img src="/img/companylogo.png" title="Project T Solutions">
                </div>
                <div class="login-text fl">
                    <p class="login-comp-nm">Update Event</p>
                </div>
                <div class="clr"></div>
            </div>

            {{-- FORM APPROVER ACCOUNT CREATION --}}
            <form method="POST" action="{{route('event.update', $event->id)}}">
                {{method_field('PUT')}}
                {{csrf_field()}}

                <label class="lbl-login">Title</label>
                <input type="text" class="input" name="title" id="title" value="{{$event->title}}" autocomplete="off"  required>

                <label class="lbl-login" style="margin-top: 5px">Start Date</label>
                <input type="date" class="input" name="start_date" id="start_date" value="{{$event->start_date}}" autocomplete="off"  required>

                <label class="lbl-login" style="margin-top: 5px">End Date</label>
                <input type="date" class="input" name="end_date" id="end_date" value="{{$event->end_date}}" autocomplete="off"  required>
                

                <button class="submit-approver-acc">Update Event</button>

                <!-- DISPLAY ERRORS -->
                @if ($errors->any())
                    <div class="login-comment-error">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                  </div>
                @endif

                <a href="{{ route('event.index') }}" class="back-to-manage">Back Event List</a>

        </form>

    </div>
    
  </div>

@include('templates.footer')