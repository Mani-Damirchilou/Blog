@extends('layouts.panel')
@section('subtitle','نظرات > لیست همه')
@section('header')
    <span class="fs-6">نظرات > لیست همه</span>
@endsection
@section('content')
    <div class="card">
        <div class="card-header fs-4">
            لیست نظرات
        </div>
        <div class="card-body table-responsive">
            @if($comments->isEmpty())
                <div class="d-flex flex-column justify-content-center align-items-center fs-5 gap-4">
                <span>
                هیچ نظری ثبت نشده است !
                </span>
                </div>
            @else
                <table class="table text-center table-hover">
                    <thead>
                    <tr>
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
                    </tr>
                    </thead>
                    <tbody class="table-group-divider">

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
                            <td class="d-flex gap-2 justify-content-center">
                                @can('حذف نظر')
                                    <a href="{{route('comments.delete',$comment->id)}}" class="btn btn-sm btn-danger"><i class="bi bi-trash"></i></a>
                                @else
                                    -
                                @endcan
                            </td>
                        </tr>
                    @endforeach

                    </tbody>
                </table>
            @endif
        </div>
        @if($comments->hasPages())
            <div class="card-footer d-flex justify-content-center " dir="ltr">
                {{$comments->links()}}
            </div>
        @endif
    </div>
@endsection
