<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
     <link rel="stylesheet" href="{{asset('assets/css/bootstrap/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/member/style.css')}}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.css') }}">

  </head>
  <body class="bg-light">
    <div class="row px-3">
        <div class="col-md-4">
          <div class="d-flex flex-column flex-shrink-0 p-3 bg-white">
            <button class="btn btn-primary d-md-none mb-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebar" aria-controls="sidebar">
              <span class="bi bi-list"></span> Menu
            </button>
            <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto link-dark text-decoration-none">
              <svg class="bi pe-none me-2" width="40" height="32"><use xlink:href="#bootstrap"></use></svg>
              <span class="fs-4">Sidebar</span>
            </a>
            <hr>
            <ul class="nav nav-pills flex-column mb-auto">
              <div class="accordion" id="accordionPanelsStayOpenExample">
                @foreach ($course['Chapters'] as $key => $chapter)
                    <div class="accordion-item">
                        <h2 class="accordion-header" id="panelsStayOpen-{{ $chapter['id'] }}">
                            <button class="accordion-button {{ $key != 0 ? 'collapsed' : '' }}"
                                type="button" data-bs-toggle="collapse"
                                data-bs-target="#panelsStayOpen-collapse{{ $chapter['id'] }}"
                                aria-expanded="false"
                                aria-controls="panelsStayOpen-collapse{{ $chapter['id'] }}">
                                {{ $chapter['name'] }}
                            </button>
                        </h2>
                        <div id="panelsStayOpen-collapse{{ $chapter['id'] }}"
                            class="accordion-collapse collapse {{ $key == 0 ? 'show' : '' }}"
                            aria-labelledby="panelsStayOpen-{{ $chapter['id'] }}">
                            <div class="accordion-body">
                                <div class="card border-0">
                                    <div class="card-body p-0">
                                        <table class="table table-striped m-0">
                                            <tbody>
                                                @foreach ($chapter['Lessons'] as $key => $lesson)
                                                    <tr class="detail-chapter" style="cursor: pointer;" data-id="{{$lesson['id']}}">
                                                        <td style="width:50px">
                                                            <span
                                                                class="icon-rounded-circle bg-primary p-3">
                                                                <i class="fas fa-play text-white"></i>
                                                            </span>
                                                        </td>
                                                        <td class="text-muted">{{$lesson['name']}}</td>
                                                        <td class="text-end text-muted">
                                                            <span class="mx-2">
                                                                <i class="fas fa-lock"></i>
                                                            </span>
                                                            00.00
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            </ul>
          </div>
        </div>
        <div class="col-md-8" id="embed">
            <div id="loadingShowCourse" class="text-center" style="display: none">
                <img src="{{ asset('assets/plugins/loading.gif') }}" width="30px">
            </div>
        </div>
      </div>
      <script src="{{asset('assets/plugins/jquery.js')}}"></script>
      <script src="{{asset('assets/js/bootstrap/bootstrap.js')}}"></script>
      <script>
        $(document).ready(function(){
            $(".detail-chapter").click(function(){
                var id = $(this).attr('data-id');
                console.log(id);
                loadCoursesData(id);
            });
        });
        var id = $('.detail-chapter').attr('data-id');
        loadCoursesData(id);
        function loadCoursesData(id) {            
            $("#loadingShowCourse").show();
            $("#embed").load("{{ route('member.my-course.embed', ['key' => 'courses_get']) }}&id=" + id   , () => {
                $("#loadingShowCourse").hide();
            })
        }
      </script>
  </body>
</html>