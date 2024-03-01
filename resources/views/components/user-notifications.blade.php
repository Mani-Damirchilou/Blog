<div class="modal fade" id="user-notifications">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <span class="modal-title">اعلانات</span>
                <button class="btn-close me-auto m-0" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body ">
                @if($notifications->isEmpty())
                    <div class="fs-5 text-center w-100">
                    شما هیچ اعلانی ندارید !
                    </div>
                @else
                    @foreach($notifications as $notification)
                        <div class="alert alert-{{$notification->data['color']}}">
                            {{$notification->data['text']}}
                        </div>
                    @endforeach
                @endif
            </div>
            @if(!$notifications->isEmpty())
            <div class="modal-footer d-flex justify-content-center">
                <a href="{{route('notifications.mark-as-read')}}" class="btn btn-danger">علامت گذاری همه به عنوان خوانده شده</a>
            </div>
            @endif
        </div>
    </div>
</div>
