<div class="row py-5"><div class="col"><div class="card bg-white"><div class="card-body text-muted p-4"><h1 class="section-title h4 false">{{$data['name']}}</h1></div></div></div></div>
<div class="row px-3 overflow-hidden">
    <div class="ratio ratio-16x9 rounded-lg">
        <iframe src="https://www.youtube.com/embed/{{$data['video']}}?rel=0"  allowfullscreen title="{{$data['name']}}"></iframe>
     </div>
</div>