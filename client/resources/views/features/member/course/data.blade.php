@foreach($courses as $key =>$course)
<div class="col-md-3">
    <div class="card card-course" style="min-height: 310px">
        <img src="https://via.placeholder.com/400X300" class="card-img-top" alt="...">
        <div class="card-body">
            <span class="text-muted my-5">By {{$course['Mentor']['name']}}</span>
            <h5 class="card-title">{{$course['name']}}</h5>
            <div class="row card-text">
                <small>
                    <i class="fas fa-chart-line"></i>
                    <span>{{$course['level']}}</span>
                </small>
            </div>
        </div>
        <div class="card-footer bg-white CardCourse_card_footer__8KuSa">
            <div class="CardCourse_rate_and_price__mx63I">
                <div class="row justify-content-between">
                    <div class="col-auto">
                        <strong>Beli</strong>
                        <br />
                    </div>
                    <div class="col-auto ms-auto text-end">
                    <span>
                        <strong>{{covert_money($course['price'])}}</strong>
                    </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
