@extends('layouts.panel')
@section('subtitle','نظرات > لیست همه')
@section('header')
    <span class="fs-6">نظرات > لیست همه</span>
@endsection
@section('card-header')
    لیست نظرات
@endsection
@section('card-body')
    @if($comments->isEmpty())
        <div class="d-flex flex-column justify-content-center align-items-center gap-3 fs-5">
            هنوز هیچ نظری به ثبت نرسیده است !
        </div>
    @endif
@endsection
@section('table',$comments->isEmpty() ? "d-none" : '')
@section('table-head')
    <th scope="col">#</th>
    <th scope="col">نویسنده</th>
    <th scope="col">مقاله مرتبط</th>
    <th scope="col">متن نظر</th>
    <th scope="col">
        <i class="bi bi-hand-thumbs-up"></i>
    </th>
    <th scope="col">
        <i class="bi bi-hand-thumbs-down"></i>
    </th>
    <th scope="col">تاریخ ثبت</th>
    <th scope="col">اقدامات</th>
@endsection
@section('table-body')
    @foreach($comments as $comment)
        <tr>
            <th>{{$comment->id}}</th>
            <td>{{$comment->user->name}}</td>
            <td>{{$comment->article->title}}</td>
            <td>{{$comment->text}}</td>
            <td>
                {{$comment->getLikesCount()}}
            </td>
            <td>
                {{$comment->getDisLikesCount()}}
            </td>
            <td>{{$comment->created_at_to_persian}}</td>
            <td >
                @can('حذف نظر')
                    <a href="{{route('comments.delete',$comment->id)}}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                @else
                    -
                @endcan
            </td>
        </tr>
    @endforeach
@endsection
@section('card-footer-classes')
    @if(!$comments->hasPages())
        d-none
    @endif
    justify-content-center d-flex align-items-center
@endsection
@section('card-footer-attributes')
    dir="ltr"
@endsection
@section('card-footer')
    {{$comments->links()}}
@endsection

